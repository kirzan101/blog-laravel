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
    public function employees()
    {
        return $this->hasMany(Employee::class);
    }
    public function item()
    {
        return $this->hasMany(item::class);
    }
    public function department()
    {
<<<<<<< HEAD
        return $this->belongsTo(department::class);
=======
        return $this->hasMany(department::class);
>>>>>>> a0cdb98 (05/17/2023)
    }
}
