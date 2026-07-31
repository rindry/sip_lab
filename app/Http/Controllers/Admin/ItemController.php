<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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


    // 2. CREATE (Tampilkan Form)
    public function create()
    {
        return view('admin.items.create');
    }

    // 3. STORE (Simpan Data Baru)
    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|unique:items,code',
            'name' => 'required|string|max:255',
            'stock' => 'required|integer|min:0',
            'jenis_lab' => 'required|string',
        ]);

        Item::create($request->all());

        return redirect()->route('admin.items.index')->with('success', 'Barang berhasil ditambahkan.');
    }

    // 4. EDIT (Tampilkan Form Edit)
    public function edit(Item $item)
    {
        return view('admin.items.edit', compact('item'));
    }

    // 5. UPDATE (Simpan Perubahan)
    public function update(Request $request, Item $item)
    {
        $request->validate([
            'code' => 'required|unique:items,code,' . $item->id,
            'name' => 'required|string|max:255',
            'stock' => 'required|integer|min:0',
            'jenis_lab' => 'required|string',
        ]);

        $item->update($request->all());

        return redirect()->route('admin.items.index')->with('success', 'Data barang berhasil diperbarui.');
    }

    // 6. DELETE (Hapus Data)
    public function destroy(Item $item)
    {
        $item->delete();
        return redirect()->route('admin.items.index')->with('success', 'Barang berhasil dihapus.');
    }
}
