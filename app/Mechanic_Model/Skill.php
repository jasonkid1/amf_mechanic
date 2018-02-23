<?php

namespace App\Mechanic_Model;

use Illuminate\Database\Eloquent\Model;
use App\User_Model\Mechanic;

class Skill extends Model
{
    protected $fillable = [
    	'skill',
    	'amount'
    ];

}
