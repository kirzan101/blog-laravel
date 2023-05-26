@extends('layouts.app')

@section('content')
    <div>
        <h2>Accountability List | <a href="/accountabilities/create" class="btn btn-primary">Add</a></h2>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Employee</th>
                    <th scope="col">Item</th>
                    <th scope="col">Department</th>
                    <th scope="col">Status</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($accountabilities as $accountability)
                    <tr>
                        <th>{{ $accountability->id }}</th>
                        <td>{{ $accountability->employee->getName() }}</td>
                        <td>{{ $accountability->item->getItemFull() }}</td>
                        <td>{{ $accountability->department->name }}</td>
                        <td>{{ $accountability->status }}</td>
                        <td>
                            <a href="/accountabilities/{{ $accountability->id }}" class="btn btn-info">Show</a>
                            <a href="/accountabilities/{{ $accountability->id }}/edit" class="btn btn-warning text-white">Update</a>
                            <button type="submmit" id="deleteBtn" class="btn btn-danger" onclick="deleteRow({{ $accountability->id }})">Delete</button>
                            <form action="/accountabilities/{{ $accountability->id }}" id="deleteForm{{ $accountability->id }}" method="POST">
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
