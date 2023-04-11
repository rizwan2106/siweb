<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoanLogController extends Controller
{
    public function index()
    {
        return view('loanlog');
    }
}