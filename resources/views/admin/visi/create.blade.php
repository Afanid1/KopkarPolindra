@extends('layout.master')

@section('title')
Manage Visi
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
                    <h3 class="card-title">Form Visi Event</h3>
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
                <form method="post" action="{{ route('admin.visi.store')}}" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                            <label for="judul">Nama Visi dan Misi</label>
                            <input type="text" name="judul" class="form-control" id="text" placeholder="Enter NamaS">
                        </div>

                    <div class="form-group">
                        <label for="keterangan">Visi Kopkar</label>
                        <textarea name="keterangan" class="form-control"> </textarea>
                    </div>
                    <div class="form-group">
                        <label for="keterangan2">Misi Kopkar</label>
                        <textarea name="keterangan2" class="form-control"> </textarea>
                    </div>

                    <div class="form-group">
                        <label for="gambar">Gambar</label>
                        <input type="file" name="gambar" class="form-control">
                    </div>

                    <div class="form-group">
                        <div style="text-align: right;">
                        <a href="{{ route('admin.contac.index') }}" class="btn btn-warning btn-sd ml-auto">Kembali</a>
                            <!-- <button class="btn btn-primary btn-md" type="reset">Reset</button> -->
                            <button class="btn btn-success btn-md" type="submit">Simpan</button>
                    </div>
<!-- 
                    <div class="form-group">
                        <button class="btn btn-primary btn-sm" type="submit">Save</button>
                        <button class="btn btn-primary btn-sm" type="reset">Reset</button>
                    </div> -->
                </form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection