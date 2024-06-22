<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Dish;
use Illuminate\Http\Request;

class DishController extends Controller
{
    public function index()
    {
        $dishes = Dish::with('category')->get();
        return view('dishes.index',compact('dishes'));
    }


    public function create()
    {
        $categories= Category::all();
        return view('dishes.create', compact('categories'));
    }


    public function store(Request $request)
    {

        Dish::create($request->all());
        return redirect()->route('dishes.index');
    }


    public function show(Dish $dish)
    {
        $categories = Category::all();
        return view('dishes.show',compact('dish','categories'));
    }


    public function edit(Dish $dish)
    {
        $categories= Category::all();
        return view('dishes.show',compact('dish','categories'));
    }


    public function update(Request $request, Dish $dish)
    {

        $dish->update($request->all());
        return redirect()->route('dishes.index');
    }


    public function destroy(Dish $dish)
    {
        $dish->delete();
        return redirect()->route('dishes.index');
    }
}
