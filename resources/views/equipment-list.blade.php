@extends('layouts.mainlayout')

@section('title', 'Dashboard')

@section('page-name', 'Dashboard')

@section('content')

    <form action="" method="get">
        <div class="row">
            <div class="col-12 col-sm-6">
                <select name="category" id="category" class="form-control"></select>
                <option value="">Select Category</option>
                @foreach ($categories as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </div>
            <div class="col-12 col-sm-6">
                <div class="input-group mb-3">
                    <input type="text" name="name" class="form-control" placeholder="Search Equipment's Name">
                    <button class="btn btn-primary" type="submit">Search</button>
                </div>
            </div>
        </div>
    </form>

    <div class="my-5">
        <div class="row">

            @foreach ($equipments as $item)
                <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                    <div class="card h-100">
                        <img src="{{ $item->cover != null ? asset('storage/cover/'.$item->cover) : asset('images/cover-tv-xiaomi-official-a2.jpg') }}" class="card-img-top" draggable="false">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->equipment_code }}</h5>
                            <p class="card-text">{{ $item->name }}</p>
                            <p class="card-text text-end fw-bold {{ $item->status == 'in stock' ? 'text-success' : 'text-danger' }}">{{ $item->status }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection
