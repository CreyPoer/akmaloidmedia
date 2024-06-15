<?php

namespace App\Http\Controllers;

use App\Models\DetailPemesanan;
use App\Models\Pembayaran;
use App\Models\Pemesanan;
use App\Models\User;
use App\Models\Wallet;
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
            $pemesanan_id = $checkordercode->id;
        }else{
            $data = "Kosong";
            $jumlah = 0;
            $pemesanan_id = 0;
        }
        $isicart = $jumlah;
        $wallets = Wallet::all();
        return view('user.cart', compact('data','nickname','jumlah','isicart','wallets','pemesanan_id'));
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
        $status_pembayaran = "Menunggu Verifikasi";

        $pemesanan = Pemesanan::findOrFail($request->pemesanan_id);
        $pemesanan->tanggal_pemesanan = now();
        $pemesanan->total_biaya = $request->total_biaya;
        $pemesanan->status_pemesanan = 'Menunggu Konfirmasi';
        $pemesanan->save();

        $order_code = $pemesanan->order_code;

        if ($request->hasFile('bukti_bayar')) {
            $file = $request->file('bukti_bayar');
            $fileName = $order_code . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('public/BuktiBayar', $fileName);
        }

        $pembayaran = new Pembayaran();
        $pembayaran->pemesanan_id = $request->pemesanan_id;
        $pembayaran->wallet_id = $request->wallet_id;
        $pembayaran->tanggal_bayar = now();
        $pembayaran->bukti_bayar = str_replace('public', 'storage', $path);
        $pembayaran->status_pembayaran = $status_pembayaran;
        $pembayaran->save();

        return redirect('/pelanggan/riwayatpesanan/'.$request->user_id)->with('suksespesanpaket', 'Paket Berhasil di Pesan');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $checkordercode = Pemesanan::where('user_id', $id)
        ->where('status_pemesanan', 'Belum Aktif')
        ->first();
        if($checkordercode){
            $isicart = DetailPemesanan::where('order_code', $checkordercode->order_code)->count('order_code');
        }else{
            $isicart = 0;
        }
        $nickname = Str::words(Auth::user()->name, 2, '');

        $user = User::findOrFail($id);
        $nickname2 = Str::words($user->name, 2, '');
        $riwayatpesanan = Pemesanan::where('user_id',$id)
                    ->whereNotIn('status_pemesanan',['Belum Aktif'])
                    ->get();
        $jumlah =  Pemesanan::where('user_id',$id)
        ->whereNotIn('status_pemesanan',['Belum Aktif'])
        ->count('id');
        return view('user.riwayatpesanan',compact('user','riwayatpesanan','nickname','isicart','nickname2','jumlah'));
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
    public function destroy(Request $request)
    {
        $data = DetailPemesanan::findOrFail($request->id);
        $user_id = $request->user_id;

        $data->delete();

        return redirect('/pelanggan/tampilcart/'.$user_id)->with('suksesdeletecart', 'Data Keranjang berhasil dihapus');
    }
}
