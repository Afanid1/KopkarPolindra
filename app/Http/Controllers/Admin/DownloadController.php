<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Download;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DownloadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $download = Download::all();
        return view('admin.download.index', compact('download'));
    }

    public function download()
    {
        // $data = download::latest()->paginate(5);
        // $data = Download::orderBy('id', 'desc')->paginate(100);
        $download = Download::all();
        return view('download.index', compact('download'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     return view('admin.download.create');
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
            'gambar' => 'required',
        ]);
        $data = $request->all();
        $data['gambar'] = $request->file('gambar')->store('download');
        

        download::create($data);


        return redirect()->route('admin.download.index')->with(['success' => 'Data Berhasil Disimpan']);
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
        $download = Download::find($id);
        // $keterangan = Keterangan::all();

        return view('admin.download.edit', [
            'download' => $download,
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
            $download = Download::find($id);
            $download->update([
                'kategori_id' => $request->kategori_id,
                'judul' => $request->judul,
                'keterangan' => $request->keterangan,
            ]);
            return redirect()->route('admin.download.index')->with(['success' => 'Data Berhasil Diedit']);
            
        }else {
            $download = Download::find($id);
            Storage::delete($download->gambar);
            $download->update([
                'kategori_id' => $request->kategori_id,
                'judul' => $request->judul,
                'keterangan' => $request->keterangan,
                'gambar' => $request->file('gambar')->store('download'),
            ]);
            return redirect()->route('admin.download.index')->with(['success' => 'Data Berhasil Diedit']);
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
        $download = Download::find($id);

        Storage::delete($download->gambar);
        
        $download->delete();

        return redirect()->route('admin.download.index')->with(['success' => 'Data Berhasil Dihapus']);
    }

}
