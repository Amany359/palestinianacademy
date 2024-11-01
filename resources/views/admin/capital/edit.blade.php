@extends('admin.layouts.master')

@section('content')
<div class="container">
    <h1>Edit Capital</h1>

    <form action="{{ route('admin.capital.update', $capital) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $capital->name) }}" required>
        </div>

        <div class="form-group">
            <label for="employee_id">Employee</label>
            <select name="employee_id" class="form-control" required>
                <option value="">Select Employee</option>
                @foreach($employees as $employee)
                    <option value="{{ $employee->id }}" {{ $capital->employee_id == $employee->id ? 'selected' : '' }}>{{ $employee->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" name="image" class="form-control" accept="image/*">
            @if($capital->image)
                <img src="{{ asset($capital->image) }}" alt="{{ $capital->name }}" width="100">
            @endif
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" class="form-control">{{ old('description', $capital->description) }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Update Capital</button>
    </form>
</div>
@endsection
