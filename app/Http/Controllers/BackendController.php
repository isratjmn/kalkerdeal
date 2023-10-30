<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class BackendController extends Controller
{
    function dashboard()
    {
        // Data Binding Ways(3)
        // Way 1
        $categories = Category::latest()->get();
        $trash_categories = Category::onlyTrashed()->get();
        $users = User::all();

        return view('backend.dashboard', compact('categories', 'trash_categories', 'users'));
        // Way 2
        /* return view('backend.dashboard', [
            '$categories' => Category::latest()->get()
        ]); */
        // Way 3
        /* $categories = Category::latest()->get();
        return view('backend.dashboard')->with('categories', $categories); */
    }
}
