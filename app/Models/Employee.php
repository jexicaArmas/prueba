<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
  use SoftDeletes; 

  protected $table = 'employees';   
  protected $guarded  = ['id']; 
  protected $fillable = [
        'company_id',
        'name',
        'name',
        'email', 
        'phone'
    ];

  protected $hidden   = [];
  protected $dates    = ['created_at', 'updated_at', 'deleted_at'];

  public function company()
  {
    return $this->belongsTo(\App\Models\Company::class);
  }
}
