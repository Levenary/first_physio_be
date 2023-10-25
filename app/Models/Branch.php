<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    protected $fillable = ['name', 'lat', 'lng', 'phone', 'address', 'operation_json', 'is_active'];
    protected $casts = [
        'operation_json' => 'json',
    ];
    public function PurchaseOrde()
    {
        return $this->hasMany(PurchaseOrder::class, 'branch_id', 'id');
    }
}
