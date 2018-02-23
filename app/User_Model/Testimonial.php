<?php

namespace App\User_Model;

use Illuminate\Database\Eloquent\Model;
use App\User_Model\Mechanic;

class Testimonial extends Model
{
    protected $fillable = [
		'testimonial',
		'rating'
	];

    public function mechanic()
    {
    	return $this->hasMany(Mechanic::class);
    }
}
