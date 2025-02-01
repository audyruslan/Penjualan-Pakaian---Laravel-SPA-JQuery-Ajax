<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $penjualan = Penjualan::all();
        if (request()->ajax()) {
            return response()->json($penjualan);
        }
        return view('penjualan.index', compact('penjualan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('penjualan.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_pembeli' => 'required|string|max:255',
            'nama_pakaian' => 'required|string|max:255',
            'jumlah' => 'required|integer|min:1',
            'harga' => 'required|numeric|min:0',
        ]);

        $penjualan = Penjualan::create($request->all());

        return response()->json($penjualan);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $penjualan = Penjualan::find($id);
        if (request()->ajax()) {
            return response()->json($penjualan);
        }
        return view('penjualan.show', compact('penjualan'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $penjualan = Penjualan::find($id);
        return view('penjualan.form', compact('penjualan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_pembeli' => 'required|string|max:255',
            'nama_pakaian' => 'required|string|max:255',
            'jumlah' => 'required|integer|min:1',
            'harga' => 'required|numeric|min:0',
        ]);

        $penjualan = Penjualan::find($id);
        $penjualan->update($request->all());

        return response()->json($penjualan);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Penjualan::destroy($id);
        return response()->json(['success' => 'Data deleted successfully']);
    }
}
