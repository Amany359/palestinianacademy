@extends('admin.layouts.master')

@section('content')
<div class="container">
    <h1>Edit Employee</h1>
    
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.employees.update', $employee->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $employee->name }}" required>
        </div>

        <div class="form-group">
            <label for="job_title">Job Title</label>
            <input type="text" name="job_title" id="job_title" class="form-control" value="{{ $employee->job_title }}" required>
        </div>

        <div class="form-group">
            <label for="academic_degrees">Academic Degrees</label>
            <textarea name="academic_degrees" id="academic_degrees" class="form-control">{{ $employee->academic_degrees }}</textarea>
        </div>

        <div class="form-group">
            <label for="professional_experiences">Professional Experiences</label>
            <textarea name="professional_experiences" id="professional_experiences" class="form-control">{{ $employee->professional_experiences }}</textarea>
        </div>

        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" name="image" class="form-control-file">
            <br>
            <img src="{{ asset('topicImages/' . $employee->image) }}" alt="Image" width="100">
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('admin.employees.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
