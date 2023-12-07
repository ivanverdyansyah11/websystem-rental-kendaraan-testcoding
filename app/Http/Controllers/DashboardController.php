<?php

namespace App\Http\Controllers;

use App\Models\Kendaraan;
use App\Models\Pelanggan;
use App\Models\Pengembalian;
use App\Models\Sopir;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $year = date('Y');
        $kendaraanPerBulan = [];

        for ($bulan = 1; $bulan <= 12; $bulan++) {
            $totalBulan = Pengembalian::whereYear('tanggal_kembali', $year)
                ->whereMonth('tanggal_kembali', $bulan)
                ->count();

            $kendaraanPerBulan[$bulan] = $totalBulan;
        }

        $month = date('n');
        $startDate = date("$year-$month-01");
        $endDate = date("$year-$month-t");

        $weekFourStart = date("$year-$month-22");
        $weekFourEnd = date("$year-$month-t");

        $weekOneData = Pengembalian::whereBetween('tanggal_kembali', [$startDate, date("$year-$month-07")])->count();
        $weekTwoData = Pengembalian::whereBetween('tanggal_kembali', [date("$year-$month-08"), date("$year-$month-14")])->count();
        $weekThreeData = Pengembalian::whereBetween('tanggal_kembali', [date("$year-$month-15"), date("$year-$month-21")])->count();
        $weekFourData = Pengembalian::whereBetween('tanggal_kembali', [$weekFourStart, $weekFourEnd])->count();

        $kendaraanPerMinggu = [$weekOneData, $weekTwoData, $weekThreeData, $weekFourData];

        return view('dashboard.index', [
            'title' => 'Dashboard',
            'kendaraan' => Kendaraan::all(),
            'pelanggan' => Pelanggan::all(),
            'sopir' => Sopir::all(),
            'kendaraanBooking' => Kendaraan::where('status', 'booking')->get(),
            'kendaraanPesan' => Kendaraan::where('status', 'dipesan')->get(),
            'kendaraanServis' => Kendaraan::where('status', 'servis')->get(),

            'kendaraanPerBulan' => $kendaraanPerBulan,
            'kendaraanPerMinggu' => $kendaraanPerMinggu,
        ]);
    }
}
