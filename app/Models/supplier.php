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
     * get the items
     *
     * @return collections
     */
    public function items()
    {
        return $this->hasMany(Item::class);
    }

    
}
