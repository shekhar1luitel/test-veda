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
    public function search(Request $request)
    {
        $sidebar = [
            ['Dashboard' => 'dashboard'],
            ['Blog' => 'blog'],
            ['Blog Show' => 'blog.show'],

        ];
        $title = 'Veda';

        $search = $request->input('search');
        $searchdata = User::where('username', 'like', '%' . $search . '%')
            ->orWhere('id', 'like', '%' . $search . '%')
            ->orWhere('email', 'like', '%' . $search . '%')
            ->get();

        return view('home/search_results', compact('searchdata','search', 'searchdata', 'title', 'sidebar'));
    }
}
