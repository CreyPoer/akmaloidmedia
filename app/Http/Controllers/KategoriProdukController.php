<?php

namespace App\Http\Controllers;

use App\DataTables\KategoriProdukDataTable;
use App\Http\Requests\KategoriProduk\StoreRequest;
use App\Http\Requests\KategoriProduk\UpdateRequest;
use App\Models\KategoriProduk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class KategoriProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(KategoriProdukDataTable $dataTable)
    {
        return $dataTable->render('admin.datamaster.kategoriproduk.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.datamaster.kategoriproduk.create');
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
            $path = $file->storeAs('public/KategoriProduk', $fileName);
            $validatedData['foto'] = str_replace('public', 'storage', $path);
        }

        KategoriProduk::create($validatedData);
        return redirect('/admin/kategoriproduk')->with('suksestambahkategoriproduk','Data Kategori Produk berhasil di tambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(KategoriProduk $kategoriProduk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = KategoriProduk::findOrFail($id);
        return view('admin.datamaster.kategoriproduk.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id)
    {
        $validatedData = $request->validated();

        $data = KategoriProduk::findOrFail($id);

        if ($request->hasFile('foto')) {
            if ($data->foto) {
                if (file_exists(public_path($data->foto))) {
                    unlink(public_path($data->foto));
                }
            }

            $file = $request->file('foto');
            $fileName = $request->name . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('public/KategoriProduk', $fileName);
            $validatedData['foto'] = str_replace('public', 'storage', $path);
        }
        $data->update($validatedData);

        return redirect('/admin/kategoriproduk')->with('suksesupdatekategoriproduk', 'Data Kategori Produk berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $user = KategoriProduk::findOrFail($request->id);

        // Hapus foto jika ada
        if (!empty($user->foto)) {
            $filePath = public_path($user->foto);
            if (File::exists($filePath)) {
                File::delete($filePath);
            }
        }

        $user->delete();

        return redirect('/admin/kategoriproduk')->with('suksesdeletekategoriproduk', 'Data Kategori Produk berhasil dihapus');
    }
}
