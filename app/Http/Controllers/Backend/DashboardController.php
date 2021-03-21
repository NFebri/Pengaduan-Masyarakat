<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'dashboard',
        ];
        return view('backend.index', $data);
    }

    public function user()
    {
        $data = [
            'title' => 'Users',
            'admin' => User::where('role', 'admin')->get(),
            'petugas' => User::where('role', 'petugas')->get(),
            'user' => User::where('role', 'user')->get(),
        ];
        return view('backend.user.index', $data);
    }
}
