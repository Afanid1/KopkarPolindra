@extends('layout.master')

@section('title')
Manage Struktur
@endsection

@section('css')


@section('css')
<!-- DataTables -->
<link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css">
<link rel="stylesheet" href="{{asset('dist/css/print.css')}}" type="text/css" media="print">

@endsection
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Content Analysis</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard v1</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                <h3 class="card-title">Edit Produk {{$struktur->judul}}</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>

				<div class="card-body">
                <form method="post" action="{{ route('admin.struktur.update', $struktur->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                        <div class="form-group">
                            <label for="judul">Judul</label>
                            <input type="text" name="judul" class="form-control" id="text" 
                            value="{{ $struktur->judul }}">
                        </div>
                    <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <textarea name="keterangan" id="editor1" class="form-control">{{ $struktur->keterangan }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="gambar">Gambar Saat Ini</label><br>
                        <img src=" {{ asset('uploads/' . $struktur->gambar) }} " width="300">
                        <br>
                        <label for="gambar" class="mt-3">Pilih Gambar</label>
                        <input type="file" name="gambar" class="form-control">
                    </div>
                    
                    <div class="form-group">
<!--                         
                    <div class="row">
                        <div class="col-md-1">
                        </div>
                        <div class="col-md-9"></div>
                        <div class="col-md-2">
                        
                        </div> -->
                        <div style="text-align: right;">
                        <a href="{{ route('admin.struktur.index') }}" class="btn btn-warning btn-sd ml-auto">Kembali</a>
                            <!-- <button class="btn btn-primary btn-md" type="reset">Reset</button> -->
                            <button class="btn btn-success btn-md" type="submit">Simpan</button>
                    </div>
                    </div>
                    </div>
                </form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection