<?php

// app/Http/Controllers/TransaksiController.php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\TransaksiDetail;
use App\Models\Menu;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksis = Transaksi::orderBy('created_at', 'DESC')->get();
        return view('transaksis.index', compact('transaksis'));
    }

    public function create()
    {
        $menus = Menu::all();
        return view('transaksis.create', compact('menus'));
    }

    public function store(Request $request)
    {
        // Validasi request sesuai kebutuhan
        $request->validate([
            'id_user' => 'required',
            'tanggal' => 'required',
            'menus' => 'required|array',
            'menus.*.id_menu' => 'required|exists:menus,id_menu',
            'menus.*.jumlah_pesanan' => 'required|integer|min:1',
        ]);

        // Simpan Transaksi
        $transaksi = Transaksi::create([
            'id_user' => $request->id_user,
            'tanggal' => $request->tanggal,
            'total_bayar' => 0,
        ]);
        
        $totalBayar = 0;
        
        foreach ($request->menus as $menu) {
            $menuData = Menu::find($menu['id_menu']);
        
            if ($menuData) {
                $totalBayar += $menuData->harga_menu * $menu['jumlah_pesanan'];
        
                TransaksiDetail::create([
                    'id_transaksi' => $transaksi->id_transaksi,
                    'id_menu' => $menu['id_menu'],
                    'jumlah_pesanan' => $menu['jumlah_pesanan'],
                    'harga' => $menuData->harga_menu,
                    'sub_total' => $menuData->harga_menu * $menu['jumlah_pesanan'],
                ]);
            } else {
                // Handle jika data menu tidak ditemukan
                return redirect()->back()->with('error', 'Data menu tidak ditemukan.');
            }
        }

        // Update total bayar pada transaksi
        $transaksi->update(['total_bayar' => $totalBayar]);

        return redirect()->route('transaksis.index')->with('success', 'Transaksi berhasil ditambahkan.');
    }
    public function destroy(Transaksi $transaksi)
    {
        // Menghapus transaksi dan detailnya
        $transaksi->transaksiDetails()->delete();
        $transaksi->delete();

        // Tambahkan logika redirect sesuai kebutuhan
        return redirect()->route('transaksis.index')->with('success', 'Transaksi berhasil dihapus.');
    }
    public function show(Transaksi $transaksi)
    {
        return view('transaksis.show', compact('transaksi'));
    }


    // Tambahkan fungsi edit, update, show, destroy sesuai kebutuhan
}
