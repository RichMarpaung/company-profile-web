<?php

namespace App\Http\Controllers;

use App\Models\Lowongan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LowonganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lowongans = Lowongan::all();
        return view('adminpage.lowongan.index', compact('lowongans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('adminpage.lowongan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:50',
            'deskripsi' => 'required|string',
            'kualifikasi' => 'required|string',
            'gaji' => 'required|numeric',
            'tanggal_ditutup' => 'required|date',
            'poster' => 'nullable|file|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'required|in:dibuka,ditutup',
        ]);

        $posterPath = $request->file('poster') ? $request->file('poster')->store('posters', 'public') : null;

        Lowongan::create([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'kualifikasi' => $request->kualifikasi,
            'gaji' => $request->gaji,
            'tanggal_ditutup' => $request->tanggal_ditutup,
            'poster' => $posterPath,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.lowongans.index')->with('success', 'Lowongan created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lowongan $lowongan)
    {
        return view('adminpage.lowongan.edit', compact('lowongan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lowongan $lowongan)
    {
        $request->validate([
            'nama' => 'required|string|max:50',
            'deskripsi' => 'required|string',
            'kualifikasi' => 'required|string',
            'gaji' => 'required|numeric',
            'tanggal_ditutup' => 'required|date',
            'poster' => 'nullable|file|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'required|in:dibuka,ditutup',
        ]);

        if ($request->hasFile('poster')) {
            if ($lowongan->poster) {
                Storage::disk('public')->delete($lowongan->poster);
            }
            $posterPath = $request->file('poster')->store('posters', 'public');
            $lowongan->poster = $posterPath;
        }

        $lowongan->update([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'kualifikasi' => $request->kualifikasi,
            'gaji' => $request->gaji,
            'tanggal_ditutup' => $request->tanggal_ditutup,
            'poster' => $lowongan->poster,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.lowongans.index')->with('success', 'Lowongan updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lowongan $lowongan)
    {
        if ($lowongan->poster) {
            Storage::disk('public')->delete($lowongan->poster);
        }
        $lowongan->delete();

        return redirect()->route('admin.lowongans.index')->with('success', 'Lowongan deleted successfully.');
    }
}
