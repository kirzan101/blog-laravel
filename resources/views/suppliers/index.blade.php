@extends('layouts.app')

@section('content')
    <div>
        <h2>Supplier List | <a href="/suppliers/create" class="btn btn-primary">Add</a></h2>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Contact Number</th>
                    <th scope="col">Address</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($suppliers as $supplier)
                    <tr>
                        <th>{{ $supplier->id }}</th>
                        <td>{{ $supplier->name }}</td>
                        <td>{{ $supplier->contact_number }}</td>
                        <td>{{ $supplier->Address }}</td>
                        <td>
                            <a href="/suppliers/{{ $supplier->id }}" class="btn btn-info">Show</a>
                            <a href="/suppliers/{{ $supplier->id }}/edit" class="btn btn-warning text-white">Update</a>
                            <button type="submmit" id="deleteBtn" class="btn btn-danger" onclick="deleteRow({{ $supplier->id }})">Delete</button>
                            <form action="/suppliers/{{ $supplier->id }}" id="deleteForm{{ $supplier->id }}" method="POST">
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
