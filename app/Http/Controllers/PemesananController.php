<?php

namespace App\Http\Controllers;

use App\DataTables\LaporanPemasukanDataTable;
use App\DataTables\PemesananDataTable;
use App\Models\DetailPemesanan;
use App\Models\Pemesanan;
use Egulias\EmailValidator\Result\Reason\DetailedReason;
use Illuminate\Http\Request;

class PemesananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(PemesananDataTable $dataTable)
    {
        return $dataTable->render('admin.pemesanan.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }


    public function pemasukan(LaporanPemasukanDataTable $dataTable)
    {
        return $dataTable->render('admin.laporan.index');
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
    public function show(string $id)
    {
        $detailpemesanan = DetailPemesanan::where('order_code',$id)->get();
        return view('admin.pemesanan.show',compact('detailpemesanan','id'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pemesanan $pemesanan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pemesanan $pemesanan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pemesanan $pemesanan)
    {
        //
    }
}
