<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogRequest;
use App\Models\Blogs;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
            'user_id' => 'required|exists:users,id',
            'name' => 'required|string|max:255',
            'detail' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
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

        return redirect('/blog')->with('success', "Blog successfully created.");
    }
    public function deleteBlog($id)
    {
        Blogs::find($id)->delete();
        return back();
    }
    public function updateShow($updateData)
    {
        $sidebar = [
            ['Dashboard' => 'dashboard'],
        ];
        $BlogData = Blogs::find($updateData);
        $title = 'Veda-Blog';
        return view('blog/update', compact('BlogData', 'title', 'sidebar'));
    }

    public function updateBlog(Request $request, $id)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'name' => 'required|string|max:255',
            'detail' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
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
}
