<!-- resources/views/admin/discard/edit.blade.php -->
@extends('admin.layouts.master')

@section('content')
    <div class="container">
        <h1>Edit Discard</h1>

        <form action="{{ route('admin.discard.update', $discard->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control" value="{{ old('title', $discard->title) }}">
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" class="form-control">{{ old('description', $discard->description) }}</textarea>
            </div>

            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" name="image" class="form-control-file">
                <br>
                <img src="{{ asset('topicImages/' . $discard->image) }}" alt="Image" width="100">
            </div>

            <button type="submit" class="btn btn-success">Update</button>
        </form>
    </div>
@endsection
