@extends('admin.layouts.master')

@section('content')
<div class="container">
    <h1>Edit Goal</h1>

    <form action="{{ route('admin.goals.update', $goal) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" class="form-control" id="title" value="{{ old('title', $goal->title) }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" class="form-control" id="description" rows="3">{{ old('description', $goal->description) }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Update Goal</button>
        <a href="{{ route('admin.goals.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
