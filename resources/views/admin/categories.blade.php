<x-dashborad-layout title="dashborad">
    <x-slot:head>
    <h1><i class="fa fa-home"></i> اقسام</h1>
    </x-slot:head>
<div class="row">
    <div class="col-xl-12">
        <div class="card mg-b-20">
            <div class="card-header pb-0">
                <div class="d-flex justify-content-between">
                    <a class="modal-effect btn btn-outline-primary btn-block" data-effect="effect-scale" data-toggle="modal" href="#modaldemo8">اضافة قسم</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive" id="ajax_responce_serarchDiv">
                    <table id="example1 categories-table" class="table  table-bordered table-hover  key-buttons text-md-nowrap" data-page-length='50' style="text-align: center">
                        <thead  class="custom-thead">
                            <tr>
                                <th class="border-bottom-0">#</th>
                                <th class="border-bottom-0">اسم </th>
                                <th class="border-bottom-0">المستخدم</th>
                                <th class="border-bottom-0"> صورة</th>
                                <th class="border-bottom-0">الحالة</th>
                                <th class="border-bottom-0">الاب</th>
                                <th class="border-bottom-0">العمليات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                            <tr>
                                <td>{{$loop->iteration }}</td>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->admin->name}}</td>
                                <td><img src="{{$category->image_url}}" width="150px" height="150px"></td>
                                <td>{{ $category->status_data }}</td>
                                <td>{{ $category->parent->name}}</td>
                                <td>
                                    <a class="modal-effect btn btn-sm btn-info" data-id="{{ $category->id }}" data-toggle="modal" id="showEditModelCategory" href="showEditModelCategory" title="تعديل"><i class="fa fa-edit"></i></a>
                                    <a class="modal-effect btn btn-sm btn-danger" id="deleteCoateory" data-effect="effect-scale" data-id="{{ $category->id }}" data-name="{{ $category->name }}" data-toggle="modal" href="deleteCoateory" title="حذف"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$categories->links()}}
                </div>
            </div>
        </div>
    </div>
    <div class="modal" id="modaldemo8">
        <div class="modal-dialog" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">اضافة قسم</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <form action="{{route('admin.categories.store')}}" id="myForm" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">اسم القسم</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name_add" name="name" value="{{old('name')}}">
                            @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">الحالة</label>
                            <select class="form-control @error('status') is-invalid @enderror" id="status_add" name="status">
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
                            <label for="exampleInputEmail1">الاب</label>
                            <select class="form-control @error('parent_id') is-invalid @enderror" id="parent_id_add" name="parent_id">
                                <option value="">-</option>
                                @foreach($parents as $parent)
                                <option value="{{$parent->id}}" @if(old('parent_id')==$parent->id) selected @endif>{{$parent->name}}</option>
                                @endforeach
                            </select>
                            @error('parent_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">صورة</label>
                            <input type="file" class="form-control @error('image') is-invalid @enderror" id="" name="image">
                            @error('image')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="modal-footer">
                            <button type="submit" id="submitButton" class="btn btn-success">تاكيد</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- End Basic modal -->
    </div>
    <!-- edit -->
    <div class="modal fade" id="categoryEditModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">تعديل القسم</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('admin.categories.update')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <input type="hidden" name="id" id="cat_id">
                            <label for="exampleInputEmail1">اسم القسم</label>
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
                            <label for="exampleInputEmail1">الاب</label>
                            <select class="form-control @error('parent_id') is-invalid @enderror" id="parent_id" name="parent_id">
                                <option value="">-</option>
                                @foreach($parents as $parent)
                                <option value="{{$parent->id}}" @if(old('parent_id')==$parent->id) selected @endif>{{$parent->name}}</option>
                                @endforeach
                            </select>
                            @error('parent_id')
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
    <x-delete-model route="admin.categories.delete" />
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
    $('body').on('click', '#showEditModelCategory', function() {
        var cat_id = $(this).data('id');
        $.ajax({
            type: "POST",
            url: '/admin/categories/edit/' + cat_id,
            dataType: "json",
            data: {
                "_token": "{{ csrf_token() }}",
            },
            success: (data) => {
                $('#categoryEditModel').modal('show');
                $('#cat_id').val(data.id);
                $('#name').val(data.name);
                $(`#status option[value='${data.status}']`).prop('selected', true);
                $(`#parent_id option[value='${data.parent_id}']`).prop('selected', true);
            }
        })
    });
    $('#categoryEditModel').on('hidden.bs.modal', function(event) {
        $(`#parent_id option[value='']`).prop('selected', true);
    })


    $(document).ready(function () {
            $('#myForm').on('submit', function (event) {
                event.preventDefault(); // منع الإرسال الافتراضي للنموذج
                
                const $submitButton = $('#submitButton');

                // تعطيل الزر
                $submitButton.prop('disabled', true).addClass('disabled').text('Processing...');

            });
        });


        $(document).ready(function() {
    $('#search').on('keyup', function() {
        var query = $(this).val(); // الحصول على النص المدخل
        if (query.length > 0) {
            $.ajax({
                url: '/admin/categories/search',
                method: 'GET',
                data: { query: query },
                success: function(response) {
                    // تحديث الجدول بالنتائج
                    $('table tbody').empty(); // مسح المحتوى القديم
                    response.forEach(function(category) {
                        $('table tbody').append(
                            `<tr>
                                <td>${category.name}</td>
                                <td>${category.created_at}</td>
                            </tr>`
                        );
                    });
                }
            });
        } else {
            // إذا كان الحقل فارغًا، مسح الجدول أو إظهار جميع الفئات
            $('#categories-table tbody').empty();
        }
    });
});
</script>

@endpush
</x-dashborad-layout>