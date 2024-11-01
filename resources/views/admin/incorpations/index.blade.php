@extends('admin.layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Incorpations</h1>
            <a href="{{ route('admin.incorpations.create') }}" class="btn btn-primary mb-3">Create New Incorpation</a>

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($incorpations as $incorpation)
                        <tr>
                            <td>{{ $incorpation->id }}</td>
                            <td>{{ $incorpation->title }}</td>
                            <td>{{ Str::limit($incorpation->description, 50) }}</td>
                            <td>
                                <a href="{{ route('admin.incorpations.edit', $incorpation->id) }}" class="btn btn-warning btn-sm">Edit</a>

                                <form action="{{ route('admin.incorpations.destroy', $incorpation->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this item?');">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
