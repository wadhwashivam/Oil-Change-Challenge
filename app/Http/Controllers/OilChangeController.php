<?php

namespace App\Http\Controllers;

use App\Models\OilChangeCheck;
use Illuminate\Http\Request;

class OilChangeController extends Controller
{
    public function create(){
        return view('form');
    }

    public function store(Request $request){
        $validated = $request->validate([
            'current_odometer' => ['required', 'integer', 'min:0', 'gte:previous_odometer'],
            'previous_oil_change_date' => ['required', 'date', 'before:today'],
            'previous_odometer' => ['required', 'integer', 'min:0'],
        ]);

        $km_since_change = $validated['current_odometer']- $validated['previous_odometer'];
        $months_since_change = \Carbon\Carbon::parse($validated['previous_oil_change_date'])->diffInMonths(now());

        $is_due = $km_since_change > 5000 || $months_since_change > 6;

        $check = OilChangeCheck::create([
            ...$validated, 'is_due'=> $is_due,
        ]);

        return redirect()->route('result.show', $check);
    }

    public function show(OilChangeCheck $oilChangeCheck){
        return view('result', ['check' => $oilChangeCheck]);
    }

}
