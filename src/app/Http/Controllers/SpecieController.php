<?php
// AUTHOR: Julian Bueno

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\Models\Specie;

class SpecieController extends Controller
{
    function index()
    {
        $viewData=[];
        $viewData['species'] = Specie::latest()
        ->paginate(16);
        return view('specie.Index')
        ->with("viewData",$viewData);
    }

    public function show($id)
    {
        try {
            $viewData = [];
            $specie = Specie::findOrFail($id);
            $viewData["specie"] = $specie;
            return view('specie.show')
            ->with("viewData", $viewData);
        } catch (ModelNotFoundException $e) {
            return back();
        }
    }
}
