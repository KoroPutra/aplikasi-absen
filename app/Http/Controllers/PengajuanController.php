<?php

namespace App\Http\Controllers;

use App\Models\Pengajuan;
use Illuminate\Http\Request;

class PengajuanController extends Controller
{
    public function index()
    {
        $user_id = auth()->user()->id;
        $pengajuan = Pengajuan::where('user_id', $user_id)->get();
        return view('pengajuan', compact('pengajuan'));
    }

    public function submit(Request $request)
    {
        $pengajuan = new Pengajuan();
        $pengajuan->user_id = auth()->user()->id;
        $pengajuan->nama = auth()->user()->name;
        $pengajuan->pengajuan = $request->input('pengajuan');
        $pengajuan->deskripsi = $request->input('deskripsi');
        $pengajuan->save();

        return redirect()->route('pengajuan.index');
    }
}
