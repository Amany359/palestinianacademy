@extends('admin.layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Edit Boord Director</h1>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.boordDirectors.update', $boordDirector->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $boordDirector->title) }}">
                </div>

                <div class="form-group">
                    <label for="image">Image</label>
                    @if ($boordDirector->image)
                        <img src="{{ asset('topicImages/' . $boordDirector->image) }}" alt="Image" width="100">
                    @endif
                    <input type="file" name="image" id="image" class="form-control mt-2">
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" class="form-control" rows="5">{{ old('description', $boordDirector->description) }}</textarea>
                </div>

                <button type="submit" class="btn btn-success">Update</button>
                <a href="{{ route('admin.boordDirectors.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection
