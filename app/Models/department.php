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
     * Get the list of employees
     *
     * @return void
     */
    public function employees()
    {
        return $this->hasMany(Employee::class);
    }

    /**
     * Get the list of user groups
     *
     * @return void
     */
    public function userGroups()
    {
        return $this->hasMany(UserGroup::class);

    }

    /**
     * Get the list of items
     *
     * @return void
     */
    public function items()
    {
        return $this->hasMany(Item::class);
    }
}
