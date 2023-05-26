<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use HasFactory, SoftDeletes;

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
     * Associate department to user
     *
     * @return object
     */
    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    /**
     * get the list of comments associated to Post
     *
     * @return object
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getName()
    {
        return sprintf('%s, %s', $this->last_name, $this->first_name);
    }
}
