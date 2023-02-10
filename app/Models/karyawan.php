<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class karyawan extends Model
{
    use HasFactory;

    protected $table = 'karyawan';

    protected $fillable = ['first_name', 'last_name', 'address', 'city_state_zip', 'home_phone', 'cell_phone', 'email', 'applied_position', 'expected_salary', 'photo'];
}
