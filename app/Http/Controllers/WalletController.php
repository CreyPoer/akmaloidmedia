<?php

namespace App\Http\Controllers;

use App\DataTables\WalletDataTable;
use App\Http\Requests\Wallet\StoreRequest;
use App\Http\Requests\Wallet\UpdateRequest;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class WalletController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(WalletDataTable $dataTable)
    {
        return $dataTable->render('admin.pembayaran.wallet.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pembayaran.wallet.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $validatedData = $request->validated();

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $fileName = $request->e_wallet . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('public/Wallet', $fileName);
            $validatedData['gambar'] = str_replace('public', 'storage', $path);
        }

        Wallet::create($validatedData);
        return redirect('/admin/wallet')->with('suksestambahwallet','Data Dompet Digital berhasil di tambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Wallet $wallet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Wallet::findOrFail($id);
        return view('admin.pembayaran.wallet.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id)
    {
        $validatedData = $request->validated();

        $data = Wallet::findOrFail($id);

        if ($request->hasFile('gambar')) {
            if ($data->gambar) {
                if (file_exists(public_path($data->gambar))) {
                    unlink(public_path($data->gambar));
                }
            }

            $file = $request->file('gambar');
            $fileName = $request->e_wallet . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('public/Wallet', $fileName);
            $validatedData['gambar'] = str_replace('public', 'storage', $path);
        }

        $data->update($validatedData);

        return redirect('/admin/wallet')->with('suksesupdatewallet', 'Data Dompet Digital berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $data = Wallet::findOrFail($request->id);

        if (!empty($data->gambar)) {
            $filePath = public_path($data->gambar);
            if (File::exists($filePath)) {
                File::delete($filePath);
            }
        }

        $data->delete();

        return redirect('/admin/wallet')->with('suksesdeletewallet', 'Data Dompet Digital berhasil dihapus');
    }
}
