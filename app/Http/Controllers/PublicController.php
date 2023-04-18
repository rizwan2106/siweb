<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index()
    {
        $equipments = Equipment::all();
        return view('equipment-list', ['equipments' => $equipments]);
    }
}