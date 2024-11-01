@extends('admin.layouts.master')

@section('content')
    <div class="container">
        <h2>Add New Employee</h2>

        <form action="{{ route('admin.employees.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>

            <div class="form-group">
                <label for="job_title">Job Title</label>
                <input type="text" class="form-control" id="job_title" name="job_title" required>
            </div>

            <div class="form-group">
                <label for="academic_degrees">Academic Degrees</label>
                <input type="text" class="form-control" id="academic_degrees" name="academic_degrees" required>
            </div>

            <div class="form-group">
                <label for="professional_experiences">Professional Experiences</label>
                <textarea class="form-control" id="professional_experiences" name="professional_experiences" required></textarea>
            </div>

            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" name="image" class="form-control-file">
            </div>

            <button type="submit" class="btn btn-primary">Save Employee</button>
        </form>
    </div>
@endsection
