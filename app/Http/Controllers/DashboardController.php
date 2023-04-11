<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Category;
use App\Models\Equipment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $equipmentCount = Equipment::count();
        $categoryCount = Category::count();
        $userCount = User::count();
        return view('dashboard', ['equipment_count' => $equipmentCount, 'category_count' => $categoryCount, 'user_count' => $userCount]);
    }
}