<?php

namespace App\Http\Controllers;

use App\DataTables\PembayaranDataTable;
use App\DataTables\PemesananDataTable;
use App\Models\Pembayaran;
use App\Models\Pemesanan;
use Illuminate\Http\Request;

use function Termwind\render;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(PembayaranDataTable $dataTable)
    {
        return $dataTable->render('admin.pembayaran.validasi.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function validasi(Request $request)
    {
        $pembayaran = Pembayaran::findOrFail($request->id);
        $pemesanan_id = $pembayaran->pemesanan_id;
        $pemesanan = Pemesanan::findOrFail($pemesanan_id);

        $pembayaran->status_pembayaran = "Lunas";
        $pembayaran->save();

        $pemesanan->status_pemesanan = "Aktif";
        $pemesanan->save();

        return redirect('/admin/validasipembayaran')->with('suksesvalidasipembayaran','Pembayaran berhasil di validasi dan data pesanan sudah aktif');


    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Pembayaran $pembayaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pembayaran $pembayaran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pembayaran $pembayaran)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pembayaran $pembayaran)
    {
        //
    }
}
