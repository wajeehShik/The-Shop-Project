<x-dashborad-layout title="dashborad">
    <x-slot:head>
    <h1><i class="fa fa-faqs"></i>العلامات التجارية</h1>
    </x-slot:head>
<!-- row -->
<div class="row">
    <div class="col-xl-12">
        <div class="card mg-b-20">
            <div class="card-header pb-0">
                <div class="d-flex justify-content-between">
                    <a class="modal-effect btn btn-outline-primary btn-block" data-effect="effect-scale" data-toggle="modal" href="#modaldemo8">اضافة علامة تجارية</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive" id="ajax_responce_serarchDiv">
                    <table id="example1" class="table  table-bordered table-hover  key-buttons text-md-nowrap" data-page-length='50' style="text-align: center">
                        <thead  class="custom-thead">
                            <tr>
                                <th class="border-bottom-0">#</th>
                                <th class="border-bottom-0">اسم </th>
                                <th class="border-bottom-0">المستخدم</th>
                                <th class="border-bottom-0"> صورة</th>
                                <th class="border-bottom-0">الحالة</th>
                                <th class="border-bottom-0">العمليات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($brands as $brand)
                            <tr>
                                <td>{{$loop->iteration }}</td>
                                <td>{{ $brand->name }}</td>
                                <td>{{ $brand->admin->name}}</td>
                                <td><img src="{{$brand->image_url}}" width="150px" height="150px"></td>
                                <td>{{ $brand->status_data }}</td>
                                <td>
                                    <a class="modal-effect btn btn-sm btn-info" data-id="{{ $brand->id }}" data-toggle="modal" id="showEditModelbrand" href="showEditModelbrand" title="تعديل"><i class="fa fa-edit"></i></a>
                                    <a class="modal-effect btn btn-sm btn-danger" id="deleteCoateory" data-effect="effect-scale" data-id="{{ $brand->id }}" data-name="{{ $brand->name }}" data-toggle="modal" href="deleteCoateory" title="حذف"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$brands->links()}}
                </div>
            </div>
        </div>
    </div>
    <div class="modal" id="modaldemo8">
        <div class="modal-dialog" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">اضافة برناد</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <form action="{{route('admin.brands.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">اسم </label>
                            <input type="text" class="form-control  @error('name') is-invalid @enderror" id="name_add" name="name" value="{{old('name')}}">
                            @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">الحالة</label>
                            <select class="form-control  @error('status') is-invalid @enderror" id="status_add" name="status">
                                <option value="0" {{old('status')=='0'?"selected":""}}>غير مفعل</option>
                                <option value="1" {{old('status')=='1'?"selected":""}}>مفعل</option>
                            </select>
                            @error('status')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                         </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">صورة</label>
                            <input type="file" class="form-control  @error('image') is-invalid @enderror" id="" name="image">
                            @error('image')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        
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
    <div class="modal fade" id="brandEditModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">تعديل </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('admin.brands.update')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <input type="hidden" name="id" id="brand_id">
                            <label for="exampleInputEmail1">اسم </label>
                            <input type="text" class="form-control  @error('name') is-invalid @enderror" id="name" name="name" value="{{old('name')}}">
                            @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">الحالة</label>
                            <select class="form-control  @error('status') is-invalid @enderror" id="status" name="status">
                                <option value="0" {{old('status')=='0'?"selected":""}}>غير مفعل</option>
                                <option value="1" {{old('status')=='1'?"selected":""}}>مفعل</option>
                            </select>
                            @error('status')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">صورة</label>
                            <input type="file" class="form-control  @error('image') is-invalid @enderror" id="" name="image">
                            @error('image')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">تاكيد</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- delete category -->
    <x-delete-model route="admin.brands.delete" />
    <!-- row closed -->
</div>
<!-- Container closed -->
</div>
<!-- main-content closed -->
@push('scripts')
<!-- Internal Data tables -->
<script>
    <?php if (!$errors->any()) { ?>
        $("#name_add").val("");
        $("#status_add").val("");
    <?php } ?>
    $('body').on('click', '#showEditModelbrand', function() {
        var brand_id = $(this).data('id');
        $.ajax({
            type: "POST",
            url: '/admin/brands/edit/' + brand_id,
            dataType: "json",
            data: {
                "_token": "{{ csrf_token() }}",
            },
            success: (data) => {
                $('#brandEditModel').modal('show');
                $('#brand_id').val(data.id);
                $('#name').val(data.name);
                $(`#status option[value='${data.status}']`).prop('selected', true);
            }
        })
    });

</script>

@endpush
</x-dashborad-layout>