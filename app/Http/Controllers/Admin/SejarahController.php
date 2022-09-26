<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Sejarah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SejarahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sejarah = Sejarah::all();
        return view('admin.sejarah.index', compact('sejarah'));
    }

    public function sejarah()
    {
        // $data = sejarah::latest()->paginate(5);
        // $data = Sejarah::orderBy('id', 'desc')->paginate(100);
        $sejarah = Sejarah::all();
        return view('sejarah.index', compact('sejarah'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     return view('admin.sejarah.create');
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
        $data['gambar'] = $request->file('gambar')->store('sejarah');
        

        sejarah::create($data);


        return redirect()->route('admin.sejarah.index')->with(['success' => 'Data Berhasil Disimpan']);
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
        $sejarah = Sejarah::find($id);
        // $keterangan = Keterangan::all();

        return view('admin.sejarah.edit', [
            'sejarah' => $sejarah,
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
            $sejarah = Sejarah::find($id);
            $sejarah->update([
                'kategori_id' => $request->kategori_id,
                'judul' => $request->judul,
                'keterangan' => $request->keterangan,
                'keterangan2' => $request->keterangan2,
            ]);
            return redirect()->route('admin.sejarah.index')->with(['success' => 'Data Berhasil Diedit']);
            
        }else {
            $sejarah = Sejarah::find($id);
            Storage::delete($sejarah->gambar);
            $sejarah->update([
                'kategori_id' => $request->kategori_id,
                'judul' => $request->judul,
                'keterangan' => $request->keterangan,
                'keterangan2' => $request->keterangan2,
                'gambar' => $request->file('gambar')->store('sejarah'),
            ]);
            return redirect()->route('admin.sejarah.index')->with(['success' => 'Data Berhasil Diedit']);
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
        $sejarah = Sejarah::find($id);

        Storage::delete($sejarah->gambar);
        
        $sejarah->delete();

        return redirect()->route('admin.sejarah.index')->with(['success' => 'Data Berhasil Dihapus']);
    }

}
