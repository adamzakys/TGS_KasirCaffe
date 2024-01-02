<?php

namespace Database\Seeders;

// database/seeders/TransaksiSeeder.php

use Illuminate\Database\Seeder;
use App\Models\Transaksi;
use App\Models\TransaksiDetail;
use App\Models\Menu;
use App\Models\User;

class TransaksiSeeder extends Seeder
{
    public function run()
    {
        // Buat user dummy
        $user = User::create([
            'nama' => 'John Doe',
            'email' => 'john@example.com',
            'password' => bcrypt('password'),
        ]);

        // Buat beberapa transaksi dengan detail
        for ($i = 1; $i <= 3; $i++) {
            $transaksi = Transaksi::create([
                'id_user' => $user->id,
                'tanggal' => now(),
                'total_bayar' => 0,
            ]);

            // Ambil beberapa menu sebagai dummy
            $menus = Menu::inRandomOrder()->limit(2)->get();

            // Tambahkan detail transaksi untuk setiap menu
            foreach ($menus as $menu) {
                $jumlah_pesanan = rand(1, 5);
                $harga = $menu->harga;

                TransaksiDetail::create([
                    'id_transaksi' => $transaksi->id,
                    'id_menu' => $menu->id,
                    'jumlah_pesanan' => $jumlah_pesanan,
                    'harga' => $harga,
                    'sub_total' => $jumlah_pesanan * $harga,
                ]);
            }

            // Hitung total bayar berdasarkan detail transaksi
            $totalBayar = $transaksi->transaksiDetails->sum('sub_total');
            $transaksi->update(['total_bayar' => $totalBayar]);
        }
    }
}

