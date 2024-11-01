@extends('admin.layouts.master')

@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="page-header-left">
                            <h3>إعدادات الموقع</h3>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <ol class="breadcrumb pull-right">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.settings.index') }}">
                                    <i data-feather="home"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item">لوحة التحكم</li>
                            <li class="breadcrumb-item active">إعدادات الموقع</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row product-adding">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h5>الاعدادات</h5>
                        </div>
                        <div class="card-body">
                            <div class="digital-add needs-validation">
                                <form action="{{ route('admin.settings.update', $setting->id) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('put')

                                    @if($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif

                                    <!-- Logo Upload -->
                                    <div class="form-group">
                                        <label for="validationCustom05" class="col-form-label pt-0">لوجو الموقع</label>
                                        <input class="form-control" id="validationCustom05" type="file" name="logo">
                                        @if($setting->logo)
                                            <img src="{{ asset('settingImages/' . $setting->logo) }}" alt="Logo" width="100">
                                        @endif
                                    </div>

                                    <!-- Favicon Upload -->
                                    <div class="form-group">
                                        <label for="favicon" class="col-form-label pt-0">فافيكون</label>
                                        <input class="form-control" id="favicon" type="file" name="favicon">
                                        @if($setting->favicon)
                                            <img src="{{ asset('settingImages/' . $setting->favicon) }}" alt="Favicon" width="50">
                                        @endif
                                    </div>

                                    <!-- Name -->
                                    <div class="form-group">
                                        <label for="validationCustom01" class="col-form-label pt-0"><span>*</span> اسم الموقع</label>
                                        <input class="form-control" id="validationCustom01" type="text" name="name" value="{{ $setting->name }}">
                                    </div>

                                    <!-- Description -->
                                    <div class="form-group">
                                        <label for="description">وصف الموقع</label>
                                        <textarea name="description" class="form-control">{{ $setting->description }}</textarea>
                                    </div>

                                    <!-- Email -->
                                    <div class="form-group">
                                        <label for="validationCustom02" class="col-form-label"><span>*</span> البريد الإلكتروني</label>
                                        <input class="form-control" id="validationCustom02" type="text" name="email" value="{{ $setting->email }}">
                                    </div>

                                    <!-- Phone -->
                                    <div class="form-group">
                                        <label for="validationCustomtitle" class="col-form-label pt-0">رقم الهاتف</label>
                                        <input class="form-control" id="validationCustomtitle" type="text" name="phone" value="{{ $setting->phone }}">
                                    </div>

                                    <!-- Address -->
                                    <div class="form-group">
                                        <label for="validationCustomtitle" class="col-form-label pt-0">العنوان</label>
                                        <input class="form-control" id="validationCustomtitle" type="text" name="address" value="{{ $setting->address }}">
                                    </div>

                                    <!-- Social Links -->
                                    <div class="form-group">
                                        <label for="validationCustomtitle" class="col-form-label pt-0">رابط الفيس بوك</label>
                                        <input class="form-control" id="validationCustomtitle" type="text" name="facebook" value="{{ $setting->facebook }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="validationCustomtitle" class="col-form-label pt-0">Messenger</label>
                                        <input class="form-control" id="validationCustomtitle" type="text" name="messenger" value="{{ $setting->messenger }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="validationCustomtitle" class="col-form-label pt-0">حساب الانستجرام</label>
                                        <input class="form-control" id="validationCustomtitle" type="text" name="instagram" value="{{ $setting->instagram }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="validationCustomtitle" class="col-form-label pt-0">اليوتيوب</label>
                                        <input class="form-control" id="validationCustomtitle" type="text" name="youtube" value="{{ $setting->youtube }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="validationCustomtitle" class="col-form-label pt-0">Telegram</label>
                                        <input class="form-control" id="validationCustomtitle" type="text" name="telegram" value="{{ $setting->telegram }}">
                                    </div>

                                    <!-- Submit Button -->
                                    <div class="form-group">
                                        <button class="btn btn-primary" type="submit">حفظ</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
