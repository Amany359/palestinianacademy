@extends('admin.layouts.master')

@section('content')
<div class="container">
    <h1>Capitals</h1>
    <a href="{{ route('admin.capital.create') }}" class="btn btn-primary">Add New Capital</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Employee</th>
                <th>Description</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($capitals as $capital)
                <tr>
                    <td>{{ $capital->name }}</td>
                    <td>{{ $capital->employee->name }}</td>
                    <td>{{ $capital->description }}</td>
                    <td>
                        @if($capital->image)
                            <img src="{{ asset($capital->image) }}" alt="{{ $capital->name }}" width="100">
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.capital.edit', $capital) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('admin.capital.destroy', $capital) }}" method="POST" style="display:inline;">
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
