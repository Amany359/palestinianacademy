@extends('admin.layouts.master')

@section('content')
<div class="container">
    <h1>Create Foundr Message</h1>
    <form action="{{ route('admin.foundr_messages.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}">
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" name="image" id="image" class="form-control">
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" class="form-control">{{ old('description') }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Create Message</button>
        <a href="{{ route('admin.foundr_messages.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
