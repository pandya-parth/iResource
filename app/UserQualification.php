<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserQualification extends Model
{
	/**
	 * Fillable fields.
	 *
	 * @var $fillable array
	 */
   protected $fillable = [
   	'degree', 'university', 'specialisation', 'achievements', 'passing_year', 'percentage'
    ];
}
