<?php

namespace App\Http\Controllers;

use App\DataTables\PenerbitDataTable;
use App\Http\Requests\Penerbit\StoreRequest;
use App\Http\Requests\Penerbit\UpdateRequest;
use App\Models\Penerbit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PenerbitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(PenerbitDataTable $dataTable)
    {
        return $dataTable->render('admin.datamaster.penerbit.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.datamaster.penerbit.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $validatedData = $request->validated();

        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $fileName = $request->name . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('public/Penerbit', $fileName);
            $validatedData['logo'] = str_replace('public', 'storage', $path);
        }

        Penerbit::create($validatedData);
        return redirect('/admin/penerbit')->with('suksestambahpenerbit','Data Penerbit berhasil di tambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Penerbit $penerbit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Penerbit::findOrFail($id);
        return view('admin.datamaster.penerbit.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id)
    {
        $validatedData = $request->validated();

        $data = Penerbit::findOrFail($id);

        if ($request->hasFile('logo')) {
            if ($data->logo) {
                if (file_exists(public_path($data->logo))) {
                    unlink(public_path($data->logo));
                }
            }

            $file = $request->file('logo');
            $fileName = $request->name . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('public/Penerbit', $fileName);
            $validatedData['logo'] = str_replace('public', 'storage', $path);
        }
        $data->update($validatedData);

        return redirect('/admin/penerbit')->with('suksesupdatepenerbit', 'Data Penerbit berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $user = Penerbit::findOrFail($request->id);

        // Hapus foto jika ada
        if (!empty($user->foto)) {
            $filePath = public_path($user->foto);
            if (File::exists($filePath)) {
                File::delete($filePath);
            }
        }

        $user->delete();

        return redirect('/admin/penerbit')->with('suksesdeletepenerbit', 'Data Penerbit berhasil dihapus');
    }
}
