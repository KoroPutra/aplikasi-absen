<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Absen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AbsenController extends Controller
{
    // Get all absences for the authenticated user
    public function index()
    {
        $absen = Absen::get();

        return response()->json([
            'success' => true,
            'data' => $absen
        ]);
    }

    // Store a new absence record
    public function store(Request $request)
    {
        $request->validate([
            'absen' => 'required|string|max:255',
        ]);

        $absen = Absen::create([
            'user_id' => $request->input('user_id'),
            'nama' => $request->input('nama'),
            'nip' => $request->input('nip'),
            'absen' => $request->input('absen'),
            'jam' => now(),
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Absen berhasil disimpan',
            'data' => $absen,
        ]);
    }

    // Get a specific absence record
    public function show($id)
    {
        $absen = Absen::find($id);

        if (!$absen) {
            return response()->json([
                'success' => false,
                'message' => 'Data tidak ditemukan',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $absen,
        ]);
    }

    // Delete a specific absence record
    public function destroy($id)
    {
        $absen = Absen::find($id);

        if (!$absen) {
            return response()->json([
                'success' => false,
                'message' => 'Data tidak ditemukan',
            ], 404);
        }

        $absen->delete();

        return response()->json([
            'success' => true,
            'message' => 'Absen berhasil dihapus',
        ]);
    }
}
