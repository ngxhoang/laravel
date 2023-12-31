<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Image;
use App\Models\Order;
use App\Models\Product;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:create-product, edit-product, delete-product');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(18);
        // $product = Product::find(52);
        // $i = $product->images;
        // dd($i[0]->product_id);
        // dd($product->images[1]);
        return view('admin.products.index')->with([
            'products' => $products
        ]);
    }

    public function orderConf()
    {
        return view('admin.products.orderConf');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::get();
        $categories = Category::get();
        $brands = Brand::get();
        return view('admin.products.create')->with([
            'tags' => $tags,
            'categories' => $categories,
            'brands' => $brands
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product();
        $product->name = $request['name'];
        $product->content = $request['content'];
        $product->quatity = $request['quatity'];
        $product->origin_price = $request['origin_price'];
        $product->sale_price = $request['sale_price'];
        $product->category_id = $request['category_id'];
        $product->brand_id = $request['brand'];
        $product->status = $request['status'];
        $product->option = 1;
        $product->save();

        if ($request->hasFile('image')) {
            $image = new Image();
            $disk = 'public';
            // $path = $request->file('image')->store('blogs', $disk);
            $path = Storage::disk($disk)->putFile('products', $request->file('image'));
            $image->disk = $disk;
            $image->path = $path;

            $product->images()->save($image);
        }

        $product->tags()->sync($request['tags']);
        $request->session()->flash('success', 'Thêm mới bài viết thành công!');
        return redirect()->route('backend.products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return redirect()->route('backend.products.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        // dd($product->category->id);
        $categories = Category::get();
        $tags = Tag::get();
        $brands = Brand::get();
        return view('admin.products.edit')->with([
            'product' => $product,
            'categories' => $categories,
            'tags' => $tags,
            'brands' => $brands
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $product->name = $request['name'];
        $product->content = $request['content'];
        $product->quatity = $request['quatity'];
        $product->origin_price = $request['origin_price'];
        $product->sale_price = $request['sale_price'];
        $product->category_id = $request['category_id'];
        $product->brand_id = $request['brand'];
        $product->status = $request['status'];
        $product->option = 1;
        $product->save();

        if ($request->hasFile('image')) {
            $image = new Image();
            $disk = 'public';
            // $path = $request->file('image')->store('blogs', $disk);
            $path = Storage::disk($disk)->putFile('products', $request->file('image'));
            $image->disk = $disk;
            $image->path = $path;

            $product->images()->save($image);
        }

        $product->tags()->sync($request['tags']);
        $request->session()->flash('success', 'Chỉnh sửa thành công!');
        return redirect()->route('backend.products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->tags()->detach();
        // $product->categories()->detach();
        $product->images()->delete($id);
        $product->delete();
        return redirect()->route('backend.products.index');
    }
}
