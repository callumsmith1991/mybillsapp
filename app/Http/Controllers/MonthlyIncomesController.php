<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\MonthlyIncomes;

class MonthlyIncomesController extends Controller
{
    
    public function edit() {

    }

    public function update() {


    }

    public function store() {

        $validated = request()->validate([
            'amount' => 'required'
        ]);

        $validated['user_id'] = auth()->id();

        MonthlyIncomes::create($validated);

    }

    public function destroy($id) {


    }

}
