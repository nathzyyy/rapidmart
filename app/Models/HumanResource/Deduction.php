<?php

namespace App\Models\HumanResource;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deduction extends Model
{
    use HasFactory;

    protected $fillable = [

        'deduction_description',
        'amount',
        'deduction_date'
    ];


}