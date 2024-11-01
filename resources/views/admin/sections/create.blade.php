@extends('admin.layouts.master')

@section('content')
    <div class="container">
        <h1>إضافة قسم جديد</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.sections.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">العنوان</label>
                <input type="text" name="title" class="form-control" id="title" value="{{ old('title') }}">
            </div>
            <div class="form-group">
                <label for="description">الوصف</label>
                <textarea name="description" class="form-control" id="description">{{ old('description') }}</textarea>
            </div>
            <div class="form-group">
                <label for="image">الصورة</label>
                <input type="file" name="image" class="form-control" id="image">
            </div>
            <div class="form-group">
                <label for="link">الرابط (اختياري)</label>
                <input type="url" name="link" class="form-control" id="link" value="{{ old('link') }}">
            </div>
            <button type="submit" class="btn btn-success">حفظ</button>
            <a href="{{ route('admin.sections.index') }}" class="btn btn-secondary">إلغاء</a>
        </form>
    </div>
@endsection
