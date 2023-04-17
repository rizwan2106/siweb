@extends('layouts.mainlayout')

@section('title', 'Deleted Equipment')

@section('content')

    <h1>Deleted Equipment List</h1>

    <div class="mt-5 d-flex justify-content-end">
        <a href="/equipments" class="btn btn-primary">Back</a>
    </div>

    <div class="mt-5">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
    </div>

    <div>
        <table class="my-5">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Code</th>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($deletedEquipments as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->equipment_code }}</td>
                    <td>{{ $item->name }}</td>
                    <td>
                        <a href="/equipment-restore/{{$item->slug}}">restore</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
