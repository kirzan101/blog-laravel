<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'email',
        'contact_no'
    ];

    /**
     * get the all posts associated to teacher
     *
     * @return void
     */
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    /**
     * get the full name of the teacher
     *
     * @return string
     */
    function getCompleteName()
    {
        return sprintf('%s, %s', $this->last_name, $this->first_name);
    }
}
