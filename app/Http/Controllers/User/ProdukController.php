<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\DetailPemesanan;
use App\Models\KategoriProduk;
use App\Models\Paket;
use App\Models\Pemesanan;
use App\Models\Penerbit;
use App\Models\Periode;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function all()
    {
        $kategoriproduk = KategoriProduk::all();
        $periode = Periode::all();
        $penerbit = Penerbit::all();
        $data = Paket::all();
        return view('guest.produk', compact('data','kategoriproduk','penerbit','periode'));
    }
    public function kategoriproduk(string $id)
    {
        $kategoriproduk = KategoriProduk::all();
        $periode = Periode::all();
        $penerbit = Penerbit::all();
        $data = Paket::where('kategori_produk_id',$id)->get();
        return view('guest.produk', compact('data','kategoriproduk','penerbit','periode'));
    }
    public function penerbit(string $id)
    {
        $kategoriproduk = KategoriProduk::all();
        $periode = Periode::all();
        $penerbit = Penerbit::all();
        $data = Paket::where('penerbit_id',$id)->get();
        return view('guest.produk', compact('data','kategoriproduk','penerbit','periode'));
    }

    public function caricheck(Request $request)
    {
        $query = Paket::query();

        if ($request->has('kategori_produk_id')) {
            $query->whereIn('kategori_produk_id', $request->kategori_produk_id);
        }

        if ($request->has('penerbit_id')) {
            $query->whereIn('penerbit_id', $request->penerbit_id);
        }
        if ($request->has('periode_id')) {
            $query->whereIn('periode_id', $request->periode_id);
        }

        $data = $query->get();

        $kategoriproduk = KategoriProduk::all();
        $periode = Periode::all();
        $penerbit = Penerbit::all();

        return view('guest.produk', compact('data', 'kategoriproduk','penerbit', 'periode'));
    }




    public function produkall()
    {
        $checkpemesanan = Pemesanan::where('user_id',Auth::user()->id)->
                            where('status_pemesanan','Belum Aktif')->first();
        if($checkpemesanan){
            $isicart = DetailPemesanan::where('order_code', $checkpemesanan->order_code)->count('order_code');
        }else{
            $isicart = 0;
        }
        $nickname = Str::words(Auth::user()->name, 2, '');
        $kategoriproduk = KategoriProduk::all();
        $periode = Periode::all();
        $penerbit = Penerbit::all();
        $data = Paket::all();
        return view('user.produk', compact('data','kategoriproduk','penerbit','periode','nickname','isicart'));
    }
    public function paketkategoriproduk(string $id)
    {
        $checkpemesanan = Pemesanan::where('user_id',Auth::user()->id)->
                            where('status_pemesanan','Belum Aktif')->first();
        if($checkpemesanan){
            $isicart = DetailPemesanan::where('order_code', $checkpemesanan->order_code)->count('order_code');
        }else{
            $isicart = 0;
        }
        $nickname = Str::words(Auth::user()->name, 2, '');
        $kategoriproduk = KategoriProduk::all();
        $periode = Periode::all();
        $penerbit = Penerbit::all();
        $data = Paket::where('kategori_produk_id',$id)->get();
        return view('user.produk', compact('data','kategoriproduk','penerbit','periode','nickname','isicart'));
    }
    public function paketpenerbit(string $id)
    {
        $checkpemesanan = Pemesanan::where('user_id',Auth::user()->id)->
                            where('status_pemesanan','Belum Aktif')->first();
        if($checkpemesanan){
            $isicart = DetailPemesanan::where('order_code', $checkpemesanan->order_code)->count('order_code');
        }else{
            $isicart = 0;
        }
        $nickname = Str::words(Auth::user()->name, 2, '');
        $kategoriproduk = KategoriProduk::all();
        $periode = Periode::all();
        $penerbit = Penerbit::all();
        $data = Paket::where('penerbit_id',$id)->get();
        return view('user.produk', compact('data','kategoriproduk','penerbit','periode','nickname','isicart'));
    }

    public function checkproduk(Request $request)
    {
        $query = Paket::query();

        if ($request->has('kategori_produk_id')) {
            $query->whereIn('kategori_produk_id', $request->kategori_produk_id);
        }

        if ($request->has('penerbit_id')) {
            $query->whereIn('penerbit_id', $request->penerbit_id);
        }
        if ($request->has('periode_id')) {
            $query->whereIn('periode_id', $request->periode_id);
        }

        $data = $query->get();

        $nickname = Str::words(Auth::user()->name, 2, '');

        $checkpemesanan = Pemesanan::where('user_id',Auth::user()->id)->
                            where('status_pemesanan','Belum Aktif')->first();
        if($checkpemesanan){
            $isicart = DetailPemesanan::where('order_code', $checkpemesanan->order_code)->count('order_code');
        }else{
            $isicart = 0;
        }

        $kategoriproduk = KategoriProduk::all();
        $periode = Periode::all();
        $penerbit = Penerbit::all();

        return view('user.produk', compact('data', 'kategoriproduk','penerbit', 'periode','nickname','isicart'));
    }
}
