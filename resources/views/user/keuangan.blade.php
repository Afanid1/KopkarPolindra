@extends('layout.master_user')
@section('title')
Keuangan Anggota
@endsection
@section('css')
<link rel="stylesheet" href="{{asset('dist/css/print.css')}}" type="text/css" media="print">
<style>
   
</style>
@endsection
@section('content')
<!-- user 12345678 -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Keuangan Anggota</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Keuangan Anggota</li>
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
                    <h3 class="card-title">Total Keuangan</h3>
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

                    <button class="btn btn-primary print" onclick="window.print();return false;">Cetak</button>
                    <div style="overflow-x:auto;">

                        <table class="table center table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Total Simpan Pokok</th>
                                    <th>Total Simpan Wajib</th>
                                    <th>Total Simpan Sukarela</th>
                                    <th>Total Keseluruhan</th>
                                </tr>
                            </thead>
                            @php
                            $i=1;
                            @endphp

                            <tr>
                                <td>{{$i}}</td>
                                <td>{{$main_payments}}</td>
                                <td>{{$monthly_payments}}</td>
                                <td>{{$other_payments}}</td>
                                <td>{{$wallets}}</td>
                            </tr>
                            @php
                            $i++;
                            @endphp

                        </table>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

<!-- /.content-wrapper -->
@endsection

@section('script')
<script>
    $(document).ready(function() {

    })
</script>
@endsection