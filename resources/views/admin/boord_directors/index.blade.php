@extends('admin.layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Boord Directors</h1>
            <a href="{{ route('admin.boordDirectors.create') }}" class="btn btn-primary mb-3">Create New Boord Director</a>

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
                        <th>Image</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($boordDirectors as $boordDirector)
                        <tr>
                            <td>{{ $boordDirector->id }}</td>
                            <td>{{ $boordDirector->title }}</td>
                            <td>
                                @if($boordDirector->image)
                                    <img src="{{ asset('topicImages/' . $boordDirector->image) }}" alt="Image" width="100">
                                @else
                                    No Image
                                @endif
                            </td>
                            <td>{{ $boordDirector->description }}</td>
                            <td>
                                <a href="{{ route('admin.boordDirectors.edit', $boordDirector->id) }}" class="btn btn-warning btn-sm">Edit</a>

                                <form action="{{ route('admin.boordDirectors.destroy', $boordDirector->id) }}" method="POST" style="display:inline;">
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
