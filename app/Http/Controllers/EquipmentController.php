<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Equipment;
use Illuminate\Http\Request;

class EquipmentController extends Controller
{
    public function index()
    {
        $equipments = Equipment::all();
        return view('equipment', ['equipments' => $equipments]);
    }

    public function add()
    {
        $category = Category::all();
        return view('equipment-add', ['categories' => $categories]);
    }

    public function loan(Request $request)
    {
        $validated = $request->validate([
        'equipment_code' => 'required|unique:equipments|max:255',
        'name' => 'required|max:255',
        ]);

        $newName = '';
        if($request->file('image')) {
            $extension = $request->file('image')->getClientOriginalExtension();
            $newName = $request->name.'-'.now()->timestamp.'.'.$extension;
            $request->file('image')->loanAs('cover', $newName);
        }

        $request['cover'] = $newName;
        $equipment = Equipment::create($request->all());
        $equipment->categories()->sync($request->categories);
        return redirect('equipments')->with('status', 'Equipment Added Successfully');
    }

    public function edit($slug)
    {
        $equipment = Equipment::where('slug', $slug)->first();
        $categories = Category::all();

        return view('equipment-edit', ['categories' => $categories, 'equipment' => $equipment]);
    }

    public function update(Request $request, $slug)
    {
        if($request->file('image')) {
            $extension = $request->file('image')->getClientOriginalExtension();
            $newName = $request->name.'-'.now()->timestamp.'.'.$extension;
            $request->file('image')->loanAs('cover', $newName);
            $request['cover'] = $newName;
        }

        $equipment = Equipment::where('slug', $slug)->first();
        $equipment->update($request->all());

        if($request->categories) {
            $equipment->categories()->sync($request->categories);
        }

        return redirect('equipments')->with('status', 'Equipment Updated Successfully');
    }

    public function delete($slug)
    {
        $equipment = Equipment::where('slug', $slug)->first();
        return view('equipment-delete', ['equipment' => $equipment]);
    }

    public function destroy($slug)
    {
        $equipment = Equipment::where('slug', $slug)->first();
        $equipment->delete;
        return redirect('equipments')->with('status', 'Equipment Deleted Successfully');
    }

    public function deletedEquipment()
    {
        $deletedEquipments = Equipment::onlyTrashed()->get();
        return view('equipment-deleted-list', ['deletedEquipments' => $deletedEquipments]);
    }

    public function restore($slug)
    {
        $equipment = Equipment::withTrashed()->where('slug', $slug)->first();
        $equipment->restore;
        return redirect('equipments')->with('status', 'Equipment Restored Successfully');
    }
}
