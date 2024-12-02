<?php

namespace App\Http\Controllers;

use App\Models\Absen;
use Illuminate\Http\Request;

class AbsenController extends Controller
{
    public function index()
    {
        $user_id = auth()->user()->id;
        $absen = Absen::where('user_id', $user_id)->get();
        return view('absen', compact('absen'));
    }
    public function submit(Request $request)
    {
        $absen = new Absen();
        $absen->user_id = auth()->user()->id;
        $absen->nama = auth()->user()->name;
        $absen->nip = auth()->user()->nip;
        $absen->absen = $request->input('absen');
        $absen->jam = \Carbon\Carbon::now();
        $absen->save();

        return redirect()->route('absen.index');
    }
}
