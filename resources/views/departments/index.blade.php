@extends('layouts.app')

@section('content')
    <div>
        <h2>Department List | <a href="/departments/create" class="btn btn-primary">Add</a></h2>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Code</th>
                    <th scope="col">Contact Number</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($departments as $department)
                    <tr>
                        <th>{{ $department->id }}</th>
                        <td>{{ $department->name }}</td>
                        <td>{{ $department->code }}</td>
                        <td>{{ $department->contact_number }}</td>
                        <td>
                            <a href="/departments/{{ $department->id }}" class="btn btn-info">Show</a>
                            <a href="/departments/{{ $department->id }}/edit" class="btn btn-warning text-white">Update</a>
                            <button type="submmit" id="deleteBtn" class="btn btn-danger" onclick="deleteRow({{ $department->id }})">Delete</button>
                            <form action="/departments/{{ $department->id }}" id="deleteForm{{ $department->id }}" method="POST">
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
