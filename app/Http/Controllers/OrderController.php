<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use App\Models\Order;
use App\Models\Table;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('table', 'dishes')->get();
        return view('orders.index', compact('orders'));
    }

    public function create()
    {
        $tables = Table::all();
        $dishes = Dish::all();
        return view('orders.create', compact('tables', 'dishes'));
    }

    public function store(Request $request)
    {
        $request->validate([

            'table_id' => 'required|exists:tables,id',
            'dishes' => 'required|array',
            'dishes.*' => 'exists:dishes,id'
        ]);

        $order = Order::create([
            'state' => 'pendiente',
            'table_id' => $request->table_id
        ]);

        $order->dishes()->attach($request->dishes);

        return redirect()->route('orders.index');
    }

    public function show(Order $order)
    {
        $order->load('table', 'dishes');
        return view('orders.show', compact('order'));
    }

    public function edit(Order $order)
    {
        $tables = Table::all();
        $dishes = Dish::all();
        $order->load('dishes');
        return view('orders.edit', compact('order', 'tables', 'dishes'));
    }

    public function update(Request $request, Order $order)
    {
        $request->validate([

            'table_id' => 'required|exists:tables,id',
            'dishes' => 'required|array',
            'dishes.*' => 'exists:dishes,id'
        ]);

        $order->update([
            'table_id' => $request->table_id
        ]);

        $order->dishes()->sync($request->dishes);

        return redirect()->route('orders.index');
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('orders.index');
    }

    public function completar(Order $order)
    {
        $order->update(['state' => 'completa']);

        return redirect()->route('orders.index');
    }

}
