<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;

class CategoryController extends Controller
{
    function index()
    {
        $categories = Category::all();
        return view('backend.category.index', compact('categories'));
    }
    function create()
    {
        return view('backend.category.create');
    }
    function insert(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|max:100|unique:categories,name',
                'description' => 'required',
                'category_thumbnail' => 'image'

            ],
            [
                'name.required' => "Name Required",
                'name.max' => "Name Should be max 100 Characters",
                'description.required' => "Description Required",
            ]
        );
        $slug = Str::slug($request->name);
        $category_id = Category::insertGetId($request->except('_token') + [
            'created_at' => Carbon::now(),
            'slug' => $slug
        ]);
        if ($request->hasFile('category_thumbnail')) {
            // Photo Upload Start
            $new_name = Str::lower(Str::random(20)) . '.' . $request->file('category_thumbnail')->extension();
            $photo_path = 'uploads/category_thumbnail/' . $new_name;
            Image::make($request->file('category_thumbnail'))->resize(310, 300)->save($photo_path);
            // Photo Upload Ends
            // Database Upload Starts
            Category::find($category_id)->update([
                'category_thumbnail' => $new_name,
            ]);
            // Database Upload Ends
        }
        // return back()->with('success', "Category Added Successfully");
        return back()->withSuccess("Category Added Successfully");
    }
    function delete($category_id)
    {
        Category::find($category_id)->delete();
        return back()->with('delete_success', 'Category Deleted Successfully');
    }
    function restore($category_id)
    {
        Category::onlyTrashed()->find($category_id)->restore();
        return back()->with('restore_success', 'Category Restore Successfully');
    }
    function permanent_delete($category_id)
    {
        Category::onlyTrashed()->find($category_id)->forceDelete();
        return back();
    }
    function update($category_id)
    {
        $category = Category::find($category_id);
        return view('backend.category.update', compact('category'));
    }

    function edit(Request $request, $category_id)
    {
        // Image Part Start
        if ($request->hasFile('category_thumbnail')) {
            $category = Category::find($category_id);
            if ($category->category_thumbnail != "defaultcategory.png") {
                unlink(public_path("uploads/category_thumbnail/") . $category->category_thumbnail);
            }
            // Photo Upload Start
            $new_name = Str::lower(Str::random(20)) . '.' . $request->file('category_thumbnail')->extension();
            $photo_path = 'uploads/category_thumbnail/' . $new_name;
            Image::make($request->file('category_thumbnail'))->resize(300, 200)->save($photo_path);
            // Photo Upload Ends
            // Database Upload Starts
            Category::find($category_id)->update([
                'category_thumbnail' => $new_name,
            ]);
            // Database Upload Ends
        }
        // Image Part Ends
        Category::find($category_id)->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);
        return redirect('category');
    }
    function restore_all()
    {
        Category::onlyTrashed()->restore();
        return back();
    }
    function p_deleteall()
    {
        Category::onlyTrashed()->forceDelete();
        return back();
    }
}
    // Validation Start
    /*if ($request->name == null) {
        echo "Name Nai";
    }
    if ($request->description == null) {
        echo "Description Nai";
    }
    die();*/

    // echo $category_id;
    // return $request;
    // UPDATE categories SET name = 'name', description = 'description' WHERE id = $id;

    /* $category = Category::find($category_id);
    return view('backend.category.update', compact('category')); */
    /* $name = $_POST['name'];
    $description = $_POST['description']; */

    // DELETE FROM categories WHERE id= $category_id;
    // INSERT INTO categories (name, description) VALUES ('$name', '$description')
    /* "INSERT INTO users (name, email) VALUES ('$name', '$email')"; */
    /* Category::insert([
    'name' => $request->name,
    'description' => $request->description,
    'created_at' => Carbon::now(),
    ]); */
    // header('locatiom: dashboard.php');
    // $_SESSION['success'] = "Category Added Successfully ";
