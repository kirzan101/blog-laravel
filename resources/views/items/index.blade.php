@extends('layouts.app')

@section('content')
    <div>
        <h2>Item List | <a href="/items/create" class="btn btn-primary">Add</a></h2>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Brand</th>
                    <th scope="col">Models</th>
                    <th scope="col">Description</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $item)
                    <tr>
                        <th>{{ $item->id }}</th>
                        <td>{{ $item->brand }}</td>
                        <td>{{ $item->model }}</td>
                        <td>{{ $item->description }}</td>
                        <td>
                            <a href="/items/{{ $item->id }}" class="btn btn-info">Show</a>
                            <a href="/items/{{ $item->id }}/edit" class="btn btn-warning text-white">Update</a>
                            <button type="submmit" id="deleteBtn" class="btn btn-danger" onclick="deleteRow({{ $item->id }})">Delete</button>
                            <form action="/items/{{ $item->id }}" id="deleteForm{{ $item->id }}" method="POST">
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
