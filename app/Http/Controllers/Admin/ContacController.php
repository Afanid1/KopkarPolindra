<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Contac;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ContacController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contac = Contac::all();
        return view('admin.contac.index', compact('contac'));
    }

    public function contac()
    {
        // $data = contac::latest()->paginate(5);
        // $data = Contac::orderBy('id', 'desc')->paginate(100);
        $contac = Contac::all();
        return view('contac.index', compact('contac'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     return view('admin.contac.create');
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
        // $data['gambar'] = $request->file('gambar')->store('contac');
        

        contac::create($data);


        return redirect()->route('admin.contac.index')->with(['success' => 'Data Berhasil Disimpan']);
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
        $contac = Contac::find($id);
        // $keterangan = Keterangan::all();

        return view('admin.contac.edit', [
            'contac' => $contac,
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
            $contac = Contac::find($id);
            $contac->update([
                'kategori_id' => $request->kategori_id,
                'judul' => $request->judul,
                'keterangan' => $request->keterangan,
            ]);
            return redirect()->route('admin.contac.index')->with(['success' => 'Data Berhasil Diedit']);
            
        }else {
            $contac = Contac::find($id);
            Storage::delete($contac->gambar);
            $contac->update([
                'kategori_id' => $request->kategori_id,
                'judul' => $request->judul,
                'keterangan' => $request->keterangan,
                'gambar' => $request->file('gambar')->store('contac'),
            ]);
            return redirect()->route('admin.contac.index')->with(['success' => 'Data Berhasil Diedit']);
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
        $contac = Contac::find($id);

        Storage::delete($contac->gambar);
        
        $contac->delete();

        return redirect()->route('admin.contac.index')->with(['success' => 'Data Berhasil Dihapus']);
    }

}
