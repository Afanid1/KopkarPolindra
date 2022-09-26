<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Visi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VisiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $visi = Visi::all();
        return view('admin.visi.index', compact('visi'));
    }

    public function visi()
    {
        // $data = visi::latest()->paginate(5);
        // $data = Visi::orderBy('id', 'desc')->paginate(100);
        $visi = Visi::all();
        return view('visi.index', compact('visi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     return view('admin.visi.create');
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
            'keterangan2' => 'required',
            'gambar' => 'mimes:png,jpg,jpeg',
        ]);
        $data = $request->all();
        $data['gambar'] = $request->file('gambar')->store('visi');
        

        visi::create($data);


        return redirect()->route('admin.visi.index')->with(['success' => 'Data Berhasil Disimpan']);
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
        $visi = Visi::find($id);
        // $keterangan = Keterangan::all();

        return view('admin.visi.edit', [
            'visi' => $visi,
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
            $visi = Visi::find($id);
            $visi->update([
                'kategori_id' => $request->kategori_id,
                'judul' => $request->judul,
                'keterangan' => $request->keterangan,
                'keterangan2' => $request->keterangan2,
            ]);
            return redirect()->route('admin.visi.index')->with(['success' => 'Data Berhasil Diedit']);
            
        }else {
            $visi = Visi::find($id);
            Storage::delete($visi->gambar);
            $visi->update([
                'kategori_id' => $request->kategori_id,
                'judul' => $request->judul,
                'keterangan' => $request->keterangan,
                'keterangan2' => $request->keterangan2,
                'gambar' => $request->file('gambar')->store('visi'),
            ]);
            return redirect()->route('admin.visi.index')->with(['success' => 'Data Berhasil Diedit']);
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
        $visi = Visi::find($id);

        Storage::delete($visi->gambar);
        
        $visi->delete();

        return redirect()->route('admin.visi.index')->with(['success' => 'Data Berhasil Dihapus']);
    }

}
