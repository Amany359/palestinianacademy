@extends('admin.layouts.master')

@section('content')
<div class="container">
    <h1>Goals</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('admin.goals.create') }}" class="btn btn-primary">Create New Goal</a>

    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($goals as $goal)
                <tr>
                    <td>{{ $goal->id }}</td>
                    <td>{{ $goal->title }}</td>
                    <td>{{ Str::limit($goal->description, 50) }}</td>
                    <td>
                        <a href="{{ route('admin.goals.edit', $goal) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('admin.goals.destroy', $goal) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this goal?');">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
