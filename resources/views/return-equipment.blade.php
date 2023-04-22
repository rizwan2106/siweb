@extends('layouts.mainlayout')

@section('title', 'Equipment Return')

@section('content')

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <div class="col-12 col-md-8 offset-md-2 col-lg-6 offset-md-3">
        <h1>Equipment Return Form</h1>

        <div class="mt-5">
            @if (session('message'))
                <div class="alert {{session('alert-class')}}">
                    {{ session('message') }}
                </div>
            @endif
        </div>

        <form action="equipment-return" method="post">
            @csrf
            <div class="mb-3">
                <label for="user" class="form-label">User</label>
                <select name="mahasiswa_id" id="user" class="form-control inputbox">
                    <option value="">Select User</option>
                    @foreach ($users as $item)
                        <option value="{{ $item->id }}">{{ $item->username }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="equipment" class="form-label">Equipment</label>
                <select name="equipment_id" id="equipment" class="form-control inputbox">
                    <option value="">Select Equipment</option>
                    @foreach ($equipments as $item)
                        <option value="{{ $item->id }}">{{ $item->equipment_code }} {{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <button type="submit" class="btn btn-primary w-100">Submit</button>
            </div>
        </form>
    </div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('.inputbox').select2();
    });
</script>
@endsection
