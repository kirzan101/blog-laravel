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

  /**
   * Associate user group to department
   *
   * @return void
   */
  public function department()
  {
    return $this->belongsTo(Department::class);
  }

  /**
   * Get the list of users
   *
   * @return void
   */
  public function users()
  {
    return $this->hasMany(User::class);
  }
}
