@extends('admin.layouts.master')

@section('content')
    <div class="container">
        <h2>Employees</h2>
        <a href="{{ route('admin.employees.create') }}" class="btn btn-primary mb-3">Add New Employee</a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Job Title</th>
                    <th>Academic Degrees</th>
                    <th>Professional Experiences</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($employees as $employee)
                    <tr>
                        <td>{{ $employee->name }}</td>
                        <td>{{ $employee->job_title }}</td>
                        <td>{{ $employee->academic_degrees }}</td>
                        <td>{{ $employee->professional_experiences }}</td>
                        <td><img src="{{ asset('topicImages/' . $employee->image) }}" alt="Image" width="50"></td>
                        <td>
                        
                            <a href="{{ route('admin.employees.edit', $employee->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('admin.employees.destroy', $employee->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
