<?php

// app/Http/Controllers/StatistikController.php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Menu;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class StatistikController extends Controller
{
    public function index()
    {
        // Logika untuk mengambil data statistik
        $data['penjualan'] = $this->getPenjualanData();
        $data['produkTerlaris'] = $this->getProdukTerlarisData();
        $data['pendapatan'] = $this->getPendapatanData();
        $data['kinerjaUser'] = $this->getKinerjaUserData();
    
        return view('statistik.index', compact('data'));
    }

    private function getPenjualanData()
    {
        // Logika untuk mengambil data penjualan
        // Contoh sederhana, silakan sesuaikan
        $penjualanHarian = Transaksi::whereDate('created_at', Carbon::today())->count();
        $penjualanMingguan = Transaksi::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->count();
        $penjualanBulanan = Transaksi::whereMonth('created_at', Carbon::now()->month)->count();

        return compact('penjualanHarian', 'penjualanMingguan', 'penjualanBulanan');
    }

    private function getProdukTerlarisData()
    {
        // Logika untuk mengambil data produk terlaris
        // Contoh sederhana, silakan sesuaikan
        $produkTerlaris = DB::table('transaksi_details')
            ->select('menus.id_menu', 'menus.nama_menu', 'menus.harga_menu', 'menus.id_kategori', DB::raw('SUM(transaksi_details.jumlah_pesanan) as terjual'))
            ->join('menus', 'transaksi_details.id_menu', '=', 'menus.id_menu')
            ->where('menus.id_kategori', '!=', null)
            ->groupBy('menus.id_menu', 'menus.nama_menu', 'menus.harga_menu', 'menus.id_kategori')
            ->orderBy('terjual', 'desc')
            ->take(5)
            ->get();

        return compact('produkTerlaris');
    }

    private function getPendapatanData()
    {
        // Logika untuk mengambil data pendapatan
        // Contoh sederhana, silakan sesuaikan
        $pendapatanMakanan = Transaksi::whereHas('transaksiDetails.menu.kategori', function ($query) {
            $query->where('nama_kategori', 'Makanan');
        })->sum('total_bayar');

        $pendapatanMinuman = Transaksi::whereHas('transaksiDetails.menu.kategori', function ($query) {
            $query->where('nama_kategori', 'Minuman');
        })->sum('total_bayar');

        return compact('pendapatanMakanan', 'pendapatanMinuman');
    }

    private function getKinerjaUserData()
    {
        // Logika untuk mengambil data kinerja user
        // Contoh sederhana, silakan sesuaikan
        $kinerjaUser = User::withCount(['transaksis as pesanan_diambil' => function ($query) {
            $query->whereDate('created_at', Carbon::today());
        }])->get();

        return compact('kinerjaUser');
    }
}
