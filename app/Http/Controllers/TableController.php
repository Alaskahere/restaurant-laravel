<?php

namespace App\Http\Controllers;

use App\Models\Table;
use Illuminate\Http\Request;

class TableController extends Controller
{
    public function index()
    {
        $tables = Table::all();
        return view('tables.index',compact('tables'));
    }

    public function create()
    {
        return view('tables.create');

    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=> 'required',
            'capacity'=> 'required|numeric'
        ]);

        Table::create($request);
        return redirect()->route('tables.index');
    }

    public function show(Table $table)
    {
        return view('tables.show',compact('table'));
    }

    public function edit(Table $table)
    {
        return view('tables.edit',compact('table'));
    }

    public function update(Request $request, Table $table)
    {
        $request->validate([
            'name'=> 'required',
            'capacity'=> 'required|numeric'
        ]);
        $table->update();
        return redirect()->route('tebles.update');
    }

    public function destroy(Table $table)
    {
        $table->delete();
    }
}
