<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Bills;

class BillsController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth');
        
    }

    public function index() {

        // $bills = Bills::all();

        $bills = Bills::where('user_id', auth()->id())->get();

        return view('bills/index', compact('bills'));

    }

    public function create() {

        return view("bills/create");

    }

    public function edit($id) {

        $bill = Bills::find($id);

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
