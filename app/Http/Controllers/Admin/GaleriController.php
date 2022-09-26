<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GaleriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galeri = Galeri::all();
        return view('admin.galeri.index', compact('galeri'));
    }

    public function galeri()
    {
        // $data = galeri::latest()->paginate(5);
        // $data = Galeri::orderBy('id', 'desc')->paginate(100);
        $galeri = Galeri::all();
        return view('galeri.index', compact('galeri'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     return view('admin.galeri.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'judul' => 'required',
            'keterangan' => 'required',
            'gambar' => 'mimes:png,jpg,jpeg',
        ]);
        $data = $request->all();
        $data['gambar'] = $request->file('gambar')->store('galeri');
        

        galeri::create($data);


        return redirect()->route('admin.galeri.index')->with(['success' => 'Data Berhasil Disimpan']);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $galeri = Galeri::find($id);
        // $keterangan = Keterangan::all();

        return view('admin.galeri.edit', [
            'galeri' => $galeri,
            // 'keterangan' => $keterangan,
        ]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(empty($request->file('gambar'))){
            $galeri = Galeri::find($id);
            $galeri->update([
                'kategori_id' => $request->kategori_id,
                'judul' => $request->judul,
                'keterangan' => $request->keterangan,
            ]);
            return redirect()->route('admin.galeri.index')->with(['success' => 'Data Berhasil Diedit']);
            
        }else {
            $galeri = Galeri::find($id);
            Storage::delete($galeri->gambar);
            $galeri->update([
                'kategori_id' => $request->kategori_id,
                'judul' => $request->judul,
                'keterangan' => $request->keterangan,
                'gambar' => $request->file('gambar')->store('galeri'),
            ]);
            return redirect()->route('admin.galeri.index')->with(['success' => 'Data Berhasil Diedit']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $galeri = Galeri::find($id);

        Storage::delete($galeri->gambar);
        
        $galeri->delete();

        return redirect()->route('admin.galeri.index')->with(['success' => 'Data Berhasil Dihapus']);
    }

}
