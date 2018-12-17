<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    //
    public function index()
    {
        $categories = Category::where('created_by', Auth::user()->id)->get();
        foreach($categories as $category)
        {
            // dd($expense->category->name);
            $category['expenses'] = $category->expenses()->get();
        }
        return $categories;
    }

    public function getCategoryExpenses()
    {
        $categories = Category::where('created_by', Auth::user()->id)->get();
        foreach($categories as $category)
        {
            $total = 0;
            $expenses = $category->expenses()->get();
            foreach($expenses as $expense) {
                $total += $expense->amount;
            }
            $category['category_total'] = $total;
        }
        return $categories;
    }
 
    public function show($id)
    {
        return Category::find($id);
    }

    public function store(Request $request)
    {
        $category = Category::create($request->all());
        
        return response()->json($category, 201);
    }


    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->update($request->all());

        return $category;
    }

    public function delete(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return 204;
    }
}
