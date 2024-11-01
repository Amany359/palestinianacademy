@extends('admin.layouts.master')

@section('content')
    <div class="container">
        <h1>إدارة الأقسام</h1>
        <a href="{{ route('admin.sections.create') }}" class="btn btn-primary mb-3">إضافة قسم جديد</a>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>الصورة</th>
                    <th>العنوان</th>
                    <th>الوصف</th>
                    <th>الرابط</th>
                    <th>التحكم</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sections as $section)
                    <tr>
                        <td><img src="{{ asset('sectionImages/' . $section->image) }}" width="100" alt="{{ $section->title }}"></td>
                        <td>{{ $section->title }}</td>
                        <td>{{ $section->description }}</td>
                        <td>{{ $section->link ?? 'لا يوجد' }}</td>
                        <td>
                            <a href="{{ route('admin.sections.edit', $section->id) }}" class="btn btn-info">تعديل</a>
                            <form action="{{ route('admin.sections.destroy', $section->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">حذف</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
