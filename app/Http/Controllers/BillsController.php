<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Bills;
use \App\MonthlyIncomes;

class BillsController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth');
        
    }

    public function index() {

        $bills = Bills::where('user_id', auth()->id())->get();
        $monthly_income = MonthlyIncomes::where('user_id', auth()->id())->first();

        if($monthly_income) {

            $income = $monthly_income->amount;


        } else {

            $income = 0;

        }

        $bills_total = 0;
        $take_home_pay = 0;

        foreach($bills as $bill) {
            $bills_total += $bill->number;
        }

        if($income > 0) {

            $take_home_pay = $income - $bills_total;

        }

        return view('bills/index', compact('bills', 'bills_total', 'income', 'take_home_pay'));

    }

    public function create() {

        return view("bills/create");

    }

    public function edit($id) {

        $bill = Bills::find($id);

        if($bill->user_id != auth()->id()) {

            return redirect('/');

        }

        return view('bills/edit', compact('bill'));

    }

    public function update($id) {

        $bill = Bills::find($id);

        $bill->update(request(['title', 'description', 'number']));

        return redirect('/');
    }

    public function destroy($id) {

        $bill = Bills::find($id);

        $bill->delete();

        return redirect('/');

    }

    public function store() {

       $validated = request()->validate([
        'title' => ['required', 'min:3'],
        'description' => 'required',
        'number' => 'required'
       ]);

       $validated['user_id'] = auth()->id();

       Bills::create($validated);
       
       return redirect('/');

    }

}
