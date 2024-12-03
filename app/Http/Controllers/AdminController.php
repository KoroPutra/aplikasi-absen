<?php

namespace App\Http\Controllers;

use App\Models\Absen;
use App\Models\Pengajuan;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $absen = Absen::latest()->paginate(5);
        return view('admin.table-admin', compact('absen'));
    }

    public function edit($id)
    {
        $absen = Absen::find($id);
        return view('admin.edit', compact('absen'));
    }

    public function update(Request $request, $id)
    {
        $absen = Absen::find($id);
        $absen->nama = $request->input('nama');
        $absen->nip = $request->input('nip');
        $absen->absen = $request->input('absen');
        $absen->jam = $request->input('jam');
        $absen->save();

        return redirect()->route('table-admin');
    }

    public function delete($id)
    {
        $absen = Absen::find($id);
        $absen->delete();

        return redirect()->route('table-admin');
    }

    public function pengajuan()
    {
        $pengajuan = Pengajuan::latest()->paginate(5);
        return view('admin.table-pengajuan', compact('pengajuan'));
    }

    public function deletePengajuan($id)
    {
        $pengajuan = Pengajuan::find($id);
        $pengajuan->delete();

        return redirect()->route('table-pengajuan');
    }

    public function ruangchat($id)
    {
        $absen = Pengajuan::find($id);
        $absen->status = 1;
        $absen->save();

        return redirect()->route('table-pengajuan');
    }
    public function updatePengajuan($id)
    {
        $absen = Pengajuan::find($id);
        $absen->status = 2;
        $absen->save();

        return redirect()->route('table-pengajuan');
    }
    public function tidaksah($id)
    {
        $absen = Pengajuan::find($id);
        $absen->status = 3;
        $absen->save();

        return redirect()->route('table-pengajuan');
    }
}
