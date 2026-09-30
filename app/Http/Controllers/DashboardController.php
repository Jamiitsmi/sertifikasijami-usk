<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peserta;
use App\Models\SkemaSertifikasi;

class DashboardController extends Controller
{
    public function index()
    {
        $totalPeserta   = Peserta::count();
        $totalSkema     = SkemaSertifikasi::count();
        $pesertaTerbaru = Peserta::with('skema')
                            ->latest()
                            ->take(5)
                            ->get();

        return view('dashboard', compact(
            'totalPeserta',
            'totalSkema',
            'pesertaTerbaru'
        ));
    }
}