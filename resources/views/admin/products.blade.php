<x-dashborad-layout title="products">
    <x-slot:head>
<h1><i class="fa fa-th-list"></i> منتجات </h1>
    </x-slot:head>
<link rel="stylesheet" href="{{asset('dashbord_style/css/summernote/summernote-lite.min.css')}}">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<style>
    .note-editable {
        background: white;
    }
    
    .gap{
        column-gap: 11px;
    }
    .discount_item,.discount_item_edit,
    .option_item{
        display: none;
    }
    .modal-content{
        width: 1000px;
        margin-right: -218px;
    }
    .form-row{
        column-gap: 2px
    }
    .custom-input{
        width: 30%;
    padding: 4px 15px;
    font-size: 16px;
    border: 2px solid #28a745;
    border-radius: 8px;
    background-color: #f9f9f9;
    height: 37px;
    color: #333;
    outline: none;
    transition: all 0.3s ease-in-out;
    box-shadow: 0 3px 6px rgba(0, 0, 0, 0.1);
    margin-top: 10px;
    margin-left: 35px;
    }
    .custom-input:focus{
        color: #2b2b2b; /* لون النص التوضيحي (placeholder) */
        font-style: italic; /* تنسيق مائل */
    }
    .form-control{
        font-size: 16px;
    border: 2px solid #28a745;
    border-radius: 8px;
    background-color: #f9f9f9;
    height: 37px;
    color: #333;
    outline: none;
    transition: all 0.3s ease-in-out;
    box-shadow: 0 3px 6px rgba(0, 0, 0, 0.1);
    margin-top: 4px;
    }
    label{
        display: block;
    font-size: 18px;
    font-weight: bold;
    color: #ffffff;
    background-color: #28a745;
    padding: 5px 10px;
    border-radius: 5px;
    margin-bottom: 8px;
    transition: all 0.3s ease-in-out;
  margin-top: 11px;
}
</style>
<!-- row -->
<div class="row">
    <div class="col-xl-12">
        <div class="card mg-b-20">
            <div class="card-header pb-0">
                <div class="d-flex justify-content-between">
                    @can('منتجات-انشاء')
                    <a class="modal-effect btn btn-outline-primary btn-block" data-effect="effect-scale" data-toggle="modal" href="#modaldemo8">اضافة منتجات</a>
                    @endcan
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example1" class="table  table-bordered table-hover  key-buttons text-md-nowrap" data-page-length='50' style="text-align: center">
                        <thead class="custom-thead">
                            <tr>
                                <th class="border-bottom-0">صورة</th>
                                <th class="border-bottom-0">عنوان</th>
                                <th class="border-bottom-0">الكاتب</th>
                                <th class="border-bottom-0">سعر</th>
                                <th class="border-bottom-0">كمية</th>
                                <th class="border-bottom-0">الحالة</th>
                                <th class="border-bottom-0">وسم</th>
                                <th class="border-bottom-0">قسم</th>
                                <th class="border-bottom-0">تقييم</th>
                                <th class="border-bottom-0">العمليات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                            <tr>
                                <td><img src="{{$product->image_url}}" width="100" height="100"></td>
                                <td>{{ $product->title }}</td>
                                <td>{{ $product->admin->name }}</td>
                                <td>{{$product->price}}</td>
                                <td>{{$product->quantity}}</td>
                                <td>{{ $product->status_data}}</td>
                                <td style="width: 258px;">
                                @foreach($product->tags()->get() as $tag)
                                <a href="{{route('admin.products.tag',$tag->id)}}">
                                <span style="color:red;border:2px solid">{{$tag->name}}</span>
                                </a>
                                @endforeach
                                </td>
                                <td>{{ $product->category->name}}</td>
                                <td>
                                    @if(!$product->rattings->isEmpty())
                                    <x-ratting  :ratting="$product->product_ratting"/>
                                    @else
                                    لا يوجد تقييم
                                    @endif
                                </td>
                                @if($product->admin_id==auth()->id())
                                <td>
                                    <a class="modal-effect btn btn-sm btn-info" data-id="{{ $product->id }}" data-toggle="modal" id="showModelImages" href="javascript:void(0)" title="عرض"><i class="fa fa-eye"></i></a>

                                    @can('منتجات-تعديل')
                                    <a class="modal-effect btn btn-sm btn-info" data-id="{{ $product->id }}" data-toggle="modal" id="showEditModelProduct" href="javascript:void(0)" title="تعديل"><i class="fa fa-edit"></i></a>
                                    @endcan
                                    @can('منتجات-حذف')
                                    <a class="modal-effect btn btn-sm btn-danger" id="deleteCoateory" data-effect="effect-scale" data-id="{{ $product->id }}" data-name="{{ $product->title }}" data-toggle="modal" href="deleteCoateory" title="حذف"><i class="fa fa-trash"></i></a>
                                    
                                    @endcan
                                </td>
                                @else
                                <td>...</td>
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$products->links()}}
                </div>
            </div>
        </div>
    </div>

    <!-- showImagesElementModel -->
