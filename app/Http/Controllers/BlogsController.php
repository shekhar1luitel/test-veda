<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogRequest;
use App\Models\Blogs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogsController extends Controller
{
    public function index()
    {
        $sidebar = [
            ['Dashboard' => 'dashboard'],
        ];
        $BlogData = Blogs::all();
        $title = 'Veda-Blog';
        return view('blog/index', compact('BlogData','title', 'sidebar'));
    }
    public function blogShow()
    {
        $sidebar = [
            ['Dashboard' => 'dashboard'],
        ];
        $BlogData = Blogs::all()->where('user_id',Auth::id());
        $title = 'Veda-Blog';
        return view('blog/blog', compact('BlogData','title', 'sidebar'));
    }

    public function blogCreate(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'name' => 'required|string|max:255',
            'detail' => 'required|string',
        ]);

        // Create a new blog entry
        $blog = Blogs::create($request->all());

        return redirect('/blog')->with('success', "Blog successfully created.");

    }
    public function deleteBlog($id)
    {
        Blogs::find($id)->delete();
        return back();
    }
    public function updateBlog($updateData)
    {
        Blogs::where('id', 1)->update(['name' => $updateData['name'], ['detail']=>$updateData['detail']]);
        return back();
    }
}
