<?php

namespace App\Http\Controllers;

use App\DataTables\PaketDataTable;
use App\Http\Requests\Paket\StoreRequest;
use App\Http\Requests\Paket\UpdateRequest;
use App\Models\KategoriProduk;
use App\Models\Paket;
use App\Models\Penerbit;
use App\Models\Periode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PaketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(PaketDataTable $dataTable)
    {
        return $dataTable->render('admin.datamaster.paket.index');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategoriproduk = KategoriProduk::all();
        $penerbit = Penerbit::all();
        $periode = Periode::all();
        return view('admin.datamaster.paket.create',compact('kategoriproduk','penerbit','periode'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $validatedData = $request->validated();

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $fileName = $request->name . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('public/Paket', $fileName);
            $validatedData['gambar'] = str_replace('public', 'storage', $path);
        }

        Paket::create($validatedData);
        return redirect('/admin/paket')->with('suksestambahpaket','Data Paket berhasil di tambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Paket $paket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Paket::findOrFail($id);
        $kategoriproduk = KategoriProduk::all();
        $penerbit = Penerbit::all();
        $periode = Periode::all();
        return view('admin.datamaster.paket.edit', compact('data','kategoriproduk','penerbit','periode'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id)
    {
        $validatedData = $request->validated();

        $data = Paket::findOrFail($id);

        if ($request->hasFile('gambar')) {
            if ($data->gambar) {
                if (file_exists(public_path($data->gambar))) {
                    unlink(public_path($data->gambar));
                }
            }

            $file = $request->file('gambar');
            $fileName = $request->name . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('public/Paket', $fileName);
            $validatedData['gambar'] = str_replace('public', 'storage', $path);
        }
        $data->update($validatedData);

        return redirect('/admin/paket')->with('suksesupdatepaket', 'Data Paket berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $user = Paket::findOrFail($request->id);

        // Hapus foto jika ada
        if (!empty($user->gambar)) {
            $filePath = public_path($user->gambar);
            if (File::exists($filePath)) {
                File::delete($filePath);
            }
        }

        $user->delete();

        return redirect('/admin/paket')->with('suksesdeletepaket', 'Data Paket berhasil dihapus');

    }
}
