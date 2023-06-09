<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\LoanLogs;
use App\Models\Equipment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class EquipmentLoanController extends Controller
{
    public function index()
    {
        $user = User::where('id', '!=', 1)->where('status', '!=', 'inactive')->get();
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

    public function returnEquipment()
    {
        $user = User::where('id', '!=', 1)->where('status', '!=', 'inactive')->get();
        $equipments = Equipment::all();
        return view('return-equipment', ['users' => $users, 'equipments' => $equipments]);
    }

    public function saverReturnEquipment(Request $request)
    {
        $loan = LoanLogs::where('user_id', $request->user_id)->where('equipment_id', $request->equipment_id)->where('actual_return_date', '!=', null)->count();
        $loanData = $loan->first();
        $countData = $loan->count();

        if($countData == 1) {
            $loanData->actual_return_date = Carbon::now()->toDateString();
            $loanData->save();

            Session::flash('message', 'The equipment is returned successfully');
            Session::flash('alert-class', 'alert-success');
            return redirect('equipment-return');
        }
        else {
            Session::flash('message', 'There is error in process');
            Session::flash('alert-class', 'alert-danger');
            return redirect('equipment-return');
        }
    }
}