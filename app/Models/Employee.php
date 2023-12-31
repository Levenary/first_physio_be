<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'gender',
        'photo',
        'is_active',
    ];
    public function sessions()
    {
        return $this->hasMany(Session::class, 'employee_id');
    }
}
