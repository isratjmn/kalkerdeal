<?php

namespace App\Http\Controllers;

use App\Models\Category;

// use Illuminate\Http\Request;
class FrontendController extends Controller
{
    public function welcome()
    {
        return view('welcome', [
            "categories" => Category::all(),
        ]);
    }
    public function about()
    {
        $friends = ['Ryan', 'Alamin', 'John'];
        $enemies = ['Yuvika', 'John'];
        $gender = 'Male';
        return view('about', compact('friends', 'enemies', 'gender'));
    }
    public function contact()
    {
        return view('contact');
    }
    public function category()
    {
        // Choto Bela
        /* $select_q = "SELECT * FROM categories";
        mysqli_query($db_connect, $select_q); */
        // Boro Bela
        $categories = Category::latest()->get();
        return view('category', compact('categories'));
    }
}
