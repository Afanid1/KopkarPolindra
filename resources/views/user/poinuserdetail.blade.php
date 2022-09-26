@extends('layout.master_user')
@section('title')
Detail Data Transaksi
@endsection
@section('css')
<link rel="stylesheet" href="{{asset('dist/css/print.css')}}" type="text/css" media="print">
<style>
    .btn-secondary {
        color: #fff;
        background-color: #0062cc;
        border-color: #0062cc;
        box-shadow: none;
        margin: 2px;
        margin-bottom: 15px;
        margin-top: -5px;
    }

    .btn-secondary:hover {
        color: #fff;
        background-color: #0270e8;
        border-color: #0270e8;
    }

    .btn-secondary:focus,
    .btn-secondary.focus {
        color: #fff;
        background-color: #0270e8;
        border-color: #0270e8;
        box-shadow: 0 0 0 0 rgba(130, 138, 145, 0.5);
    }

    .btn-secondary.disabled,
    .btn-secondary:disabled {
        color: #fff;
        background-color: #0270e8;
        border-color: #0270e8;
    }
</style>
@endsection
@section('content')
<?php

?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Detail Data Transaksi</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url('user/poin-user')}}">Poin</a></li>
                        <li class="breadcrumb-item active">Data Transaksi</li>
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
                    <h3 class="card-title">Detail belanja</h3>

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
                    <table class="mb-3">
                        <tr>
                            <th>No Transaksi</th>
                            <th>:</th>
                            <th>{{@$detail_trk->id_transaksi}}</th>
                        </tr>
                        <tr>
                            <th>Jumlah Poin</th>
                            <th>:</th>
                            <th>{{@$detail_trk->jumlah_poin}}</th>
                        </tr>
                        <tr>
                            <th>Custumer partner</th>
                            <th>:</th>
                            <th>{{@$detail_trk->id_user}}</th>
                        </tr>
                        <tr>
                            <th>Tanggal Transaksi</th>
                            <th>:</th>
                            <th>{{@$detail_trk->tanggal_poin}}</th>
                        </tr>
                    </table>
                    <button class="btn btn-secondary print" onclick="window.print();return false;">Cetak</button>
                    <div style="overflow-x:auto;">

                    <table class="table centerW">
                        <tr>
                            <th>Nama Barang</th>
                            <th>Jumlah Barang</th>
                            <th>Harga</th>
                            <th>Sub Total</th>
                        </tr>
                        @php
                        $total=0;
                        @endphp
                        @foreach(@$detail_trk->atribut as $detail)
                        <tr>
                            <td>{{@$detail['nm_barang']}}</td>
                            <td>{{@$detail['qty']}}</td>
                            <td>{{@$detail['harga']}}</td>
                            <td>{{@$detail['sub_total']}}</td>
                        </tr>
                        @php
                        $total +=@$detail['sub_total'];
                        @endphp
                        @endforeach
                        <tr>
                            <th colspan="3">Total Bayar</th>
                            <th>{{$total}}</th>
                        </tr>
                    </table>
                </div>
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