<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $sidebar = [
            ['Dashboard' => 'dashboard'],
            ['Blog' => 'blog'],
            ['Blog Show' => 'blog.show'],

        ];
        $userData = User::all()->except(Auth::id());
        // dd($userData);
        $title = 'Veda';
        $userDataPagination = User::paginate(2);
        // $userDataPagination = User::where('id', '!=', Auth::id())->paginate(2);
        return view('home/dashboard', compact('userData', 'userDataPagination', 'title', 'sidebar'));
    }
    public function deleteUser($id)
    {
        User::find($id)->delete();
        return back();
    }
}
