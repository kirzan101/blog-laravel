@extends('layouts.app')

@section('content')
    <div>
        <h2>User Group List | <a href="/usergroups/create" class="btn btn-primary">Add</a></h2>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Code</th>
                    <th scope="col">Department</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($usergroups as $usergroup)
                    <tr>
                        <th>{{ $usergroup->id }}</th>
                        <td>{{ $usergroup->name }}</td>
                        <td>{{ $usergroup->code }}</td>
                        <td>{{ $usergroup->department->name }}</td>
                        <td>
                            <a href="/usergroups/{{ $usergroup->id }}" class="btn btn-info">Show</a>
                            <a href="/usergroups/{{ $usergroup->id }}/edit" class="btn btn-warning text-white">Update</a>
                            <button type="submmit" id="deleteBtn" class="btn btn-danger" onclick="deleteRow({{ $usergroup->id }})">Delete</button>
                            <form action="/usergroups/{{ $usergroup->id }}" id="deleteForm{{ $usergroup->id }}" method="POST">
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
