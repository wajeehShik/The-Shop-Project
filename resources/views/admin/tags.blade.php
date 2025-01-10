<x-dashborad-layout title="dashborad">
    <x-slot:head>
    <h1><i class="fa fa-list"></i> وسوم</h1>
    </x-slot:head>
<!-- row -->
<div class="row">
    <div class="col-xl-12">
        <div class="card mg-b-20">
            <div class="card-header pb-0">
                <div class="d-flex justify-content-between">
                    @can("وسوم-انشاء")
                    <a class="modal-effect btn btn-outline-primary btn-block" data-effect="effect-scale" data-toggle="modal" href="#modaldemo8">اضافة وسم</a>
                    @endcan
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive" id="ajax_responce_serarchDiv">
                    <table id="example1" class="table key-buttons text-md-nowrap  table-bordered table-hover  key-buttons text-md-nowrap" data-page-length='50' style="text-align: center">
                        <thead  class="custom-thead">
                            <tr>
                                <th class="border-bottom-0">#</th>
                                <th class="border-bottom-0">اسم الوسم</th>
                                <th class="border-bottom-0">المستخدم</th>
                                <th class="border-bottom-0">الحالة</th>
                                <th class="border-bottom-0">العمليات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tags as $tag)
                            <tr>
                                <td>{{$loop->iteration }}</td>
                                <td>{{ $tag->name }}</td>
                                <td>{{ $tag->admin->name }}</td>
                                <td>{{$tag->status_data}}</td>
                                <td>
                                    @can('وسوم-تعديل')
                                    <a class="modal-effect btn btn-sm btn-info" data-id="{{ $tag->id }}" data-toggle="modal" id="showEditModelTag" href="showEditModelTag" title="تعديل"><i class="fa fa-edit"></i></a>
                                    @endcan
                                    @can("وسوم-حذف")
                                    <a class="modal-effect btn btn-sm btn-danger" id="deleteTag" data-effect="effect-scale" data-id="{{ $tag->id }}" data-name="{{ $tag->name }}" data-toggle="modal" href="deleteTag" title="حذف"><i class="fa fa-trash"></i></a>
                                    @endcan
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="text-center">
                        {{$tags->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal" id="modaldemo8">
        <div class="modal-dialog" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">اضافة وسم</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <form action="{{route('admin.tags.store')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1"> وسم</label>
                            <input type="text" class="form-control  @error('name') is-invalid @enderror" id="name_add" name="name">
                            @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">الحالة</label>
                            <select class="form-control  @error('status') is-invalid @enderror" id="status_add" name="status">
                                <option value="0">غير مفعل</option>
                                <option value="1">مفعل</option>
                            </select>
                            @error('status')
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
    <div class="modal fade" id="tagEditModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">تعديل وسم</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form action="{{route('admin.tags.update')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <input type="hidden" name="id" id="tag_id">
                            <label for="recipient-name" class="col-form-label">اسم القسم:</label>
                            <input class="form-control  @error('name') is-invalid @enderror" name="name" id="name" type="text">
                            @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">الحالة</label>
                            <select class="form-control  @error('status') is-invalid @enderror" id="status" name="status">
                                <option value="0">غير مفعل</option>
                                <option value="1">مفعل</option>
                            </select>
                            @error('status')
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
    <!-- row closed -->
</div>
<!-- Container closed -->
</div>
<x-delete-model route="admin.tags.delete" />
<!-- main-content closed -->
@push('scripts')
<!-- Internal Data tables -->
<script>
    <?php if (!$errors->any()) { ?>
        $("#name_add").val("");
        $("#status_add").val("");
    <?php } ?>
    $('body').on('click', '#showEditModelTag', function() {
        var tag_id = $(this).data('id');
        $.ajax({
            type: "POST",
            url: '/admin/tags/edit/' + tag_id,
            dataType: "json",
            data: {
                "_token": "{{ csrf_token() }}",
            },
            success: (data) => {
                $('#tagEditModel').modal('show');
                $('#tag_id').val(data.id);
                $('#name').val(data.name);
                $(`#status option[value='${data.status}']`).prop('selected', true);
            }
        })
    });
</script>
@endpush
</x-dashborad-layout>