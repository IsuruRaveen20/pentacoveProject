<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    const TYPE = ['MANAGER' => 1, 'WORKER' => 2];

    protected $fillable = [
        'emp_no',
        'first_name',
        'last_name',
        'email',
        'nic',
        'mobile_no',
        'land_no',
        'birthday',
        'gender',
        'designation',
        'street_address',
        'status',
    ];
}
