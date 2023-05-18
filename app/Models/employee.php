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
        'user_id'
    ];

    /**
     * Associate employee to user
     *
     * @return object
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Associate employee to department
     *
     * @return void
     */
    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