<div class="modal" id="showImagesElementModel">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">صور مرتبطة بمنتج </h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <table class="table key-buttons text-md-nowrap" id="element_details">
                    <thead>
                        <tr>
                            <td>رقم</td>
                            <td>صورة</td>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- End Basic modal -->
</div>
    <!-- اضافة مقاله -->
    <div class="modal" id="modaldemo8" style="overflow:scroll">
        <div class="modal-dialog" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">اضافة منتج</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                 <form method="POST" action="{{route('admin.products.store')}}" enctype="multipart/form-data"  onsubmit="handleSubmit(event)">
                    @csrf
                    <div class="row">
                        <div class="col-md-6  gap">
                            <div class="mb-3 d-flex align-items-center  gap">
                                <label for="username1" class="me-2">عنوان:</label>
                                <input type="text" id="title_add" name="title" class="form-control  @error('title') is-invalid @enderror" placeholder="ادخل العنوان" >
                                @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3 d-flex align-items-center gap">
                                <label for="price_add" class="form-label">سعر:</label>
                                <input type="number" id="price_add" name="price" class="form-control @error('price') is-invalid @enderror" placeholder="أدخل السعر " required>
                                @error('price')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3 d-flex align-items-center gap">
                                <label for="title_add" class="form-label">براند:</label>
                                <select name="brand_id" id="brand_id_add" class="form-control  @error('brand_id') is-invalid @enderror" required>
                                    @foreach ($brands as $brand)
                                    <option value="{{$brand->id}}" {{old('brand_id')==$brand->id?"selected":""}}>{{$brand->name}}</option>
                                    @endforeach
                                </select>
                                @error('brand_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3 d-flex align-items-center gap">
                                <label for="price_add" class="form-label">كمية:</label>
                                <input type="number" class="form-control @error('quantity') is-invalid @enderror" id="quantity_add" name="quantity" value="{{ old('quantity') }}" required>
                                @error('quantity')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            </div>
                            </div>
                        <div class="col-md-6">
                            <div class="mb-3 d-flex align-items-center gap">
                                <label for="title_add" class="form-label">القسم:</label>
                                <select name="category_id" id="category_id_add" class="form-control  @error('category_id') is-invalid @enderror">
                                    @foreach ($cats as $cat)
                                    <option value="{{$cat->id}}" {{old('category_id')==$cat->id?"selected":""}}>{{$cat->name}}</option>
                                    @endforeach
                                </select>
                                @error('brand_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            </div>

                            
                        
                        <div class="col-md-6">
                            <div class="mb-3 d-flex align-items-center gap">
                                <label for="price_add" class="form-label">حاله:</label>
                            <select name="status" id="status_add" class="form-control @error('status') is-invalid @enderror" required>
                                <option value="0" {{old('status')==0?"selected":""}}>غير مفعل</option>
                                <option value="1" {{old('status')==1?"selected":""}}>مفعل</option>
                            </select>
                            @error('quantity')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                            </div>
                            </div>


                            
                        <div class="col-md-6">
                            <div class="mb-3 d-flex align-items-center gap">
                                <label for="title_add" class="form-label">وصف:</label>
                                <textarea class="custom-input @error('description') is-invalid @enderror " style="    height: 175px;
        width: 420px;" id="description_add" name="description" value="{{old('description')}}" required></textarea>
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            </div>
                        <div class="col-md-6">
                            <div class="mb-3 d-flex align-items-center gap">
                                <label for="price_add" class="form-label">وسوم:</label>
                                <select style="    width: 200px;
    height: 179px;" name="tags[]" style="    height: 175px;" multiple id="tags" class="custom-input @error('tags') is-invalid @enderror" required >
                                    @foreach ($tags as $tag)
                                    <option value="{{$tag->id}}">{{$tag->name}}</option>
                                    @endforeach
                                </select>
                                @error('tags')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            </div>
                            </div>
                            
                        <div class="col-md-12">
                            <div class="mb-3 d-flex align-items-center gap">
                                <label for="">محتوي</label>
                                <textarea name="content" class="custom-input summernote @error('content') is-invalid @enderror" id="content_add" required>{{old('content')}}</textarea>
                                @error('content')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            </div>
                            </div>
                            
                        <div class="col-md-6">
                            <div class="mb-3 d-flex align-items-center gap">
                                <label for="title_add" class="col-auto">الخصم:</label>
        <select name="discound_type" class="form-control  @error('discound_type') is-invalid @enderror" id="discound_type_add"  onchange="haveDescount()">
            <option value="no" {{old('discound_type')=='no'?"selected":""}}>لا يوجد</option>
            <option value="precent" {{old('discound_type')=='precent'?"selected":""}}>نسبة مئوية</option>
            <option value="fixied" {{old('discound_type')=='fixied'?"selected":""}}>قيمة ثابتة</option>
        </select>
        @error('discound_type')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
                            </div>
                            </div>
                           <div class="col-md-6 discount_item">
                            <div class="mb-3 d-flex align-items-center gap">
                            <label for="discount-value">قيمة </label>
                            <input type="number" name="discount" id="discount-value" class="form-control" placeholder="أدخل القيمة">
                        </div>
                    </div>
                        <div class="col-md-6 discount_item">
                         <div class="mb-3 d-flex align-items-center gap">
                            <label for="title_add" class="col-auto">تاريخ بدء:</label>
                            <input type="date" class="form-control" id="start_date_add" name="start_date" value="{{old('start_date')}}">
                        </div>
                    </div>
                         
                         <div class="col-md-6  discount_item">
                      <div class="mb-3 d-flex align-items-center gap">
                        <label for="exampleInputEmail1"  class="col-auto">تاريخ انتهاء</label>
                        <input type="date" class="form-control" id="exipre_date_add" name="exipre_date" value="{{old('exipre_date')}}">
                 
                  </div>
                    </div>
                      <div class="col-md-6 discount_item"  >
                        <div class="mb-3 d-flex align-items-center gap">
<label for="exampleInputEmail1">ملاحظات </label>
<textarea name="notes_descount" id="notes_add" cols="30" rows="10"  class="form-control"></textarea>
                        </div>
                      </div>


                      <div class="col-md-6">
                        <div class="mb-3 d-flex align-items-center gap">
                            <label for="exampleInputEmail1">صورة </label>
                            <input type="file" name="image" class="form-control">
                        </div>
                    </div>


                    <div class="col-md-6">
                      <div class="mb-3 d-flex align-items-center gap">
                          <label for="exampleInputEmail1">صورة </label>
                          <input type="file" name="realted_images[]" multiple class="form-control">
                      </div>
                  </div>

                        </div>
                    </div>
                    
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">تاكيد</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- End Basic modal -->
    </div>
    <!-- edit -->
    <div class="modal" id="prodcutEditModel" style="overflow:scroll">
        <div class="modal-dialog" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">تعديل مقاله</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <form action="{{route('admin.products.update')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" id="id">
                        
                        <div class="row">
                            <div class="col-md-6  gap">
                                <div class="mb-3 d-flex align-items-center  gap">
                                    <label for="username1" class="me-2">عنوان:</label>
                                    <input type="text" id="title" name="title" class="form-control  @error('title') is-invalid @enderror" placeholder="ادخل العنوان" >
                                    @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3 d-flex align-items-center gap">
                                    <label for="price" class="form-label">سعر:</label>
                                    <input type="number" id="price" name="price" class="form-control @error('price') is-invalid @enderror" placeholder="أدخل السعر " required>
                                    @error('price')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3 d-flex align-items-center gap">
                                    <label for="title" class="form-label">براند:</label>
                                    <select name="brand_id" id="brand_id" class="form-control  @error('brand_id') is-invalid @enderror" required>
                                        @foreach ($brands as $brand)
                                        <option value="{{$brand->id}}" {{old('brand_id')==$brand->id?"selected":""}}>{{$brand->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('brand_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3 d-flex align-items-center gap">
                                    <label for="price" class="form-label">كمية:</label>
                                    <input type="number" class="form-control @error('quantity') is-invalid @enderror" id="quantity" name="quantity" value="{{ old('quantity') }}" required>
                                    @error('quantity')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                </div>
                                </div>
                            <div class="col-md-6">
                                <div class="mb-3 d-flex align-items-center gap">
                                    <label for="title" class="form-label">القسم:</label>
                                    <select name="category_id" id="category_id" class="form-control  @error('category_id') is-invalid @enderror">
                                        @foreach ($cats as $cat)
                                        <option value="{{$cat->id}}" {{old('category_id')==$cat->id?"selected":""}}>{{$cat->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('brand_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                </div>
                            <div class="col-md-6">
                                <div class="mb-3 d-flex align-items-center gap">
                                    <label for="price" class="form-label">حاله:</label>
                                <select name="status" id="status" class="form-control @error('status') is-invalid @enderror" required>
                                    <option value="0" {{old('status')==0?"selected":""}}>غير مفعل</option>
                                    <option value="1" {{old('status')==1?"selected":""}}>مفعل</option>
                                </select>
                                @error('quantity')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                                </div>
                                </div>
                            <div class="col-md-6">
                                <div class="mb-3 d-flex align-items-center gap">
                                    <label for="title" class="form-label">وصف:</label>
                                    <textarea class="custom-input @error('description') is-invalid @enderror " style="    height: 175px;
            width: 420px;" id="description" name="description" value="{{old('description')}}" required></textarea>
                                    @error('description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                </div>
                            <div class="col-md-6">
                                <div class="mb-3 d-flex align-items-center gap">
                                    <label for="price" class="form-label">وسوم:</label>
                                    <select style="    width: 200px;
        height: 179px;" name="tags[]" style="    height: 175px;" multiple id="tags" class="custom-input @error('tags') is-invalid @enderror" required >
                                        @foreach ($tags as $tag)
                                        <option value="{{$tag->id}}">{{$tag->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('tags')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                </div>
                                </div>
                                
                            <div class="col-md-12">
                                <div class="mb-3 d-flex align-items-center gap">
                                    <label for="">محتوي</label>
                                    <textarea name="content" class="custom-input summernote @error('content') is-invalid @enderror" id="content" required>{{old('content')}}</textarea>
                                    @error('content')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                </div>
                                </div>
                                
                            <div class="col-md-6">
                                <div class="mb-3 d-flex align-items-center gap">
                                    <label for="title" class="col-auto">الخصم:</label>
            <select name="discound_type" class="form-control  @error('discound_type') is-invalid @enderror" id="discound_type"  onchange="haveDescountEdit()">
                <option value="no" {{old('discound_type')=='no'?"selected":""}}>لا يوجد</option>
                <option value="precent" {{old('discound_type')=='precent'?"selected":""}}>نسبة مئوية</option>
                <option value="fixied" {{old('discound_type')=='fixied'?"selected":""}}>قيمة ثابتة</option>
            </select>
            @error('discound_type')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
                                </div>
                                </div>
                               <div class="col-md-6 discount_item_edit">
                                <div class="mb-3 d-flex align-items-center gap">
                                <label for="discount-value">قيمة </label>
                                <input type="number" name="discount" id="discount" class="form-control" placeholder="أدخل القيمة">
                            </div>
                        </div>
                            <div class="col-md-6 discount_item_edit">
                             <div class="mb-3 d-flex align-items-center gap">
                                <label for="title" class="col-auto">تاريخ بدء:</label>
                                <input type="date" class="form-control" id="start_date" name="start_date" value="{{old('start_date')}}">
                            </div>
                        </div>
                             
                             <div class="col-md-6  discount_item_edit">
                          <div class="mb-3 d-flex align-items-center gap">
                            <label for="exampleInputEmail1"  class="col-auto">تاريخ انتهاء</label>
                            <input type="date" class="form-control" id="exipre_date" name="exipre_date" value="{{old('exipre_date')}}">
                     
                      </div>
                        </div>
                          <div class="col-md-6 discount_item_edit"  >
                            <div class="mb-3 d-flex align-items-center gap">
    <label for="exampleInputEmail1">ملاحظات </label>
    <textarea name="notes_descount" id="notes_discount" cols="30" rows="10"  class="form-control"></textarea>
                            </div>
                          </div>
    
    
                          <div class="col-md-6">
                            <div class="mb-3 d-flex align-items-center gap">
                                <label for="exampleInputEmail1">صورة </label>
                                <input type="file" name="image" class="form-control">
                            </div>
                        </div>
    
    
                        <div class="col-md-6">
                          <div class="mb-3 d-flex align-items-center gap">
                              <label for="exampleInputEmail1">صورة </label>
                              <input type="file" name="realted_images[]" multiple class="form-control">
                          </div>
                      </div>
    
                            </div>
                        


                    </div>
                     
                        
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">تاكيد</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<!-- showImagesElementModel -->
<div class="modal" id="showImagesElementModel">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">صور مرتبطة بمنتج </h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <table class="table key-buttons text-md-nowrap" id="element_details">
                    <thead>
                        <tr>
                            <td>رقم</td>
                            <td>صورة</td>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- End Basic modal -->
</div>
<!-- show discount-->
<div class="modal" id="showDiscountElementModel">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">الخصم</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <table class="table key-buttons text-md-nowrap" id="element_discount_details" style=" 
                border: 2px solid white;">
                    <thead>
                        <tr>
                            <td>رقم</td>
                            <td>تاريخ بدء</td>
                            <td>تاريخ انتهاء</td>
                            <td> ملاحظات</td>
                            <td> نوع</td>
                            <td> خصم</td>
                            <td> حالة</td>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- End Basic modal -->
</div>
    <!-- delete -->
    <x-delete-model route="admin.products.delete" />
</div>
@push('scripts')
<script src="{{ asset('dashbord_style/css/summernote/summernote-lite.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    <?php if (!$errors->any()) { ?>
        $("#title_add").val("");
        $("#description_add").val("");
        $("#content_add").val("");
        $("#price_add").val("");
        $("#quantity_add").val("");
        $("#discound_type_add").val("");
        $("#start_date_add").val("");
        $("#exipre_date_add").val("");
        $("#discount_add").val("");
        $("#notes_add").val("");
        $("#status_discount_add").val("");
        $("#brand_add").val("");
        $("#tags_add").val("");
        $("#status_add").val("");
        $("#category_id_add").val("");
        $("#brand_id_add").val("");
        $("#tags_id").val("");
    <?php } ?>
    var id_checker = [];
    $(function() {
        $('.summernote').summernote({
            height: 300,
            placeholder: 'Start typing your text...',
            lang: 'es-ES',
            toolbar: [
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['insert', ['ltr', 'rtl']],
                ['insert', ['link', 'picture', 'video', 'hr']],
                ['view', ['fullscreen', 'codeview']]
            ]
        });
    });
    $('#prodcutEditModel').on('hidden.bs.modal', function(event) {
        console.log(id_checker)
        id_checker.forEach(function(el) {
            console.log(el)
            $(`#tags option[value='${el}']`).prop('selected', false);
        })
    })

    $('body').on('click', '#showEditModelProduct', function() {
        var cat_id = $(this).data('id');
        $.get('/admin/products/edit/' + cat_id, function(data) {
            $('#prodcutEditModel').modal('show');
            $('#id').val(data.id);
            $('#title').val(data.title);
            $('#description').val(data.description);
            $('#content').summernote('code', data.content);
            $('#price').val(data.price);
            $('#discont').val(data.discont);
            $('#quantity').val(data.quantity);
            $('#comment_able').val(data.comment_able);
            $('#image').val(data.image);
            $(`#category_id option[value='${data.category_id}']`).prop('selected', true);
            $(`#brand_id option[value='${data.brand_id}']`).prop('selected', true);
            $(`#status option[value='${data.status}']`).prop('selected', true);

            var discount=data.discount;
console.log(data.discount);
            console.log('object');
            console.log(discount);
            if(discount!=undefined){
    $(".discount_item_edit").css('display', 'block')
    $("#start_date").val(discount.start_date)
    $("#exipre_date").val(discount.exipre_date)
    $("#discount").val(discount.discount)
    $("#notes_discount").val(discount.notes)
    $("#status_discount").val(discount.status_discount)
    $(`#status_discount option[value='${discount.status}']`).prop('selected', true);
    $(`#discound_type option[value='${discount.discound_type}']`).prop('selected', true);
 }else{
     $(".discount_item_edit").css('display', 'none')
    $("#start_date").val("")
    $("#exipre_date").val("")
    $("#discount").val("")
    $("#notes").val("")
    $(`#discound_type option[value='no']`).prop('selected', true);
    $(`#status_discount option[value='']`).prop('selected', true);
 }
            for (let index = 0; index < data.tags.length; index++) {
                v = data.tags[index].id;
                id_checker.push(v);
                console.log(v);
                $(`#tags option[value='${v}']`).prop('selected', true);
            }
        });

    })
     /**show related Image*/
     $('body').on('click', '#showModelImages', function() {
        var product_id = $(this).data('id');
        $.get('/admin/products/show/' + product_id, function(data) {
            $('#showImagesElementModel').modal('show');
            data.forEach(function(el) {
                console.log(el['image_url']);
                $('#element_details').find('tbody').append($(`
                    <tr> 
                    <td>  ${el['id']}  </td> 
                    <td><img src="${el['image']}" width="100px" height="100px">    </td> 
                    <tr>
               ` ));
            });
        });

    });

    
    //لما يروح الضغط عن اضهار العناصر
    $('#showImagesElementModel').on('hidden.bs.modal', function(event) {

$('#element_details').find('tbody tr').remove();
})

  function  haveDescount(){
var type=$("#discound_type_add").val();
if(type!='no'){
console.log('test');
    $(".discount_item").css('display', 'block')
}else{
    $(".discount_item").css('display', 'none')
}
  }
  
  
function  haveDescountEdit(){
var type=$("#discound_type").val();
if(type!='no'){
console.log('test');
    $(".discount_item_edit").css('display', 'block')
}else{
    $(".discount_item_edit").css('display', 'none')

}
  }
  $(()=>{
    $('.js-example-basic-multiple').select2();})
</script>
@endpush
</x-dashborad-layout>