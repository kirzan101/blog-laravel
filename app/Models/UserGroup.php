<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserGroup extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'code',
        'description'
    ];
  public function department()
{
  return $this->belongsTo(Department::class);
}
public function users()
{
  return $this->hasMany(User::class);
}
}