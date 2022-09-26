@extends('layout.master_user') 
@section('title') 
Point User
@endsection 
@section('css') 
<link rel="stylesheet" href="{{asset('dist/css/print.css')}}" type="text/css" media="print">
<style>
   @media screen and (max-width: 375px) {
    .btn-info {
        margin-left: -28px;
     }
   .btn-success {
        margin-left: -28px;
  }
}
</style>
@endsection 
@section('content')
@php
$get_member=DB::table('users')->where('id',Auth::user()->id)->first();
$jmriwayat=DB::table('tb_riwayat_point')->where('id_user','like',@$get_member->member_id)->update(['status'=>'dibaca']);
@endphp
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Poin</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Data Poin</li>
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
                    <h3 class="card-title">Data Poin</h3>
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
                <div class="row">
                    <div class="col-9">
                    <table>
                        <tr><td id="jumlahpoin"></td></tr>
                        <tr><td id="digunakan"></td></tr>
                        <tr><td id="sisapoin"></td></tr>
                        </table> 
                    </div>     
                    <div class="col-3 mt-3">
                        <button href="#" class="btn btn-success" tittle="Riwayat Poin Anda" id="HistoryPoin"><i class="fa fa-history" aria-hidden="true"></i>  Riwayat Poin</button>
                        <button class="btn btn-info print" tittle="Cetak Print" onclick="window.print();return false;"><i class="fas fa-print text-white" aria-hidden="true"></i> Cetak</button>
                    </div>              
                </div>              
                    <div class="card-body">
                    <div style="overflow-x:auto;">
                        <table class="table table-striped table-bordered center">
                            <thead>
                                <tr class="text-center">
                                   
                                <th>Kode Transaksi</th>
                                    <th>Nama Member</th>
                                    <th>Tanggal</th>
                                    <th>Nominal</th>
                                    <th>Jml Poin</th> 
                                    <th class="drop">Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="listPoin">
                            </tbody>
                        </table>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<div id="RiwayatModal" class="modal fade bs-example-modal-center" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title align-self-center mt-0">Riwayat Poin Yang digunakan</h5>
            </div>
            <div class="modal-body text-center">
               <table class="table">
                   <thead>
                       <tr>
                           <td>Tanggal</td>
                           <td>Poin digunakan</td>
                           <td>Deskripsi</td> 
                       </tr>
                   </thead>
                   <tbody id="listHistory"></tbody>
               </table>
            </div>
        </div>
    </div>
</div>
<!-- /.content-wrapper -->
@endsection

@section('script')
<script>
    $(document).ready(function () {
        gettable();
        function gettable() {
            fetch("{{url('user/get-table-poin')}}", {
                method: 'GET'
            }).then(res => res.json()).then(data => {
                var let_='';
                for (let key of data.getpoin.data) {
                    let_ += `<tr class="text-center">
                   
                    <td>` + key.id_transaksi + `</td>
                    <td>` + key.id_user + `</td>
                    <td>` + key.tanggal_poin + `</td>
                    <td>` + key.nominal + `</td>
                    <td>` + key.jumlah_poin + `</td> 
                    <td data-id_poin="` + key.id_poin + `" 
                    ><d class="btn btn-warning Detail">Detail</a></td>
                    </tr>`;
                    window.id_user=key.id_user;
                    
                }
                $('#jumlahpoin').html('Total poin: '+data.jumlah_poin);
                $('#digunakan').html('Poin Digunakan: '+data.digunakan);
                var sisa_poin=parseInt(data.jumlah_poin)-parseInt(data.digunakan);
                $('#sisapoin').html('Sisa Poin :'+sisa_poin);
                $('#listPoin').html(let_);
            });
        }
        $('body').delegate('.Detail','click',function(e)
        {
            e.preventDefault();
            window.location.href="{{url('user/get-table-poin')}}/"+$(this).closest('td').data('id_poin');
        });
         $('body').delegate('#HistoryPoin', 'click', function(e) {   
            e.preventDefault(); 
            $('#RiwayatModal').modal('show');
        });
     $('#RiwayatModal').on('shown.bs.modal', function (e) 
        {
            e.preventDefault(); 
                $('#listHistory').empty();
            fetch("{{url('hitsori-poin')}}?id_user=" + window.id_user, {
                method: 'GET'
            }).then(res => res.json()).then(data => { 
                var list_='';
                for(let ri of data.riwayat)
                {
                    list_+=`<tr>
                                <td>`+ri.created_at+`</td>
                                <td>`+ri.poin+`</td>
                                <td>`+ri.deskripsi+`</td>
                                </tr>`;
                 
                }
                $('#listHistory').html(list_);
            });
                
        });
    })
</script>
@endsection