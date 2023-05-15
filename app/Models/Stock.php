<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'code',
        'serial_number',
        'manufacture_date',
        'item_id',
        'supplier_id'
    ];


    /**
     * get the list of stocks associated
     *
     * @return collections
     */
    public function stocks()
    {
        return $this->hasMany(Stock::class);
    }
}