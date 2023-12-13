<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Blogs;

class ApiControlller extends Controller
{
    public function getAllBlogs()
    {
        $blogs = Blogs::all();

        return response()->json(['status' => true, 'blogs' => $blogs], 200);
    }
}
