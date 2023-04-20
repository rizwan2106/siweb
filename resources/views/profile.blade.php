@extends('layouts.mainlayout')

@section('title', 'Profile')

@section('content')

<div class="mt-5">
    <h2>Your Loan Log</h2>
    <x-loan-log-table :loanlog='$loan_logs' />
</div>

@endsection
