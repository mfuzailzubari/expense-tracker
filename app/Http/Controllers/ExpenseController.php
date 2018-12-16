<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Expense;
use Illuminate\Support\Facades\Auth;

class ExpenseController extends Controller
{
    //
    //
    public function index()
    {
        return Expense::where('created_by', Auth::user()->id)->get();
    }
 
    public function show($id)
    {
        return Expense::find($id);
    }

    public function store(Request $request)
    {
        return Expense::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $expense = Expense::findOrFail($id);
        $expense->update($request->all());

        return $expense;
    }

    public function delete(Request $request, $id)
    {
        $expense = Expense::findOrFail($id);
        $expense->delete();

        return 204;
    }
}
