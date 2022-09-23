<?php

namespace App\Http\Controllers;

use App\Models\Warga;
use App\Http\Requests\StoreWargaRequest;
use App\Http\Requests\UpdateWargaRequest;

class WargaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('warga.index', [
            'warga' => Warga::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('warga.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreWargaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreWargaRequest $request)
    {
        try {
            Warga::create($request->only([
                'nama',
                'gender',
                'tgl',
                'status',
            ]));
        } catch (\Throwable $th) {
            return redirect()->with('error', 'Gagal menambahkan Data' . $th->getMessage());
        }
        return redirect()->route('warga.index')->with('succes', 'Berhasil Menambahkan Data');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Warga  $warga
     * @return \Illuminate\Http\Response
     */
    public function show(Warga $warga)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Warga  $warga
     * @return \Illuminate\Http\Response
     */
    public function edit(Warga $warga)
    {
        return view('warga.edit', [
            'warga' => $warga,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateWargaRequest  $request
     * @param  \App\Models\Warga  $warga
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateWargaRequest $request, Warga $warga)
    {
        try {
            $warga->update($request->only([
                'nama',
                'gender',
                'tgl',
                'status',
            ]));
        } catch (\Throwable $th) {
            return redirect()->with('error', 'Gagal memperbarui data: ' . $th->getMessage());
        }

        return redirect()->route('warga.index')->with('succes', 'Berhasil Memperbarui Data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Warga  $warga
     * @return \Illuminate\Http\Response
     */
    public function destroy(Warga $warga)
    {
        try {
            $warga->delete();
        } catch (\Throwable $th) {
            return redirect()->with('error', 'Gagal menghapus data: ' . $th->getMessage());
        }

        return redirect()->route('warga.index')->with('succes', 'Berhasil Menghapus Data');
    }
}
