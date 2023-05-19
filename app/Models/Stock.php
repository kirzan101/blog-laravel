<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Stock extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'code',
        'serial_number',
        'manufacture_date',
        'item_id',
    ];

    /**
     * get the list of items associated to Post
     *
     * @return object
     */
    public function item()
    {
        return $this->belongsTo(Item::class);
    }
}
