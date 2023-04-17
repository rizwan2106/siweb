@extends('layouts.mainlayout')

@section('title', 'Dashboard')

@section('content')
    <h1>Equipment List</h1>

    <div class="my-5 d-flex justify-content-end">
        <a href="equipment-deleted" class="btn btn-secondary me-3">View Deleted Data</a>
        <a href="equipment-add" class="btn btn-primary">Add Data</a>
    </div>

    <div class="mt-5">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>

    <div class="my-5">
        <table class="table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Code</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($equipments as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->equipment_code }}</td>
                    <td>{{ $item->name }}</td>
                    <td>
                        @foreach ($item->categories as $category)
                            {{ $category->name }} <br>
                        @endforeach
                    </td>
                    <td>{{ $item->status }}</td>
                    <td>
                        <a href="/equipment-edit/{{$item->slug}}">edit</a>
                        <a href="/equipment-delete/{{$item->slug}}">delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
