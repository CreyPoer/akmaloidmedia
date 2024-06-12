<?php

namespace App\Http\Controllers;

use App\DataTables\PeriodeDataTable;
use App\Http\Requests\Periode\StoreRequest;
use App\Http\Requests\Periode\UpdateRequest;
use App\Models\Periode;
use Illuminate\Http\Request;

class PeriodeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(PeriodeDataTable $dataTable)
    {
        return $dataTable->render('admin.datamaster.periode.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.datamaster.periode.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $validatedData = $request->validated();

        Periode::create($validatedData);
        return redirect('/admin/periode')->with('suksestambahperiode','Data Periode berhasil di tambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Periode $periode)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Periode::findOrFail($id);
        return view('admin.datamaster.periode.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id)
    {
        $validatedData = $request->validated();

        $data = Periode::findOrFail($id);
        $data->update($validatedData);

        return redirect('/admin/periode')->with('suksesupdateperiode', 'Data Periode berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $user = Periode::findOrFail($request->id);

        $user->delete();

        return redirect('/admin/periode')->with('suksesdeleteperiode', 'Data Periode berhasil dihapus');
    }
}
