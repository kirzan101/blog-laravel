<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'contact_number',
        'position',
        'department_id',
        'user_id',
    ];

    /**
     * Associate user to employee
     *
     * @return object
     */
    public function stocks()
    {
        return $this->hasMany(Stock::class);
    }
}
