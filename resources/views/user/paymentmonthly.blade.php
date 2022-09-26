@extends('layout.master_user')
@section('title')
Pembayaran Wajib
@endsection
@section('css')
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
                    <h1 class="m-0">Data Pembayaran Wajib</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Data Pembayaran Wajib</li>
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
                    <h3 class="card-title">Data Pembayaran</h3>

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
                    <h3 class="pb-3 text-bold">Total : {{$ttl}}</h3>
                    <table class="table center table-bordered table-striped">
                        <thead>
                            <tr>
                                <!-- <th>No.</th> -->
                                <th class="text-center">Bulan Ke</th>
                                <th class="text-center">Tanggal</th>
                                <th class="text-center">Nominal</th>
                                <th class="text-center">Tahun Pembayaran</th>
                            </tr>
                        </thead>
                        @php
                        $i=1;
                        @endphp
                        @foreach(@$main_peyment as $keu)
                        <tr>
                            <!-- <td class="pl-3">{{$i}}</td> -->
                            <td class="text-center">{{@$keu->payment_month}}</td>
                            <td class="text-center">{{@$keu->paid_at}}</td>
                            <td class="text-center">{{@$keu->amount}}</td>
                            <td class="text-center">{{@$keu->payment_year}}</td>
                        </tr>
                        @php
                        $i++;
                        @endphp
                        @endforeach
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