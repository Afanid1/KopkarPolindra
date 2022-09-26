<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Struktur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StrukturController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $struktur = Struktur::all();
        return view('admin.struktur.index', compact('struktur'));
    }

    public function struktur()
    {
        // $data = struktur::latest()->paginate(5);
        // $data = Struktur::orderBy('id', 'desc')->paginate(100);
        $struktur = Struktur::all();
        return view('struktur.index', compact('struktur'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     return view('admin.struktur.create');
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
        $data['gambar'] = $request->file('gambar')->store('struktur');
        

        struktur::create($data);


        return redirect()->route('admin.struktur.index')->with(['success' => 'Data Berhasil Disimpan']);
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
        $struktur = Struktur::find($id);
        // $keterangan = Keterangan::all();

        return view('admin.struktur.edit', [
            'struktur' => $struktur,
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
            $struktur = Struktur::find($id);
            $struktur->update([
                'kategori_id' => $request->kategori_id,
                'judul' => $request->judul,
                'keterangan' => $request->keterangan,
                'keterangan2' => $request->keterangan2,
            ]);
            return redirect()->route('admin.struktur.index')->with(['success' => 'Data Berhasil Diedit']);
            
        }else {
            $struktur = Struktur::find($id);
            Storage::delete($struktur->gambar);
            $struktur->update([
                'kategori_id' => $request->kategori_id,
                'judul' => $request->judul,
                'keterangan' => $request->keterangan,
                'keterangan2' => $request->keterangan2,
                'gambar' => $request->file('gambar')->store('struktur'),
            ]);
            return redirect()->route('admin.struktur.index')->with(['success' => 'Data Berhasil Diedit']);
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
        $struktur = Struktur::find($id);

        Storage::delete($struktur->gambar);
        
        $struktur->delete();

        return redirect()->route('admin.struktur.index')->with(['success' => 'Data Berhasil Dihapus']);
    }

}
