<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Helpers\UploadImage;
use App\Http\Requests\Admin\BrandsRequest;
use App\Models\Brand;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;

class BrandsController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:برناد-عرض', ['only' => ['index']]);
        $this->middleware('permission:برناد-انشاء', ['only' => ['store']]);
        $this->middleware('permission:برناد-تعديل', ['only' => ['edit', 'update']]);
        $this->middleware('permission:برناد-حذف', ['only' => ['destroy']]);
    }
    public function index()
    {
        $brands = Brand::orderBy('id', 'DESC')->with(['admin'])->paginate(10);
        return view('admin.brands', compact('brands'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BrandsRequest $request)
    {

        $image = UploadImage::create($request->image, 'brands');
      Brand::create([
            'name' => $request->post('name'),
            'slug' => $request->post('name'),
            'admin_id' => auth()->id(),
            'status' => $request->post('status'),
            'image' => $image,
        ]);
        alert()->success('علامة التجارية', 'تم اضافة علامة تجارية بنجاح');
        return redirect()->route('admin.brands.index');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cat = Brand::whereId($id)->first();
        if ($cat) {
            return Response::json($cat);
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
    public function update(BrandsRequest $request)
    {
        $cat = Brand::where('id', $request->id)->firstOrFail();
        $data['name'] = $request->post('name');
        $data['status'] = $request->post('status');
        if (isset($request->image)) {
            $data['image'] =  UploadImage::update($request->image, $cat->image, 'brands');
        }
        $cat->update($data);
        alert()->success('علامة التجارية', 'تم اضافة علامة تجارية بنجاح');
        return redirect()->route('admin.brands.index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $cat = Brand::where('id', $request->id)->firstOrFail();
        // if ($cat->posts_count == 0) {
        //     $image = $cat->image;
        //     $cat->delete();
        //     UploadImage::delete($image, 'categories');
        //     alert()->warning('براند', 'تم حذف القسم بنجاح');
        //     return redirect()->route('admin.categories.index');
        // } else {
        //     alert()->error('برناد', 'هناك مقالات مرتبطه بنظام لا يمكن حذفها ');
        //     return redirect()->back();
        // }
        $cat->delete();
        $image = $cat->image;
        UploadImage::delete($image, 'categories');
        alert()->warning('علامة تجارية', 'تم حذف علامة تجارية بنجاح');
        return redirect()->route('admin.brands.index');
    }
}
