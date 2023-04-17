@extends('layouts.mainlayout')

@section('title', 'Delete Equipment')

@section('content')
    <h2>Are you sure to delete equipment {{$equipment->name}} ?</h2>
    <div class="mt-5">
        <a href="/equipment-destroy/{{$equipment->slug}}" class="btn btn-danger me-5">Sure</a>
        <a href="/equipments" class="btn btn-primary">Cancel</a>
    </div>
@endsection
