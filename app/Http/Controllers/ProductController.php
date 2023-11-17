<?php
namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Featured_photo;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::where('user_id', auth()->id())->latest()->get();
        return view('backend.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view("backend.product.create", compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "product_featured_photo.*" => "required|image",
        ]);

        if ($request->discount) {
            $discount = $request->discount;

            $discounted_price = $request->regular_price - ($request->regular_price * ($request->discount / 100));
        } else {
            $discount = 0;
            $discounted_price = $request->regular_price;
        }
        $product_id = Product::insertGetId([
            'category_id' => $request->category_id,
            'user_id' => auth()->id(),
            'name' => $request->name,
            'purchase_price' => $request->purchase_price,
            'regular_price' => $request->regular_price,
            'discount' => $discount,
            'discounted_price' => $discounted_price,
            'short_description' => $request->short_description,
            'long_description' => $request->long_description,
            'additional_info' => $request->additional_info,
            'care_instruction' => $request->care_instruction,
            'product_thumbnail' => 'PHOTO',
            'created_at' => Carbon::now(),
        ]);
        // Photo Upload Start
        $new_name = Str::lower(Str::random(20)) . '.' . $request->file('product_thumbnail')->extension();
        $photo_path = 'uploads/product_thumbnailzz/' . $new_name;
        Image::make($request->file('product_thumbnail'))->resize(192, 160)->save($photo_path);
        // Photo Upload Ends
        // Database Upload Starts
        Product::find($product_id)->update([
            'product_thumbnail' => $new_name,
        ]);
        // Database Upload Ends
        // Featured Photo Uploads Starts
        foreach ($request->product_featured_photos as $product_featured_photo) {
            // Photo Upload Start
            $new_name = $product_id . "--" . Str::lower(Str::random(20)) . '.' . $product_featured_photo->extension();
            $photo_path = 'uploads/product_featured_photos/' . $new_name;
            Image::make($product_featured_photo)->resize(750, 750)->save($photo_path);
            // Photo Upload Ends
            Featured_photo::insert([
                "product_id" => $product_id,
                "featured_photo_name" => $new_name,
                "created_at" => Carbon::now(),
            ]);
        }
        // Featured Photo Uploads Ends
        return back()->withSuccess("Product Upload Successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view("backend.product.show");
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view("backend.product.edit");
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
