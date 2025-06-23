<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendosa;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $hasil = null;
        if ($request->has('nama')) {
            $hasil = Pendosa::where('nama', $request->nama)->first();
        }
        return view('dashboard', compact('hasil'));
    }
}
