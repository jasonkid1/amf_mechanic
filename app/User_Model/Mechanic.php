<?php

namespace App\User_Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\User;

use App\User_Model\Testimonial;
use App\Mechanic_Model\Contact_Number;
use App\Mechanic_Model\Skill;

class Mechanic extends Model
{

	use Notifiable;

	protected $guard = 'web';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'address', 'zipcode', 'status', 'avatar',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function testimonials()
    {
    	return $this->belongsToMany(User::class, 'testimonials')->withPivot('id','testimonial','rating','created_at')->withTimestamps()->orderBy('testimonials.created_at','desc');
    }

    public function testi()
    {
    	return $this->hasMany(Testimonial::class);
    }

    public static function getMechanicAverage()
    {
    	$mec = request('mec');
    	
    	return Testimonial::where('mechanic_id', $mec)->avg('rating');
    }

    public static function getAllMechanicAverage($mec)
    {
        
        return Testimonial::where('mechanic_id', $mec)->avg('rating');
    }

    public static function getAllMechanicTotal($mec)
    {
        
        return Testimonial::where('mechanic_id', $mec)->sum('rating');
    }

    public static function getAllMechanicComments($mec)
    {
        
        return Testimonial::where('mechanic_id', $mec)->whereNotNull('testimonial')->count('id');
    }

    public function mechanicNumbers()
    {
        return $this->hasMany(Contact_Number::class);
    }

    public function mechanicSkills()
    {
        return $this->hasMany(Skill::class);
    }
}
