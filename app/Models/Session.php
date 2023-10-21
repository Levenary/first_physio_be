<?php

// File: Session.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    protected $fillable = [
        'purchase_order_id', 'employee_id', 'status', 'date_hours', 'is_active'
    ];

    public function employee()
    {
        return $this->hasMany(Employee::class, 'employee_id');
    }
}
