<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'contact_number'
    ];
        /**
     * get the list of comments associated to Post
     *
     * @return collections
     */
    public function item()
    {
        return $this->hasMany(Item::class);
    }


}
