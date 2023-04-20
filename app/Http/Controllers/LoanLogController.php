<?php

namespace App\Http\Controllers;

use App\Models\LoanLogs;
use Illuminate\Http\Request;

class LoanLogController extends Controller
{
    public function index()
    {
        $loanlogs = LoanLogs::with(['mahasiswa', 'equipment'])->get();
        return view('loanlog', ['loan_logs' => $loanlogs]);
    }
}