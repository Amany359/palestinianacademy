@extends('admin.layouts.master')

@section('content')
    <div class="container">
        <h1>تعديل القسم</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.sections.update', $section->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">العنوان</label>
                <input type="text" name="title" class="form-control" id="title" value="{{ old('title', $section->title) }}">
            </div>
            <div class="form-group">
                <label for="description">الوصف</label>
                <textarea name="description" class="form-control" id="description">{{ old('description', $section->description) }}</textarea>
            </div>
            <div class="form-group">
                <label for="image">الصورة</label>
                <input type="file" name="image" class="form-control" id="image">
                <img src="{{ asset('sectionImages/' . $section->image) }}" width="100" alt="{{ $section->title }}" class="mt-3">
            </div>
            <div class="form-group">
                <label for="link">الرابط (اختياري)</label>
                <input type="url" name="link" class="form-control" id="link" value="{{ old('link', $section->link) }}">
            </div>
            <button type="submit" class="btn btn-success">تحديث</button>
            <a href="{{ route('admin.sections.index') }}" class="btn btn-secondary">إلغاء</a>
        </form>
    </div>
@endsection
