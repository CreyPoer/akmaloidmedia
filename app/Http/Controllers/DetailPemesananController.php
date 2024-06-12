<?php

namespace App\Http\Controllers;

use App\Models\DetailPemesanan;
use App\Models\Pemesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DetailPemesananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function addtocart(Request $request)
    {
        $checkpemesanan = Pemesanan::where('user_id',$request->user_id)->
                            where('status_pemesanan','Belum Aktif')->first();

        if($checkpemesanan){
            $order_code =  $checkpemesanan->order_code;
        }else{
            $pemesanan = new Pemesanan();
            $pemesanan->order_code = 'PO-' . strtoupper(Str::random(8));
            $pemesanan->user_id = $request->user_id;
            $pemesanan->tanggal_pemesanan = now();
            $pemesanan->status_pemesanan = 'Belum Aktif';
            $pemesanan->save();

            $order_code =  $pemesanan->order_code;
        }

        $langganan = $request->langganan;
        $lamalangganan = $request->lamalangganan;
        $startDate = $request->start_langganan;
        $startDateObj = Carbon::createFromFormat('Y-m-d', $startDate);

        if($langganan == "Minggu"){
            $endDateObj = $startDateObj->addWeeks($lamalangganan);
        }else if($langganan == "Hari"){
            $endDateObj = $startDateObj->addDays($lamalangganan);
        }else if($langganan == "Setengah Bulan"){
            $endDateObj = $startDateObj->addDays($lamalangganan * 15);
        }else if($langganan == "Bulan"){
            $endDateObj = $startDateObj->addMonths($lamalangganan);
        }else if($langganan == "Tahun"){
            $endDateObj = $startDateObj->addYears($lamalangganan);
        }
        $endDate = $endDateObj->format('Y-m-d');

        $paket = new DetailPemesanan();
        $paket->paket_id = $request->paket_id;
        $paket->start_langganan = $startDate;
        $paket->end_langganan = $endDate;
        $paket->lama_langganan = $lamalangganan;
        $paket->total_pengiriman = $lamalangganan;
        $paket->sub_total = $request->sub_total;
        $paket->order_code = $order_code;

        $paket->save();

        return redirect('/pelanggan/tampilcart/'.$request->user_id)->with('suksesaddcartuser', 'Paket Berhasil di Tambahkan ke Keranjang');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function tampilcart(string $id)
    {
        $nickname = Str::words(Auth::user()->name, 2, '');
        $checkordercode = Pemesanan::where('user_id', $id)
                            ->where('status_pemesanan', 'Belum Aktif')
                            ->first();
        if($checkordercode){
            $data = DetailPemesanan::where('order_code', $checkordercode->order_code)->get();
            $jumlah = DetailPemesanan::where('order_code', $checkordercode->order_code)->count('order_code');
        }else{
            $data = "Kosong";
            $jumlah = 0;
        }
        $isicart = $jumlah;
        return view('user.cart', compact('data','nickname','jumlah','isicart'));
    }

    public function create()
    {
        //
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
    public function show(DetailPemesanan $detailPemesanan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DetailPemesanan $detailPemesanan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DetailPemesanan $detailPemesanan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DetailPemesanan $detailPemesanan)
    {
        //
    }
}
