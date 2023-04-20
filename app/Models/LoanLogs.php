<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoanLogs extends Model
{
    use HasFactory;

    protected $table = 'loan_logs';

    protected $fillable = [
        'equipment_id', 'mahasiswa_id', 'loan_date', 'return_date'
    ];
}