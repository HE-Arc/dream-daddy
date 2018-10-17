<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Donor extends Model
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'user_id','eye_color','skin_color','hair_color','medical_antecedents','family_antecedents',
  ];



}
