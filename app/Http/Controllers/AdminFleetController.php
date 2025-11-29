<?php

namespace App\Http\Controllers;

use App\Models\Fleet;
use Illuminate\Http\Request;

class AdminFleetController extends Controller
{
    public function index()
    {
        $fleets = Fleet::orderBy('name')->paginate(10);

        return view('admin.fleets.index', compact('fleets'));
    }

    public function create()
    {
        return view('admin.fleets.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'         => 'required|string|max:255',
            'code'         => 'required|string|max:50|unique:fleets,code',
            'size'         => 'nullable|string|max:50',
            'price_per_km' => 'required|integer|min:0',
            'capacity_m3'  => 'required|numeric|min:0',
            'description'  => 'nullable|string',
        ]);

        Fleet::create($data);

        return redirect()
            ->route('admin.fleets.index')
            ->with('success', 'Armada baru berhasil ditambahkan.');
    }

    public function edit(Fleet $fleet)
    {
        return view('admin.fleets.edit', compact('fleet'));
    }

    public function update(Request $request, Fleet $fleet)
    {
        $data = $request->validate([
            'name'         => 'required|string|max:255',
            'code'         => 'required|string|max:50|unique:fleets,code,' . $fleet->id,
            'size'         => 'nullable|string|max:50',
            'price_per_km' => 'required|integer|min:0',
            'capacity_m3'  => 'required|numeric|min:0',
            'description'  => 'nullable|string',
        ]);

        $fleet->update($data);

        return redirect()
            ->route('admin.fleets.index')
            ->with('success', 'Data armada berhasil diperbarui.');
    }

    public function destroy(Fleet $fleet)
    {
        $fleet->delete();

        return redirect()
            ->route('admin.fleets.index')
            ->with('success', 'Armada berhasil dihapus.');
    }
}
