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
    'description',
    'department_id'
  ];
  /**
   * associate usergroup to department
   *
   * @return object
   */
  public function department()
  {
    return $this->belongsTo(Department::class);
  }

  /**
   * get the list of users associated to usergroup
   *
   * @return collections
   */
  public function users()
  {
    return $this->hasMany(User::class);
  }
}
