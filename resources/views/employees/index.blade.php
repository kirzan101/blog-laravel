@extends('layouts.app')

@section('content')
    <div>
        @include('includes.notification')

        <h2>Employee List | <a href="/employees/create" class="btn btn-primary">Add</a></h2>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Position</th>
                    <th scope="col">Email</th>
                    <th scope="col">Department</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($employees as $employee)
                    <tr>
                        <th>{{ $employee->id }}</th>
                        <td>{{ $employee->getName() }}</td>
                        <td>{{ $employee->position }}</td>
                        <td>{{ $employee->user->email }}</td>
                        <td>{{ $employee->department->code }}</td>
                        <td>
                            <a href="/employees/{{ $employee->id }}" class="btn btn-info">Show</a>
                            <a href="/employees/{{ $employee->id }}/edit" class="btn btn-warning text-white">Update</a>
                            <button type="submmit" id="deleteBtn" class="btn btn-danger"
                                onclick="deleteRow({{ $employee->id }})">Delete</button>
                            <form action="/employees/{{ $employee->id }}" id="deleteForm{{ $employee->id }}" method="POST">
                                @method('DELETE')
                                @csrf
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script>
        function deleteRow(id) {
            document.getElementById("deleteForm" + id).submit();
        }
    </script>
@endsection
