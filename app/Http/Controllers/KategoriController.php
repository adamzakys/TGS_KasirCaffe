<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Menu;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        $kategoris = Kategori::orderBy('created_at', 'DESC')->get();
        return view('kategoris.index', compact('kategoris'));
    }

    public function create()
    {
        return view('kategoris.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required',
            // tambahkan validasi sesuai kebutuhan
        ]);

        Kategori::create([
            'nama_kategori' => $request->nama_kategori,
            // tambahkan atribut lain sesuai kebutuhan
        ]);

        return redirect()->route('kategoris.index')->with('success', 'Kategori berhasil ditambahkan.');
    }

    public function edit(Kategori $kategori)
    {
        $menus = Menu::where('id_kategori', $kategori->id_kategori)->get();
        return view('kategoris.edit', compact('kategori', 'menus'));
    }

    public function update(Request $request, Kategori $kategori)
    {
        $request->validate([
            'nama_kategori' => 'required',
            // tambahkan validasi sesuai kebutuhan
        ]);

        $kategori->update([
            'nama_kategori' => $request->nama_kategori,
            // tambahkan atribut lain sesuai kebutuhan
        ]);

        return redirect()->route('kategoris.index')->with('success', 'Kategori berhasil diperbarui.');
    }

    public function show(Kategori $kategori)
    {
        $menus = Menu::where('id_kategori', $kategori->id_kategori)->get();
        return view('kategoris.show', compact('kategori', 'menus'));
    }

    public function destroy(Kategori $kategori)
    {
        $kategori->delete();
        // tambahkan logika redirect sesuai kebutuhan
        return redirect()->route('kategoris.index')->with('success', 'Kategori berhasil dihapus.');
    }
}
