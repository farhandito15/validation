<?php

namespace App\Http\Controllers;

use App\Models\Desa;
use Illuminate\Http\Request;
use App\Http\Requests\StoreDesaRequest;
use App\Http\Requests\UpdateDesaRequest;
use Illuminate\Queue\Jobs\RedisJob;

class DesaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('desa.index', [
            'desa' => Desa::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('desa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDesaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDesaRequest $request)
    {
        try {
            Desa::create($request->only([
                'nm_desa',
                'tgl',
                'nm_kades',
                'jml_rumah',
            ]));
        } catch (\Throwable $th) {
            return redirect()->with('error', 'Gagal menambahkan Data' . $th->getMessage());
        }
        return redirect()->route('desa.index')->with('succes', 'Berhasil Menambahkan Data');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Desa  $desa
     * @return \Illuminate\Http\Response
     */
    public function show(Desa $desa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Desa  $desa
     * @return \Illuminate\Http\Response
     */
    public function edit(Desa $desa)
    {
        return view('desa.edit', [
            'desa' => $desa,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDesaRequest  $request
     * @param  \App\Models\Desa  $desa
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDesaRequest $desa, Request $request)
    {
        try {
            $desa->update($request->only([
                'nm_desa',
                'tgl',
                'nm_kades',
                'jml_rumah',
            ]));
        } catch (\Throwable $th) {
            return redirect()->with('error', 'Gagal memperbarui data: ' . $th->getMessage());
        }

        return redirect()->route('desa.index')->with('succes', 'Berhasil Memperbarui Data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Desa  $desa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Desa $desa)
    {
        try {
            $desa->delete();
        } catch (\Throwable $th) {
            return redirect()->with('error', 'Gagal menghapus data: ' . $th->getMessage());
        }

        return redirect()->route('desa.index')->with('succes', 'Berhasil Menghapus Data');
    }
}
