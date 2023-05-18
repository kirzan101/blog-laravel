<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accountability extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'emloyee_id',
        'item_id',
        'department_id',
        'status',
        'received_at',
        'returned_at',
    ];

    /**
     * Associate accountability to employee
     *
     * @return void
     */
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    /**
     * Associate item to employee
     *
     * @return void
     */
    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    /**
     * Associate department to employee
     *
     * @return void
     */
    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
