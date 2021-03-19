<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str;

class PengaduanController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Home',
        ];
        return view('frontend.index', $data);
    }

    public function pengaduan()
    {
        Paginator::useBootstrap();
        $data = [
            'title' => 'Pengaduan',
            'pengaduan' => Pengaduan::latest()->paginate(5),
        ];
        return view('frontend.pengaduan', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Buat Pengaduan',
        ];
        return view('frontend.create', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'isi_laporan' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $file = $request->file('foto');
        $berkas = $file->move('uploads/berkas_pendukung/', time() . '-' . Str::limit(Str::slug($request->judul), 50, '') . '-' . strtotime('now') . '.' . $file->getClientOriginalExtension());
        Pengaduan::create([
            'user_id' => Auth::user()->id,
            'judul' => $request->judul,
            'isi_laporan' => $request->isi_laporan,
            'foto' => $berkas,
            'status' => 'pending'
        ]);
        return redirect(route('pengaduan'))->with('status', 'Pengaduan berhasil dibuat');
    }

    public function searchHandle(Request $request)
    {
        Paginator::useBootstrap();
        $data = [
            'title' => 'Pengaduan',
            'pengaduan' => Pengaduan::where('judul', 'like', '%' . $request->keyword . '%')->latest()->paginate(5),
        ];
        return view('frontend.pengaduan', $data);
    }

    public function show($id)
    {
        $dec = Crypt::decrypt($id);
        $data = [
            'title' => 'Pengaduan',
            'pengaduan' => Pengaduan::findOrfail($dec),
        ];
        return view('frontend.detail_pengaduan', $data);
    }
}
