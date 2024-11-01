@extends('admin.layouts.master')

@section('content')
<div class="container">
    <h1>Foundr Messages</h1>
    <a href="{{ route('admin.foundr_messages.create') }}" class="btn btn-primary">Create Message</a>
    <table class="table mt-3">
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
            @foreach($messages as $message)
                <tr>
                    <td>{{ $message->id }}</td>
                    <td>{{ $message->title }}</td>
                    <td>
                        @if ($message->image)
                            <img src="{{ asset('topicImages/' . $message->image) }}" alt="{{ $message->title }}" style="width: 100px;">
                        @endif
                    </td>
                    <td>{{ $message->description }}</td>
                    <td>
                        <a href="{{ route('admin.foundr_messages.edit', $message) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('admin.foundr_messages.destroy', $message) }}" method="POST" style="display:inline;">
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
