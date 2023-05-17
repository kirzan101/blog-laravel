<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'code', 
        'contact_number', 
        'description'
    ];
    public function department()
    {
        return $this->hasOne(Department::class);
    }
}
