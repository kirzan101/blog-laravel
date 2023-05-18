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
    /**
     * associate department to employee
     *
     * @return object
     */
    public function employees()
    {
        return $this->hasMany(Employee::class);
    }

    public function userGroups()
    {
        return $this->hasMany(UserGroup::class);
    }
}
