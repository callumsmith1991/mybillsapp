<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\MonthlyIncomes;

class MonthlyIncomesController extends Controller
{
    
    public function edit() {

        $monthly_income = MonthlyIncomes::where('user_id', auth('api')->id())->first();

        $monthly_income = $monthly_income->toArray();

        if(count($monthly_income) > 0) {

            return response()->json($monthly_income);

        } else {

            return response()->json('No monthly income found for this user');
        }


    }

    public function update($id) {

        $monthly_income = MonthlyIncomes::find($id);

        // $bill->update(request(['title', 'description', 'number']));

        $r = request()->input('amount');

        $validated = request()->validate([
            'amount' => 'required'
        ]);

        $monthly_income->update($validated);

        return response()->json('Monthly Income Updated');

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
