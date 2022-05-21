<?php
/**
 * AUTHOR: Julian Bueno 
 */ 

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * Controller of the users profiles 
 */
class ProfileController extends Controller
{
    /**
     * Returns the view of the profile of the current logged user 
     */
    function profile()
    {
        return view('profile.Profile')
            ->with('viewData', ["user" => auth()->user()]);
    }
}
