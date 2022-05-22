<?php

namespace App\Interfaces;
use Illuminate\Http\Request;

interface GenerateHistory {
    public function generateHistory(Request $request);
}