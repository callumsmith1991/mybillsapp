<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\MonthlyIncomes;

class MonthlyIncomesController extends Controller
{
    
    public function edit() {

    }

    public function update(MonthlyIncomes $monthly_income) {

        $validated = request()->validate([
            'amount' => 'required'
        ]);

        $monthly_income->update($validated);

        return redirect('/');

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
