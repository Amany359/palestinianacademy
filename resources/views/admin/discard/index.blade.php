<!-- resources/views/admin/discard/index.blade.php -->
@extends('admin.layouts.master')

@section('content')
    <div class="container">
        <h1>All Discards</h1>
        <a href="{{ route('admin.discard.create') }}" class="btn btn-primary mb-3">Create New Discard</a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($discards as $discard)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $discard->title }}</td>
                        <td>{{ $discard->description }}</td>
                        <td><img src="{{ asset('topicImages/' . $discard->image) }}" alt="Image" width="50"></td>
                        <td>
                            <a href="{{ route('admin.discard.edit', $discard->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('admin.discard.destroy', $discard->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
