<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accountability extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'emloyee_id',
        'item_id',
        'department_id',
        'status'
    ];
}
