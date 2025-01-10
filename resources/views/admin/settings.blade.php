<x-dashborad-layout title="dashborad">
    <x-slot:head>
    <h1><i class="fa fa-th-"></i> تعديل اعدادات الموقع </h1>
    </x-slot:head>
<div class="row">
    <div class="col-md-7">
        <div class="tile">
            <h3 class="tile-title">بيانات شخصية</h3>
            <div class="tile-body">
                <form style="
    overflow: hidden;" action="{{route('admin.settings.update')}}" method="POST" class="text-center" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{$setting->id}}">
                    <div class="form-group">
                        <label class="control-label">اسم </label>
                        <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" value="{{ old('name', $setting->name)}}" placeholder="يرجى ادخال اسم">
                        @error('name')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="control-label">وصف </label>
                        <textarea class="form-control @error('description') is-invalid @enderror"  name="description">{{$setting->description}}</textarea>
                        @error('description')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="control-label">رقم الجوال</label>
                        <input class="form-control @error('phone_number') is-invalid @enderror" type="number" name="phone_number" value="{{ old('phone_number', $setting->phone_number)}}" placeholder="Enter full phone_number">
                        @error('phone_number')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="control-label">facebook </label>
                        <input class="form-control @error('facebook') is-invalid @enderror" type="text" name="facebook" value="{{ old('facebook', $setting->facebook)}}" placeholder="يرجى ادخال اسم">
                        @error('facebook')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="control-label">twiter </label>
                        <input class="form-control @error('twiter') is-invalid @enderror" type="text" name="twiter" value="{{ old('twiter', $setting->twiter)}}" placeholder="يرجى ادخال اسم">
                        @error('twiter')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                                
                    <div class="form-group">
                        <label class="control-label">instagram </label>
                        <input class="form-control @error('instagram') is-invalid @enderror" type="text" name="instagram" value="{{ old('instagram', $setting->instagram)}}" placeholder="يرجى ادخال اسم">
                        @error('instagram')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="control-label">skyp </label>
                        <input class="form-control @error('skyp') is-invalid @enderror" type="text" name="skyp" value="{{ old('skyp', $setting->skyp)}}" placeholder="يرجى ادخال اسم">
                        @error('skyp')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="control-label">gmail </label>
                        <input class="form-control @error('gmail') is-invalid @enderror" type="text" name="gmail" value="{{ old('gmail', $setting->gmail)}}" placeholder="يرجى ادخال اسم">
                        @error('gmail')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="control-label">whatsapp </label>
                        <input class="form-control @error('whatsapp') is-invalid @enderror" type="text" name="whatsapp" value="{{ old('whatsapp', $setting->whatsapp)}}" placeholder="يرجى ادخال اسم">
                        @error('whatsapp')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="control-label">logo  </label>
                        <input class="form-control @error('logo') is-invalid @enderror" type="file" name="logo">
                        @error('logo')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <button class="btn btn-primary"><i class="fa fa-fw fa-lg fa-check-circle"></i>تعديل</button>
                </form>
            </div>
            <div class="tile-footer"> </div>
        </div>
    </div>
    <div class="col-md-5">
        <img src="{{asset($setting->logo)}}" width="250px" height="250px" alt="" />
    </div>
</div>
</x-dashborad-layout>