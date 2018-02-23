<?php

namespace App\Http\Controllers\User_Controller;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User_Model\Mechanic;
use App\User_Model\Testimonial;
use Auth;

class MechanicController extends Controller
{
    public function store(Request $request, Mechanic $mec)
    {
        // Make new testimonial
        $comment = new Testimonial;

        $comment->rating = $request->rating;
        $comment->testimonial = $request->testimonial;
        $comment->user_id = Auth::id();

        $mec->testi()->save($comment);          
    
        return back();
    }
}
