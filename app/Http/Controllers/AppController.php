<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;
use App\Models\Contac;
use App\Models\Galeri;
use App\Models\Sejarah;
use App\Models\Download;
use App\Models\Struktur;
use App\Models\Visi;

class AppController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Home',
        ];
        $berita = Berita::all();
        $galeri = Galeri::all();
        $visi = Visi::all();
        $sejarah = Sejarah::all();
        
        return view('templates/peyton/index', [
            'berita' => $berita,
            'galeri' => $galeri,
            'visi' => $visi,
            'sejarah' => $sejarah
        ]);
    }
    public function features()
    {
        $data = [
            'title' => 'Struktur',
        ];
        $struktur = Struktur::all();
        $visi = Visi::all();
        $download = Download::all();
        $sejarah = Sejarah::all();
        
        return view('templates/peyton/features', [
            'struktur' => $struktur,
            'visi' => $visi,
            'download' => $download,
            'sejarah' => $sejarah
        ]);
        
    }
    public function contac()
    {
        $data = [
            'title' => 'Contac',
        ];
        $contac = Contac::all();
        
        return view('templates/peyton/contac', [
            'contac' => $contac
        ]);
        
    }
    public function galeri()
    {
      
        $data = [
            'title' => 'Galeri',
        ];
        $galeri = Galeri::all();
        
        return view('templates/peyton/galeri', [
            'galeri' => $galeri
        ]);  
    }
    public function berita()
    {
      
        $data = [
            'title' => 'Berita',
        ];
        $berita = Berita::all();
        
        return view('templates/peyton/berita', [
            'berita' => $berita
        ]);  
    }
    public function singlepost()
    {
        return view('templates/peyton/single-post');
    }
}
