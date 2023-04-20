@extends('layouts.mainlayout')

@section('title', 'Loan Log')

@section('content')
    <h1>Loan Log List</h1>

    <div>
        <x-loan-log-table :loanlog='$loan_logs' />
    </div>
@endsection
