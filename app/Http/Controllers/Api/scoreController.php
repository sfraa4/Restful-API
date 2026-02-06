<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\scoreResource;
use App\Models\score;
use Illuminate\Support\Facades\Validator;

class scoreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = score::all();
        // return score::all()->toResourceCollection(scoreResource::class);
        // return
        return new scoreResource(true, 'menampilkan semua data', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'tugas' => 'required|numeric',
            'uts' => 'required|numeric',
            'uas' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $data = score::create($request->all());
        return new scoreResource(true, 'data berhasil ditambahkan', $data);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return score::findorFail($id)->toResource(scoreResource::class);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $siswa = score::findorFail($id);
        if(!$siswa){
            return response()->json(['message' => 'data siswa tidak ditemukan',404]);
        }

        $validator = Validator::make($request->all(), [
            'nama' => 'sometimes|required',
            'tugas' => 'sometimes|required|numeric',
            'uts' => 'sometimes|required|numeric',
            'uas' => 'sometimes|required|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }
        
        $siswa->update($request->all());
        return new scoreResource(true, 'data berhasil diupdate', $siswa); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
    $siswa = score::findorFail($id);
        if(!$siswa){
            return response()->json(['message' => 'data siswa tidak ditemukan',404]);
        }

        $siswa->delete();
        return new scoreResource(true, 'data berhasil dihapus', $siswa);
}
}