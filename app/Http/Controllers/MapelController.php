<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Mapel;
use Illuminate\Http\Request;

class MapelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $mapels = Mapel::orderBy('created_at', 'asc')->get();
        $guru = Guru::OrderBy('nama_guru', 'asc')->get();
        return view('admin.layouts.mapel.index', compact('mapels', 'guru'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $guru = Guru::OrderBy('nama_guru', 'asc')->get();
        return view('admin.layouts.mapel.create', compact('guru'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $validateData = $request->validate([
            'kode_mapel' => 'required',
            'nama_mapel' => 'required',
            'guru_id' => 'required'
        ]);

        // $this->validate($request, [
        //     'kode_mapel' => "required",
        //     'nama_mapel' => "required",
        // ]);

        Mapel::create($validateData);

        // Mapel::create([
        //     'kode_mapel' => $request->kode_mapel,
        //     'nama_mapel' =>$request->nama_mapel
        // ]);

        if (!$request) {
            return redirect()->route('mapels.create')->with(['error' => 'Data gagal disimpan!']);
        } else {
            return redirect()->route('mapels.index')->with(['success' => 'Data berhasil disimpan!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mapel  $mapel
     * @return \Illuminate\Http\Response
     */
    public function show(Mapel $mapel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mapel  $mapel
     * @return \Illuminate\Http\Response
     */
    public function edit(Mapel $mapel)
    {
        $guru = Guru::OrderBy('nama_guru', 'asc')->get();
        return view('admin.layouts.mapel.edit', compact('mapel', 'guru'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mapel  $mapel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mapel $mapel)
    {
        $validateData = $request->validate([
            'kode_mapel' => 'required',
            'nama_mapel' => 'required',
            'guru_id' => 'required'
        ]);

        if ($validateData)
         {
            $mapel->update([
                'kode_mapel' => $request->kode_mapel,
                'nama_mapel' => $request->nama_mapel,
                'guru_id' => $request->nama_guru
            ]);
        } else {
            $mapel->update([
                'kode_mapel' => $request->kode_mapel,
                'nama_mapel' =>$request->nama_mapel,
                'guru_id' => $request->nama_guru
            ]);
        }

        return redirect()->route('mapels.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mapel  $mapel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mapel $mapel)
    {
        $mapel->delete();

        return redirect()->route('mapels.index')->with(['success' => 'Data Berhasil Diahapus!']);
    }
}
