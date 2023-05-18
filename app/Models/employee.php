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
     * @return collections
     */
    public function user()
    {
        return $this->hasOne(User::class);
    }

        public function stocks()
        {

            return $this->hasMany(Stock::class);
        }
}
