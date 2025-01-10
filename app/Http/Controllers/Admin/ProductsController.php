<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Helpers\EditorArabic;
use App\Http\Helpers\UploadImage;
use App\Http\Requests\Admin\ProductsRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Support\Facades\Response;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Stevebauman\Purify\Facades\Purify;

class ProductsController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:منتجات-عرض', ['only' => ['index']]);
        $this->middleware('permission:منتجات-انشاء', ['only' => ['store']]);
        $this->middleware('permission:منتجات-تعديل', ['only' => ['edit', 'update']]);
        $this->middleware('permission:منتجات-حذف', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with(['admin', 'category', 'tags','brands'])->orderBy('id', 'DESC')->paginate(10);
        $cats = Category::where('status', "1")->get();
        $brands = Brand::where('status', "1")->get();
        $tags = Tag::where('status', "1")->get();
        if (count($cats) == 0) {
            alert()->error('منتجات', 'لا يوجد منتج');
            return redirect()->route('admin.categories.index');
        }
        if (count($tags) == 0) {
            alert()->error('وسوم', 'لا يوجد تصنيفات');
            return redirect()->route('admin.tags.index');
        }
        if (count($brands) == 0) {
            alert()->error('براند', 'لا يوجد برانج');
            return redirect()->route('admin.brands.index');
        }
        return view('admin.products', compact('products', 'cats', 'tags','brands'));
    }


    public function tags($id){
        $products=Product::whereHas('tags',function ($query) use($id){
          $query->where('id',$id);
        })->paginate(10);
        $cats = Category::where('status', "1")->get();
        $brands = Brand::where('status', "1")->get();
        $tags = Tag::where('status', "1")->get();
        return view('admin.products', compact('products', 'cats', 'tags','brands'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductsRequest $request)
    {
        try {

            DB::beginTransaction();
        $image = UploadImage::create($request->image, 'products');
                $product =   Product::create([
                    'title' => $request->post('title'),
                    'description' => $request->post('description'),
                    'price'=>$request->post('price'),
                    'quantity'=>$request->post('quantity'),
                    'content' => Purify::clean(EditorArabic::editorContent($request->post('content'))),
                    'status' => $request->post('status'),
                    'admin_id' => auth()->id(),
                    'category_id' => $request->post('category_id'),
                    'brand_id' => $request->post('brand_id'),
                    'image' => $image,
      
                ]);
                if($request->post('discound_type')!='no'){
                $product->discount()->create([
                    'discound_type'=>$request->post('discound_type'),
                    'start_date'=>$request->post('start_date'),
                    'exipre_date'=>$request->post('exipre_date'),
                    'discount'=>$request->post('discount'),
                    'notes'=>$request->post('notes_descount'),
                ]);
}
                if (!is_null($request->tags)) {

                    $product->tags()->sync($request->tags);
                } else {
                    alert()->warning('مقالات', 'يجيب اختاير وسوم');
                    return redirect()->route('admin.products.index');
                }
                ///upload mulit image related_images
                foreach ($request->realted_images as $image) {
                    $path = UploadImage::create($image, 'related_images');
                    ProductImage::create([
                        'product_id' => $product->id,
                        'image' => $path,
                    ]);
                }
            DB::commit();
            alert()->success('مقالات', 'تم اضافة مقال بنجاح');
            return redirect()->route('admin.products.index');
        } catch (Throwable $e) {
            DB::rollBack();
            return $e;
        }
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::where('id', $id)->with(['tags','discount','category','brands'])->first();
        if ($product) {
            return Response::json($product);
        }
        return false;
    }

    public function show($id){
        $product=ProductImage::where('product_id',$id)->get();
        if ($product) {
            return Response::json($product);
        }
        return false;
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductsRequest $request)
    {
        $product = Product::where('id', $request->id)->firstOrFail();
        try {
            DB::beginTransaction();
            $image = UploadImage::create($request->image, 'products');
    
                $product->update([
                    'title' => $request->post('title'),
                    'description' => $request->post('description'),
                    'price'=>$request->post('price'),
                    'quantity'=>$request->post('quantity'),
                    'content' => Purify::clean(EditorArabic::editorContent($request->post('content'))),
                    'status' => $request->post('status'),
                    'comment_able' => $request->post('comment_able'),
                    'category_id' => $request->post('category_id'),
                    'brand_id' => $request->post('brand_id'),
                    'image' => $image,
      
                ]);
            $product->tags()->sync($request->tags);
                ///upload mulit image related_images
                foreach ($request->realted_images as $image) {
                    $path = UploadImage::create($image, 'related_images');
                    ProductImage::create([
                        'product_id' => $product->id,
                        'image' => $path,
                    ]);
                }
                //discount
            DB::commit();
            alert()->success('مقالات', 'تم اضافة مقال بنجاح');
            return redirect()->route('admin.products.index');
        } catch (Throwable $e) {
            DB::rollBack();
            return $e;
        }

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $proudct = Product::where('id', $request->id)
            ->where('title', $request->name)->firstOrFail();
        if ($proudct->image) {
            UploadImage::delete($proudct->image,'products');
        }
        $proudct->delete();
        alert()->warning('منتجات', 'تم حذف منتج بنجاح');
        return redirect()->route('admin.products.index');
    }
}
