<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\LoanLogs;
use App\Models\Equipment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class EquipmentLoanController extends Controller
{
    public function index()
    {
        $user = User::where('id', '!=', 1)->get();
        $equipments = Equipment::all();
        return view('equipment-loan', ['users' => $users, 'equipments' => $equipments]);
    }

    public function stmm(Request $request)
    {
        $request['loan_date'] = Carbon::now()->toDateString();
        $request['return_date'] = Carbon::now()->addDay(3)->toDateString();

        $equipment = Equipment::findOrFail($request->equipment_id)->only('status');

        if($equipment['status'] != 'in stock') {
            Session::flash('message', 'Cannot loan, the equipment is not available');
            Session::flash('alert-class', 'alert-danger');
            return redirect('equipment-loan');
        }
        else {
            $count = LoanLogs::where('mahasiswa_id', $request->mahasiswa_id)->where('actual_return_date', null)->count();
            
            if($count >= 3) {
                Session::flash('message', 'Cannot loan, user has reach limit of equipment');
                Session::flash('alert-class', 'alert-danger');
                return redirect('equipment-loan');
            }
            else {
                try {
                    DB::beginTransaction();
    
                    LoanLogs::create($request->all());
    
                    $equipment = Equipment::findOrFail($request->equipment_id);
                    $equipment->status = 'not available';
                    $equipment->save();
                    DB::commit();
    
                    Session::flash('message', 'Loan Equipment Success!');
                    Session::flash('alert-class', 'alert-success');
                    return redirect('equipment-loan');
                } catch (\Throwable $th) {
                    DB::rollBack();
                }
            }
        }
    }
}