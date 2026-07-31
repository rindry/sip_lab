<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        // Gunakan paginate(), jangan get()
        $items = Item::when($search, function ($query, $search) {
            return $query->where('name', 'like', "%{$search}%")
                ->orWhere('code', 'like', "%{$search}%")
                ->orWhere('jenis_lab', 'like', "%{$search}%");
        })
            ->latest()
            ->paginate(10) // <--- Pastikan ini paginate
            ->withQueryString();

        return view('admin.items.index', compact('items'));
    }

    public function create()
    {
        return view('items.create');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode_item' => 'required|unique:items,kode_item',
            'nama_item' => 'required|string|max:255',
            'kategori'  => 'required|string|max:100',
            'nama_lab'  => 'required|in:Lab Mesin,Lab Listrik,Lab Komputer',
            'stok'      => 'required|integer|min:0',
            'kondisi'   => 'required|in:Baik,Rusak Ringan,Rusak Berat',
            'deskripsi' => 'nullable|string',
        ]);

        Item::create($validated);

        return redirect()->route('items.index')
            ->with('success', 'Data barang berhasil ditambahkan');
    }
    public function edit(Item $item)
    {
        return view('items.form', [
            'item' => $item,
            'mode' => 'edit'
        ]);
    }
    public function update(Request $request, Item $item)
    {
        $validated = $request->validate([
            'kode_item' => 'required|unique:items,kode_item,' . $item->id,
            'nama_item' => 'required|string|max:255',
            'kategori'  => 'required|string|max:100',
            'nama_lab'  => 'required|in:Lab Mesin,Lab Listrik,Lab Komputer',
            'stok'      => 'required|integer|min:0',
            'kondisi'   => 'required|in:Baik,Rusak Ringan,Rusak Berat',
            'deskripsi' => 'nullable|string',
        ]);

        $item->update($validated);

        return redirect()->route('items.index')
            ->with('success', 'Data barang berhasil diperbarui');
    }
    public function destroy(Item $item)
    {
        $item->delete();

        return redirect()->route('items.index')
            ->with('success', 'Data barang berhasil dihapus');
    }
}
