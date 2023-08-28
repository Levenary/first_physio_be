<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branchs extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'branch_photo_id',
        'lat',
        'lng',
        'phone',
        'address',
        'operation_json',
        'is_active',
    ];
}
