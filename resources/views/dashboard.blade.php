@extends('layouts.mainlayout')

@section('title', 'Dashboard')

@section('content')
    <h1>Welcome, {{Auth::user()->username}}</h1>
    <div class="row my-5">
        <div class="col-lg-4">
            <div class="card-data equipment">
                <div class="row">
                    <div class="col-6"><i class="bi bi-pencil"></i></div>
                    <div class="col-6 d-flex flex-column justify-content-center align-item-end">
                        <div class="card-desc">Equipments</div>
                        <div class="card-count">{{$equipment_count}}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card-data category">
                <div class="row">
                    <div class="col-6"><i class="bi bi-list-task"></i></div>
                    <div class="col-6 d-flex flex-column justify-content-center align-item-end">
                        <div class="card-desc">Categories</div>
                        <div class="card-count">{{$category_count}}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card-data user">
                <div class="row">
                    <div class="col-6"><i class="bi bi-people"></i></div>
                    <div class="col-6 d-flex flex-column justify-content-center align-item-end">
                        <div class="card-desc">Users</div>
                        <div class="card-count">{{$user_count}}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-5">
        <h2>#Loan Log</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Mahasiswa</th>
                    <th>Equipment Title</th>
                    <th>Loan Date</th>
                    <th>Return Date</th>
                    <th>Actual Return Date</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td colspan="7" style="text-align: center">No Data</td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
