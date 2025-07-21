@extends('layout.app')

@section('title', 'Students List')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">EPDA Academy</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <a href="{{ route('students.create') }}" class="btn btn-sm btn-outline-primary">Register</a>
        </div>
    </div>
</div>

<div class="container mt-4">
    <h2>Students List</h2>

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif


    <table class="table table-striped table-bordered border-primary">
        <thead class="table-info">
            <tr>
                <th>Number</th>
                <th>Name</th>
                <th>Gender</th>
                <th>Year</th>
                <th>Major</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
            <tr>
                <td>{{ $student->number }}</td>
                <td>{{ $student->name }}</td>
                <td>{{ $student->gender }}</td>
                <td>{{ $student->year }}</td>
                <td>{{ $student->major->name ?? '-' }}</td>
                <td>
                    <a href="{{ route('students.edit', $student->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Are you sure?')" class="btn btn-sm btn-danger">
                            Delete
                        </button>
                        <a href="{{ route('students.detail', $student->major->id) }}" class="btn btn-sm btn-primary">Detail</a>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection