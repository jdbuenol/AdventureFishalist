<?php
/**
 * AUTHOR: Julian Bueno 
 */ 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interfaces\GenerateHistory;

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

    function generateHistory(Request $request){
        $format = $request->get('format');
        $generateHisoryInterface = app(GenerateHistory::class, ['format' => $format]);
        $generateHisoryInterface->generateHistory($request);
        return back();
    }
}
