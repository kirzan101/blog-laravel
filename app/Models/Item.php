<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $fillable = [
        'description',
        'brand',
        'model',
        'department_id',
        'supplier_id',
    ];
    //*this function belongs to supplier
    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
    //*this function belongs to department
    public function department()
    {
        return $this->belongsTo(Department::class);
    }
    //*this function belongs to stocks
    public function stocks()
    {
        return $this->hasMany(Stock::class);
    }
}
