<?php

namespace App\Http\Controllers;

use App\Models\Tamu;
use Illuminate\Http\Request;

class TamuController extends Controller
{
    /**
     * Tampilkan dashboard dengan filter tanggal & statistik harian.
     */
    public function index(Request $request)
    {
        // Tanggal awal & akhir filter (default: hari ini)
        $start = $request->get('start', date('Y-m-d'));
        $end   = $request->get('end', date('Y-m-d'));

        // Ambil data tamu sesuai range tanggal
        $dataTamu = Tamu::whereDate('created_at', '>=', $start)
                        ->whereDate('created_at', '<=', $end)
                        ->orderByDesc('created_at')
                        ->get();

        // Statistik untuk hari ini
        $today = now()->toDateString();
        $total    = Tamu::whereDate('created_at', $today)->sum('jumlah') ?? 0;
        $checkin  = Tamu::whereDate('created_at', $today)->where('status', 'check-in')->sum('jumlah') ?? 0;
        $checkout = Tamu::whereDate('created_at', $today)->where('status', 'check-out')->sum('jumlah') ?? 0;

        // Kirim data ke view
        return view('admin.dashboard', compact(
            'dataTamu', 'total', 'checkin', 'checkout', 'start', 'end'
        ));
    }

    /**
     * Tampilkan form registrasi tamu.
     */
    public function create()
    {
        return view('registrasi'); // Pastikan view-nya ada di resources/views/registrasi.blade.php
    }

    /**
     * Simpan data registrasi tamu baru.
     */
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'nama_tamu'   => 'required|string|max:100',
            'perusahaan'  => 'nullable|string|max:100',
            'alamat'      => 'nullable|string',
            'unit'        => 'nullable|string|max:100',
            'pegawai'     => 'nullable|string|max:100',
            'apd'         => 'nullable|array',
            'keperluan'   => 'nullable|string',
            'ktp'         => 'nullable|string|max:100',
            'kendaraan'   => 'nullable|string|max:100',
            'name_tag'    => 'nullable|string|max:50',
            'jumlah'      => 'nullable|integer',
            'induksi'     => 'nullable|string|max:20',
            'foto'        => 'nullable|image|max:5048'
        ]);

        // Konversi data ke format simpan
        $data = $validated;
        $data['apd'] = $request->has('apd') ? implode(', ', $request->apd) : null;

        // Upload file foto jika ada
        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('uploads', 'public');
            $data['link_foto'] = 'storage/' . $path;
        }

        unset($data['foto']); // Tidak perlu disimpan langsung

        // Set default status
        $data['status'] = 'check-in';

        // Simpan ke database
        Tamu::create($data);

        return redirect()->back()->with('success', 'Data tamu berhasil disimpan.');
    }

    /**
     * Checkout tamu berdasarkan ID.
     */
    public function checkout($id)
    {
        $tamu = Tamu::findOrFail($id);

        $tamu->update([
            'status'       => 'check-out',
            'jam_checkout' => now(),
        ]);

        return redirect()->back()->with('success', 'Tamu berhasil checkout.');
    }
}
