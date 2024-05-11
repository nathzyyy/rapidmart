<?php

namespace App\Models\HumanResource;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $fillable = [
        'schedule_id',
        'employee_id',
        'date',
        'check_id',
        'check_out',
        'total_hours'
    ];
}