<?php

namespace App\Http\Controllers;

use App\DataTables\SlideShowDataTable;
use App\Http\Requests\SlideShow\StoreRequest;
use App\Http\Requests\SlideShow\UpdateRequest;
use App\Models\SlideShow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SlideShowController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(SlideShowDataTable $dataTable)
    {
        return $dataTable->render('admin.slideshow.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.slideshow.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $validatedData = $request->validated();

        if ($request->hasFile('icon')) {
            $file = $request->file('icon');
            $fileName = $request->judul . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('public/SlideShow/Icon', $fileName);
            $validatedData['icon'] = str_replace('public', 'storage', $path);
        }

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $fileName = $request->judul . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('public/SlideShow/Gambar', $fileName);
            $validatedData['gambar'] = str_replace('public', 'storage', $path);
        }

        SlideShow::create($validatedData);
        return redirect('/admin/slideshow')->with('suksestambahslideshow','Data SlideShow berhasil di tambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(SlideShow $slideShow)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = SlideShow::findOrFail($id);
        return view('admin.slideshow.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request,string $id)
    {
        $validatedData = $request->validated();

        $data = SlideShow::findOrFail($id);

        if ($request->hasFile('icon')) {
            if ($data->icon) {
                if (file_exists(public_path($data->icon))) {
                    unlink(public_path($data->icon));
                }
            }

            $file = $request->file('icon');
            $fileName = $request->judul . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('public/SlideShow/Icon', $fileName);
            $validatedData['icon'] = str_replace('public', 'storage', $path);
        }

        if ($request->hasFile('gambar')) {
            if ($data->gambar) {
                if (file_exists(public_path($data->gambar))) {
                    unlink(public_path($data->gambar));
                }
            }

            $file = $request->file('gambar');
            $fileName = $request->judul . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('public/SlideShow/Gambar', $fileName);
            $validatedData['gambar'] = str_replace('public', 'storage', $path);
        }

        $data->update($validatedData);

        return redirect('/admin/slideshow')->with('suksesupdateslideshow', 'Data SlideShow berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $user = SlideShow::findOrFail($request->id);

        // Hapus foto jika ada
        if (!empty($user->icon)) {
            $filePath = public_path($user->icon);
            if (File::exists($filePath)) {
                File::delete($filePath);
            }
        }
        if (!empty($user->gambar)) {
            $filePath = public_path($user->gambar);
            if (File::exists($filePath)) {
                File::delete($filePath);
            }
        }

        $user->delete();

        return redirect('/admin/slideshow')->with('suksesdeleteslideshow', 'Data SlideShow berhasil dihapus');
    }
}
