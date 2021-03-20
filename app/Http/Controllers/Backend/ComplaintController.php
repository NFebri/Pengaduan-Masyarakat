<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Pengaduan;
use App\Models\tanggapan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class ComplaintController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Pengaduan',
            'pengaduan' => Pengaduan::latest()->get(),
        ];
        return view('backend.pengaduan.index', $data);
    }

    public function show($id)
    {
        $dec = Crypt::decrypt($id);
        $data = [
            'title' => 'Pengaduan',
            'pengaduan' => Pengaduan::findOrfail($dec),
        ];
        return view('backend.pengaduan.show', $data);
    }

    public function tanggapanHandle(Request $request, $id)
    {
        $request->validate([
            'tanggapan' => 'required',
        ]);
        Pengaduan::where(['id' => $id])->update([
            'status' => 'proses',
        ]);
        tanggapan::create([
            'pengaduan_id' => $id,
            'tanggapan' => $request->tanggapan,
            'user_id' => auth()->id(),
        ]);
        return redirect(route('complaint'))->with('status', 'Pengaduan berhasil ditanggapi');
    }

    public function setStatus($id)
    {
        Pengaduan::findOrfail($id)->update([
            'status' => 'selesai',
        ]);
        return redirect(route('complaint'))->with('status', 'Status pengaduan berhasil diubah');
    }
}
