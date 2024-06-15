<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\DataTables\UserDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserManagement\StoreRequest;
use App\Http\Requests\UserManagement\UpdateRequest;
use App\Models\DetailPemesanan;
use App\Models\KategoriProduk;
use App\Models\Paket;
use App\Models\Pemesanan;
use App\Models\Penerbit;
use App\Models\SlideShow;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(UserDataTable $dataTable,Request $request)
    {
        return $dataTable->with(['role' => $request->input('role')])->render('admin.usermanagement.index');
        // return $dataTable->render('admin.usermanagement.index');
    }

    public function pelanggan()
    {
        $checkpemesanan = Pemesanan::where('user_id',Auth::user()->id)->
                            where('status_pemesanan','Belum Aktif')->first();
        if($checkpemesanan){
            $isicart = DetailPemesanan::where('order_code', $checkpemesanan->order_code)->count('order_code');
        }else{
            $isicart = 0;
        }

        $slideshow = SlideShow::all();
        $penerbit = Penerbit::all();
        $kategoriproduk = KategoriProduk::all();
        $paket = Paket::inRandomOrder()->take(3)->get();
        $name = Str::words(Auth::user()->name, 2, '');
        return view('user.index',compact('name','slideshow','penerbit','kategoriproduk','paket','isicart'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.usermanagement.create');
    }

    public function profile(string $id)
    {
        $checkpemesanan = Pemesanan::where('user_id',Auth::user()->id)->
                            where('status_pemesanan','Belum Aktif')->first();
        if($checkpemesanan){
            $isicart = DetailPemesanan::where('order_code', $checkpemesanan->order_code)->count('order_code');
        }else{
            $isicart = 0;
        }

        $data = User::findOrFail($id);
        $nickname = Str::words($data->name, 2, '');
        if ($data->gender == 'L') {
            $gender = 'Laki-laki';
        }else{
            $gender = 'Perempuan';
        }
        return view('user.profile', compact('data','nickname','gender','isicart'));
    }

    public function admin(){
        $paket = Paket::all()->count('id');
        $user = User::all()->count('id');
        $totalpemasukan = Pemesanan::where('status_pemesanan','Aktif')->sum('total_biaya');
        $verifikasi = Pemesanan::where('status_pemesanan','Menunggu Konfirmasi')->count('id');

        $monthlyEarnings = DB::table('pemesanans')
        ->select(DB::raw('SUM(total_biaya) as total'), DB::raw('MONTH(tanggal_pemesanan) as month'))
        ->where('status_pemesanan','Aktif')
        ->groupBy(DB::raw('MONTH(tanggal_pemesanan)'))
        ->pluck('total', 'month')
        ->toArray();

        // Inisialisasi array dengan 0 untuk setiap bulan
        $monthlyEarningsData = array_fill(1, 12, 0);
        foreach ($monthlyEarnings as $month => $total) {
            $monthlyEarningsData[$month] = $total;
        }

        $categories = DB::table('kategori_produks')
        ->join('pakets', 'kategori_produks.id', '=', 'pakets.kategori_produk_id')
        ->select('kategori_produks.name', DB::raw('COUNT(pakets.id) as total_menu'))
        ->groupBy('kategori_produks.name')
        ->get();

        // Memisahkan data menjadi dua array: satu untuk label dan satu untuk data
        $labels = $categories->pluck('name')->toArray();
        $total_menu = $categories->pluck('total_menu')->toArray();


        return view('admin.index',compact('labels','total_menu','monthlyEarningsData','paket','user','verifikasi','totalpemasukan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $validatedData = $request->validated();

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $fileName = $request->name . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('public/User', $fileName);
            $validatedData['foto'] = str_replace('public', 'storage', $path);
        }

        $validatedData['password'] = Hash::make($validatedData['password']);
        User::create($validatedData);
        return redirect('/admin/usermanagement')->with('suksestambahuser','Data User berhasil di tambahkan');
    }

    public function register(StoreRequest $request)
    {
        $validatedData = $request->validated();

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $fileName = $request->name . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('public/User', $fileName);
            $validatedData['foto'] = str_replace('public', 'storage', $path);
        }

        $validatedData['password'] = Hash::make($validatedData['password']);
        User::create($validatedData);
        return redirect('/register')->with('suksesdaftar','Data Anda berhasil di tambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = User::findOrFail($id);
        return view('admin.usermanagement.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id)
    {
        $validatedData = $request->validated();

        $user = User::findOrFail($id);

        if ($request->hasFile('foto')) {
            if ($user->foto) {
                // Hapus gambar lama dari direktori
                if (file_exists(public_path($user->foto))) {
                    unlink(public_path($user->foto));
                }
            }

            $file = $request->file('foto');
            $fileName = $request->name . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('public/User', $fileName);
            $validatedData['foto'] = str_replace('public', 'storage', $path);
        }

        if (!empty($request->password)) {
            $validatedData['password'] = Hash::make($request->password);
        } else {
            unset($validatedData['password']);
        }

        $user->update($validatedData);

        return redirect('/admin/usermanagement')->with('suksesupdateuser', 'Data User berhasil diperbarui');
    }

    public function changeprofile(UpdateRequest $request, string $id)
    {
        $validatedData = $request->validated();

        $user = User::findOrFail($id);

        if ($request->hasFile('foto')) {
            if ($user->foto) {
                // Hapus gambar lama dari direktori
                if (file_exists(public_path($user->foto))) {
                    unlink(public_path($user->foto));
                }
            }

            $file = $request->file('foto');
            $fileName = $request->name . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('public/User', $fileName);
            $validatedData['foto'] = str_replace('public', 'storage', $path);
        }

        if (!empty($request->password)) {
            $validatedData['password'] = Hash::make($request->password);
        } else {
            unset($validatedData['password']);
        }

        $user->update($validatedData);

        return redirect('/pelanggan/profile/'.$id)->with('sukseseditpelanggan', 'Data Anda berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $user = User::findOrFail($request->id);

        // Hapus foto jika ada
        if (!empty($user->foto)) {
            $filePath = public_path($user->foto);
            if (File::exists($filePath)) {
                File::delete($filePath);
            }
        }

        $user->delete();

        return redirect('/admin/usermanagement')->with('suksesdeleteuser', 'Data User berhasil dihapus');

    }
}
