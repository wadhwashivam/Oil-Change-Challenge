<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OilChangeController extends Controller
{
    public function create(){
        return view('form');
    }

    public function store(Request $request){
        $validated = $request->validate([
            'currentOdometer' => ['required', 'integer', 'min:0', 'gte:previousOdometer'],
            'previousOilChangeDate' => ['required', 'date', 'before:today'],
            'previousOdometer' => ['required', 'integer', 'min:0'],
        ]);

        dd($validated);

    }
}
