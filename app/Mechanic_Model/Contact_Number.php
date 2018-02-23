<?php

namespace App\Mechanic_Model;

use Illuminate\Database\Eloquent\Model;
use App\User_Model\Mechanic;

class Contact_Number extends Model
{
    protected $table = 'contact_numbers';

    protected $fillable = [
    	'contact_number'
    ];

    public function mechanicContact()
    {
    	return $this->belongsTo(Mechchanic::class);
    }
}
