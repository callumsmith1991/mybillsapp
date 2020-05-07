<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Bills;
use \App\MonthlyIncomes;
use Illuminate\Support\Facades\Auth;


class BillsController extends Controller
{

    // public function __construct()
    // {

    //     $this->middleware('auth');
        
    // }


    public function index(Request $request)
    {

        $bills = Bills::where('user_id', auth('api')->id())->get();
        // $bills = 'test';
        $bills = $bills->toArray();

        // $bills = dd(auth('api')->id());
        // $bills = Bills::all()->toArray();
        $monthly_income = MonthlyIncomes::where('user_id', auth('api')->id())->first();
        $monthly_income->toArray();


        if($monthly_income) {

            $income = $monthly_income->amount;


        } else {

            $income = 0;

        }

        $bills_total = 0;
        $take_home_pay = 0;

        foreach($bills as $bill) {
            $bills_total += $bill['number'];
        }

        if($income > 0) {

            $take_home_pay = $income - $bills_total;

        }

        $bills['monthlyIncome'] = $income;
        $bills['billsTotal'] = $bills_total;
        $bills['takeHomePay'] = $take_home_pay;

        // // return view('bills/index', compact('bills', 'bills_total', 'income', 'take_home_pay', 'monthly_income'));

        return $bills;

    }


    public function edit($id)
    {

        $bill = Bills::find($id);

        if ($bill->user_id != auth('api')->id()) {

            return redirect('/');
        }

        $bill_arr = $bill->toArray();

        return response()->json($bill_arr);
    }

    public function update($id)
    {

        $bill = Bills::find($id);

        $bill->update(request(['title', 'description', 'number']));

        return response()->json('Updated Successful');
    }

    public function destroy($id)
    {

        $bill = Bills::find($id);

        $bill->delete();

        return response()->json('Deleted Successfully');
    }

    public function store(Request $request)
    {

        $validated = request()->validate([
            'title' => ['required', 'min:3'],
            'description' => 'required',
            'number' => 'required'
        ]);

        $validated['user_id'] = auth('api')->id();

        Bills::create($validated);

        // $bill = new Bills([
        //     'user_id' => auth('api')->id(),
        //     'title' => $request->input('title'),
        //     'description' => $request->input('description'),
        //     'number' => $request->input('amount')
        // ]);

        // $bill->save();


        $response = response()->json('Bill Added');

        return $response;
    }
}
