<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'serial_number',
        'manufacture_date',
        'item_id',
        'supplier_id'
    ];

    /**
     * Associate stock to item
     *
     * @return void
     */
    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    /**
     * Associete stock to supplier
     *
     * @return void
     */
    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

}