<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Supplier extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'address',
        'contact_number'
    ];
    
    /**
     * get the list of items associated supplier
     *
     * @return collections
     */
    public function items()
    {
        return $this->hasMany(Item::class);
    }

    
}
