@extends('layout.master')

@section('title')
Manage Galeri
@endsection

@section('css')
<style>
    .form-button-action{
        display: flex;
    }
</style>

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
                <h3 class="card-title">Data Galeri Event</h3>
                
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
                    @if(Session::has('success'))
                        <div class="alert alert-primary">
                            {{ Session('success') }}
                        </div>
                    @endif
                    <div class="btn-reward-reset mb-2">
                        <a href="{{ route('admin.galeri.create') }}" class="btn btn-primary btn-md ml-auto"><i class="fa fa-plus"></i> Tambah galeri</a>
					</div>
					<div class="table-responsive">
					<table class="table  table-bordered table-striped">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th>Judul</th>
                                <th>Keterangan</th>
                                <th class="text-center">Gambar</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($galeri as $row)
                            <tr>
                                <td>{{ $loop->iteration ?? '' }}</td>
                                <td>{{ $row->judul }}</td>
                                <td>{!! $row->keterangan !!}</td>
                                <td><img src=" {{ asset('uploads/' . $row->gambar) }} " width="130" style="border-radius: 5px;"></td>
                                <td>
                                    <div class="form-button-action">
                                        <div class="btn-reward-reset mb-2">
                                        <a href="{{ route('admin.galeri.edit', $row->id)}}"data-toggle="tooltip" class="btn-edit btn btn-md btn-outline-primary btn-icon mr-1" data-original-title="Edit galeri"><i class="fa fa-edit"></i></a>
                                    </div>
                                    <!-- <button type="button" href=""  title="Edit Data" class="btn btn-primary btn-md" data-original-title="Edit galeri Event"><i class="fa fa-edit"></i>
                                        </button> -->
                                        <form action="{{ route('admin.galeri.destroy', $row->id) }}" onclick="return confirm('Apakah anda yakin ingin menghapus data tersebut?')" method="post" class="d-inline">
                                            @csrf
                                            @method('delete')
                                            <button data-toggle="tooltip" title="Hapus data" class="btn-edit btn btn-md btn-outline-danger btn-icon" data-original-title="Hapus galeri">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                            
                                            </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center">Data Masih Kosong</td>
                            </tr>
                            @endforelse
                          
                        </tbody>
                    </table>

                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

@endsection