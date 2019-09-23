<?php

namespace App\Http\Controllers;

use Validator;
use App\Kriteria;
use Illuminate\Http\Request;

class KriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kriterias = Kriteria::paginate(15);
        return $kriterias;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            "nama" => "required|string|unique:kriteria,nama",
            "kode" => "required|string|unique:kriteria,kode"
        ]);

        if ($validator->fails()) {
            // return redirect("back")
            //     ->withErrors($validator)
            //     ->withInput();
            return $validator->errors();
        }

        $kriteria = Kriteria::create([
            "nama" => $request["nama"],
            "kode" => $request["kode"]
        ]);
        return response()->json([
            "pesan" => "Kriteria berhasil ditambahkan!",
            "kriteria" => $kriteria
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Kriteria  $kriteria
     * @return \Illuminate\Http\Response
     */
    public function show($key)
    {
        $kriteria = Kriteria::find($key);
        if (!$kriteria) {
            return response()->json([
                "pesan" => "Kriteria tidak ditemukan!",
                "key" => $key
            ], 404);
        }
        return $kriteria;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kriteria  $kriteria
     * @return \Illuminate\Http\Response
     */
    public function edit(Kriteria $kriteria)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kriteria  $kriteria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $key)
    {
        $validator = Validator::make($request->all(), [
            "nama" => "required|string|unique:kriteria,nama",
            "kode" => "required|string|unique:kriteria,kode"
        ]);

        if ($validator->fails()) {
            // return redirect("back")
            //     ->withErrors($validator)
            //     ->withInput();
            return $validator->errors();
        }

        $kriteria = Kriteria::find($key);
        if (!$kriteria) {
            return response()->json([
                "pesan" => "Kriteria tidak ditemukan!",
                "key" => $key
            ], 404);
        }
        $kriteria->update($request->all());
        return response()->json([
            "pesan" => "Kriteria berhasil diupdate!",
            "kriteria" => $kriteria
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kriteria  $kriteria
     * @return \Illuminate\Http\Response
     */
    public function destroy($key)
    {
        $kriteria = Kriteria::find($key);
        if (!$kriteria) {
            return response()->json([
                "pesan" => "Kriteria tidak ditemukan!",
                "key" => $key
            ], 404);
        }
        $kriteria->delete();
        return response()->json([
            "pesan" => "Kriteria berhasil dihapus!",
            "kriteria" => $kriteria
        ]);
    }
}
