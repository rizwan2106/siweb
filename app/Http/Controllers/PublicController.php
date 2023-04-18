<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Equipment;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all();

        if ($request->category || $request->name) {
            $equipments = Equipment::where('name', 'like', '%'.$request->name.'%')
                                ->whereHas('categories', function($q) use($request) {
                                    $q->where('categories.id', $request->category);
                                })
                                ->get();
        }
        else {
            $equipments = Equipment::all();
        }

        return view('equipment-list', ['equipments' => $equipments, 'categories' => $categories]);
    }
}