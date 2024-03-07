<?php

namespace App\Http\Controllers;

use App\Models\Akses;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AksesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Akses::all();
        return view('dashboard.data_akses',['data'=> $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.data_akses.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasi = $request->validate([
            'hak_akses' => 'required',
        ]);

        Akses::create($validasi);

        return redirect('/data/akses')
        ->with('success', 'Record inserted successfully!');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Akses::findOrFail($id);

        return view('dashboard.data_akses.edit',['data'=> $data]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validasi = $request->validate([
            'menu' => 'required',
        ]);
        $data = Akses::findOrFail($id);
        $data->update($validasi);
        return redirect('/data/akses')
        ->with('success', 'Record updated successfully!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Akses::findOrFail($id);
        $data->delete();
        return redirect('/data/akses')
        ->with('success', 'Record deleted successfully!');
    }
}
