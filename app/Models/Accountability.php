<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accountability extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'item_id',
        'department_id',
        'status'
    ];
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
    public function item()
    {
        return $this->belongsTo(item::class);
    }
    public function department()
    {
        return $this->belongsTo(department::class);
    }
}
