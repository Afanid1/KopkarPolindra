<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $berita = Berita::all();
        return view('admin.berita.index', compact('berita'));
    }

    public function berita()
    {
        // $data = berita::latest()->paginate(5);
        // $data = Berita::orderBy('id', 'desc')->paginate(100);
        $berita = Berita::all();
        return view('berita.index', compact('berita'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     return view('admin.berita.create');
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
            // 'gambar' => 'mimes:png,jpg,jpeg',
        ]);
        $data = $request->all();
        // $data['gambar'] = $request->file('gambar')->store('berita');
        

        berita::create($data);

        return redirect()->route('admin.berita.index')->with(['success' => 'Data Berhasil Disimpan']);
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
        $berita = Berita::find($id);
        // $keterangan = Keterangan::all();

        return view('admin.berita.edit', [
            'berita' => $berita,
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
            $berita = Berita::find($id);
            $berita->update([
                'kategori_id' => $request->kategori_id,
                'judul' => $request->judul,
                'keterangan' => $request->keterangan,
            ]);
            return redirect()->route('admin.berita.index')->with(['success' => 'Data Berhasil Diedit']);
            
        }else {
            $berita = Berita::find($id);
            Storage::delete($berita->gambar);
            $berita->update([
                'kategori_id' => $request->kategori_id,
                'judul' => $request->judul,
                'keterangan' => $request->keterangan,
                'gambar' => $request->file('gambar')->store('berita'),
            ]);
            return redirect()->route('admin.berita.index')->with(['success' => 'Data Berhasil Diedit']);
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
        $berita = Berita::find($id);

        Storage::delete($berita->gambar);
        
        $berita->delete();

        return redirect()->route('admin.berita.index')->with(['success' => 'Data Berhasil Dihapus']);
    }

}
