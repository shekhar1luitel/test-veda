<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogRequest;
use App\Models\Blogs;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class BlogsController extends Controller
{
    public function index()
    {
        $sidebar = [
            ['Dashboard' => 'dashboard'],
        ];
        $BlogData = Blogs::all();
        $title = 'Veda-Blog';
        return view('blog/index', compact('BlogData', 'title', 'sidebar'));
    }
    public function create()
    {
        $sidebar = [
            ['Dashboard' => 'dashboard'],
        ];
        $BlogData = Blogs::all();
        $title = 'Veda-Blog';
        return view('blog/create', compact('BlogData', 'title', 'sidebar'));
    }
    public function blogShow()
    {
        $sidebar = [
            ['Dashboard' => 'dashboard'],
        ];
        $BlogData = Blogs::all()->where('user_id', Auth::id());
        $title = 'Veda-Blog';
        return view('blog/blog', compact('BlogData', 'title', 'sidebar'));
    }

    public function blogShowOne($id)
    {
        $sidebar = [
            ['Dashboard' => 'dashboard'],
        ];
        $data = Blogs::with('user')->find($id);
        $BlogData = Blogs::all();
        $title = 'Veda-Blog';
        return view('blog.viewBlog', compact('data', 'BlogData', 'title', 'sidebar'));
    }
    public function blogCreate(Request $request)
    {
        $request->validate([
            'user_id' => ['required', Rule::exists('users', 'id')],
            'name' => 'required|string|max:255',
            'detail' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'user_id.required' => 'The user ID is required.',
            'user_id.exists' => 'The selected user does not exist.',
            'name.required' => 'The blog name is required.',
            'name.string' => 'The blog name must be a string.',
            'name.max' => 'The blog name may not be greater than :max characters.',
            'detail.required' => 'The blog detail is required.',
            'detail.string' => 'The blog detail must be a string.',
            'image.image' => 'The file must be an image.',
            'image.mimes' => 'The image must be of type: jpeg, png, jpg, gif.',
            'image.max' => 'The image may not be greater than :max kilobytes.',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->storeAs('public/images', $imageName);
        } else {
            $imageName = null;
        }

        $blog = Blogs::create([
            'user_id' => $request->user_id,
            'name' => $request->name,
            'detail' => $request->detail,
            'image' => $imageName,
        ]);

        return redirect('/blog')->with('success', 'Blog successfully created.');
    }
    public function deleteBlog($id)
    {
        Blogs::find($id)->delete();
        return back()->with('success', 'Blog successfully deleted.');
    }
    public function updateShow($updateData)
    {
        $sidebar = [
            ['Dashboard' => 'dashboard'],
        ];

        $BlogData = Blogs::find($updateData);
        $title = 'Veda-Blog';
        return view('blog/update', compact('updateData', 'BlogData', 'title', 'sidebar'));
    }

    public function updateBlog(Request $request, $id)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'name' => 'required|string|max:255',
            'detail' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'user_id.required' => 'The user ID is required.',
            'user_id.exists' => 'The selected user does not exist.',
            'name.required' => 'The blog name is required.',
            'name.string' => 'The blog name must be a string.',
            'name.max' => 'The blog name may not be greater than :max characters.',
            'detail.required' => 'The blog detail is required.',
            'detail.string' => 'The blog detail must be a string.',
            'image.image' => 'The file must be an image.',
            'image.mimes' => 'The image must be of type: jpeg, png, jpg, gif.',
            'image.max' => 'The image may not be greater than :max kilobytes.',
        ]);

        $blog = Blogs::find($id);

        if (!$blog) {
            return redirect('/blog')->with('error', "Blog not found.");
        }

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->storeAs('public/images', $imageName);

            if ($blog->image) {
                Storage::delete('public/images/' . $blog->image);
            }

            $blog->update([
                'user_id' => $request->user_id,
                'name' => $request->name,
                'detail' => $request->detail,
                'image' => $imageName,
            ]);
        } else {
            $blog->update([
                'user_id' => $request->user_id,
                'name' => $request->name,
                'detail' => $request->detail,
            ]);
        }

        return redirect('/blog')->with('success', "Blog successfully updated.");
    }

    public function search(Request $request)
    {
        $sidebar = [
            ['Dashboard' => 'dashboard'],
            ['Blog' => 'blog'],
            ['Blog Show' => 'blog.show'],
        ];
        $title = 'Veda';

        $search = $request->input('search');
        $searchdata = Blogs::where('id', 'like', '%' . $search . '%')
            ->orWhere('name', 'like', '%' . $search . '%')
            ->orWhere('detail', 'like', '%' . $search . '%')
            ->orWhere('user_id', 'like', '%' . $search . '%')
            ->get();

        return view('blog/search_results', compact('search', 'searchdata', 'title', 'sidebar'));
    }
}
