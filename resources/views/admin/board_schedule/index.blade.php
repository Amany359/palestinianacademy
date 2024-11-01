@extends('admin.layouts.master')

@section('content')
    <div class="container">
        <h1>Board Schedules</h1>
        <a href="{{ route('admin.board_schedule.create') }}" class="btn btn-primary mb-3">Create New Board Schedule</a>

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
                    <th>Employee Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($boardSchedules as $boardSchedule)
                    <tr>
                        <td>{{ $boardSchedule->id }}</td>
                        <td>{{ $boardSchedule->title }}</td>
                        <td>{{ $boardSchedule->employee->name }}</td>
                        <td>
                            <td>
                                @if($boardSchedule->image)
                                    <img src="{{ asset(str_replace('public', 'storage', $boardSchedule->image)) }}" alt="{{ $boardSchedule->name }}" width="100">
                                @endif
                            </td>
                            <td>{{ $boardSchedule->employee->name }}</td>
                            <td>

                            <a href="{{ route('admin.board_schedule.edit', $boardSchedule->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('admin.board_schedule.destroy', $boardSchedule->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
