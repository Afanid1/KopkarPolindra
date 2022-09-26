@extends('layout.master')

@section('title')
Poin Transaksi
@endsection

@section('css')
<!-- DataTables -->
<link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css">
<link rel="stylesheet" href="{{asset('dist/css/print.css')}}" type="text/css" media="print">

<link rel="stylesheet" href="{{asset('plugins/select2/css/select2.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">


<style>
    .dt-buttons {
        padding-bottom: 20px;
    }
    .input-group{
        width: 80%;
        left: 65px;
    }
    .input-group-addon {
        padding: .5rem .75rem;
        margin-bottom: 0;
        font-size: 1rem;
        font-weight: 400;
        line-height: 1.25;
        color: #495057;
        text-align: center;
        background-color: #e9ecef;
        border: 1px solid rgba(0, 0, 0, .15);
        border-radius: .25rem;
    }

    .container.mt-50 {
        padding-top: 50px;
    }
    i.fa.fa-gift {
        color: ghostwhite;
    }
    .listdesc{
      padding: 0 0 10px 20px;
      color: #686868;
      font-size: 15px;
      font-style: italic;
  }
  .listdesc li {
      list-style-type: none;
  }
  .btn-reward-reset {
      display: block ruby !important;
  }
</style>
@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Manage Poin</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Manage Poin</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.content -->
    </div><!-- /.content -->

    <!-- /.content-header -->
    <div class="container-fluid">
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Daftar Poin</h3>
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
                    <div class="row mb-2">
                        <div class="col-md-8">
                            <a class="btn btn-success" href="/cetak-poin"><i class="fa fa-file-excel" aria-hidden="true"></i> Excell</a>
                            <button class="btn btn-warning print text-white" onclick="window.print();return false;"><i class="fas fa-print text-white" aria-hidden="true"></i> Print</button>
                        </div>
                        <div class="col-md-4">
                            <div class="btn-reward-reset text-right mb-1">
                               <a class="btn btn-primary text-white" id="showModalPoinNominal"><i class="fa fa-cog" aria-hidden="true"></i>
                               Nominal Poin</a>
                               <a class="btn btn-danger text-white" id="ResetPoin">
                                 <i class="fas fa-sync"></i>
                             Reset Poin</a>
                         </div>  
                         <form id="caripoin">
                            <div class="input-group">
                                <input type="text" name="cari" class="form-control" placeholder="Cari poin">
                                <span class="input-group-append">
                                    <button type="submit" class="btn btn-primary btn-sm">Cari</button>
                                </span>
                            </div>
                        </form>


                    </div>
                </div>
                <div style="overflow-x:auto;">
                    <table class="table centerW table-bordered table table-striped">
                        <thead class="text-center">
                            <th>Kasir</th>
                            <th>Nama Anggota</th>
                            <th>Poin Total</th>
                            <!-- <th>tanggal_poin</th> -->
                            <th class="text-center drop">Aksi</th>
                        </thead>
                        <tbody id="listPoin">
                        </tbody>
                    </table>
                    <div id='page'></div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
</div>
<div id="statusModal" class="modal fade bs-example-modal-center" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title align-self-center mt-0">Gunakan Point</h5>
            </div>
            <div class="modal-body ">
                <div class="msg-Alert"></div>
                <div id="totalPoinmember" class="text-center"></div>
                    <label>*Note</label> 
                    <!-- <li>List nominal barang reward</li> -->
                        <div class="listdesc">
                            <li> "Poin <50 = Produk Rp. 20.000"</li>
                            <li> "Poin <100 = Produk Rp. 50.000"</li>
                            <li> "Poin <200 = Produk Rp. 100.000"</li>
                            <li> "Poin >201 = Produk Rp. 150.000"</li>
                            <li> "Poin >300 = Produk Rp. 200.000"</li>
                        </div>
                            <form id="simpaneditpoin" name="simpaneditpoin" >
                                <div class="form-group">
                                    <label>Gunakan Poin</label>
                                    <input type="text" name="penguranganpoin" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Pilihan Produk</label>
                                    <select class="select2" multiple="multiple" placeholder="Pilih Produk" style="width: 100%;">
                                    <option value="1">ABC Kecap Manis B.Gold 580</option>
                                    <option value="2">Aqua 600 ml</option>
                                    <option value="3">Aqua Gelas</option>
                                    <option value="4">Big cola</option>
                                    <option value="5">Biskuat energi</option>
                                    <option value="6">Buku Gambar</option>
                                    <option value="7">Bulpoin</option>
                                    <option value="8">chitato 15 g</option>
                                    <option value="9">Green tea hi 500 ml</option>
                                    <option value="10">Indocafe Cappucino 25 g </option>
                                    <option value="11">Indocafe Cofee Mix @ 100</option>
                                    <option value="12">TipeX</option>
                                    <option value="13">Pensil</option>
                                    </select>
                                    </div>
                                
                                <div class="form-group">
                                    <label>Deskripsi(Catatan)</label>
                                    <textarea name="deskripsi" class="form-control catatan" placeholder="Jenis Produk"> </textarea>
                                </div>
                                <div class="text-right">
                                    <button class="btn btn-primary btn-sm" type="sumbit">Gunakan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div id="DetailModal" class="modal fade bs-example-modal-center" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-md">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title align-self-center mt-0">Detail Transaksi</h5>
                        </div>
                        <div class="modal-body" id="listdetail">
                        </div>
                    </div>
                </div>
            </div>
            <div id="RiwayatModal" class="modal fade bs-example-modal-center" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-md">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title align-self-center mt-0">Riwayat Poin Yang digunakan</h5>
                        </div>
                        <div class="modal-body text-center">
                <div style="overflow-x:auto;">

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


         </div>

         <div id="ModalFormnominapoin" class="modal fade bs-example-modal-center" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title align-self-center mt-0">Setting Nominal Poin</h5>
                    </div>
                    <div class="modal-body" >
                        @php
                        $nomset=DB::table('tb_nominal_point')->first();
                        @endphp
                        <form id="simpansettingnominalpoin" name="simpansettingnominalpoin">
                            <div class="input-group">
                                <input type="text" name="nominal" value="{{@$nomset->nominal}}" class="form-control">
                                <span class="input-group-append">
                                    <button type="submit" class="btn btn-success">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.content-wrapper -->
            <script src="{{asset('plugins/select2/js/select2.full.min.js')}}"></script>
            <script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
            <script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
            <script src="{{asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
            <script src="{{asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
            <script src="{{asset('plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
            <script src="{{asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
            <script src="{{asset('plugins/jszip/jszip.min.js')}}"></script>
            <script src="{{asset('plugins/pdfmake/pdfmake.min.js')}}"></script>
            <script src="{{asset('plugins/pdfmake/vfs_fonts.js')}}"></script>
            <script src="{{asset('plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
            <script src="{{asset('plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
            <script src="{{asset('plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
            <script>
                $(document).ready(function() {

                    gettable();
                    insertPoinrealtime();

                    function insertPoinrealtime() {
            // const Form_hps_item  = new FormData();
            // Form_hps_item.append('_token', '{{csrf_token()}}');  
            var url_ = "{{url('point/get-poin-transaksi')}}";
            fetch(url_, {
                method: 'GET'
            }).then(res => res.json()).then(data => {
                if (!data.error) {
                    gettable();
                }
                setTimeout(function() {
                    //  insertPoinrealtime();
                }, 5500);

            });
        }
        $('body').delegate('#caripoin','submit',function(e)
        {
            e.preventDefault();
            window.cari=$('input[name="cari"]').val();
            gettable();
        });
        function gettable() {
            $('#listPoin').html('<tr><td  class="text-center" colspan="5">Loading...<td></tr>');
            var cari_='';
            if(window.cari!=undefined)
            {
                cari_=window.cari;
            }
           // var url_ = window.url_ == undefined ? '{{url('reward/get-table-point')}}': window.url_;
           var url_=window.url_==undefined?'{{url('reward/get-table-point')}}?cari='+cari_:window.url_+'&cari='+cari_;
           fetch(url_, {
            method: 'GET'
        }).then(res => res.json()).then(data => {
            var let_ = '';
            for (let key of data.db_get.data) {
                var cs = key.custmer_partner_name ? key.custmer_partner_name : '-';
                let_ += `<tr>
                <td>` + cs + `</td>  
                <td>` + key.id_user + `</td> 
                <td class="text-center">` + key.total + `</td>
                <!--<td class="text-center">` + key.status + `</td>-->
                <!--<td class="text-center">` + key.tanggal_poin + `</td>-->

                

                <td 
                data-id_poin="` + key.id_user + `"  data-total="` + key.total + `" class="text-center">
                <a href="#" class=" btn btn-success Riwayat"  data-id_user="`+key.id_user+`" title="Riwayat Poin"><i class="fa fa-history" aria-hidden="true"></i></a>
                <a href="#" class="btn btn-warning Editini"  data-id_user="`+key.id_user+`" title="Gunakan poin"><i class="fa fa-gift" aria-hidden="true"></i></a>
                <!-- <a href="#" class="btn btn-primary Detail" data-id_detail="`+key.id_poin+`" title="Detail"><i class="fa fa-info-circle" aria-hidden="true"></i></i></a>
                <a href="#" class="btn btn-danger HapusIni" data-id_hapus="`+key.id_poin+`" title="Hapus"><i class="fa fa-trash" aria-hidden="true"></i></a>-->
                </td>  
                </tr>`
            }
            var link_page = ``;
            for (let key_link of data.db_get.links) {
                var active_ = key_link.active ? 'active' : '';
                link_page += `<li class="page-item ` + active_ + `"><a class="page-link" href="#" data-url="` + key_link.url + `">` + key_link.label + `</a></li>`
            }
            if (let_ != '') {

                $('#listPoin').html(let_);
                $('#page').html(`<nav aria-label="Page navigation example">
                    <ul class="pagination">` + link_page + `</ul>
                    </nav>`);
            } else {
                $('#listPoin').html('<tr><td class="text-center" colspan="5">Data Kosong</td></tr>');
            }
        });
    }
    $('body').delegate('.pagination .page-link', 'click', function(e) {
        e.preventDefault();
        var url_ = $(this).data('url');
        window.url_ = undefined;
        if (url_ != null) {
            window.url_ = url_;
            gettable();
        }
    });




    $('body').delegate('.HapusIni', 'click', function(e) {
        e.preventDefault();
        if (!confirm('yakin untuk menghapus data ini?')) {
            return;
        }

        fetch("{{url('point/hapus-poin-transaksi')}}?id_poin=" + $(this).data('id_hapus'), {
            method: 'GET'
        }).then(res => res.json()).then(data => {
            gettable();

        });

    });

    $('body').delegate('.Detail', 'click', function(e) {
        e.preventDefault();
        window.id_detail = $(this).data('id_detail');
        $('#DetailModal').modal('show');

    });
    $('#DetailModal').on('shown.bs.modal', function(e) {
        e.preventDefault();
        $('#listdetail').empty();
        fetch("{{url('point/detail-belanja')}}?id_detail=" + window.id_detail, {
            method: 'GET'
        }).then(res => res.json()).then(data => {
            var list_detail = ``;
            var list_ttl = 0;

            for (let k of data.dt_poin.atribut) {
                list_detail += `<tr>
                <td>` + k.nm_barang + `</td>
                <td>` + k.harga + `</td>
                <td>` + k.qty + `</td> 
                <td>` + k.sub_total + `</td>
                </tr>`;
                list_ttl += k.sub_total;
            }
            $('#listdetail').html(`ID Transaksi:` + data.dt_poin.no_trax + `<br>Tanggal :` + data.dt_poin.tanggal_poin + `<table class="table"><tr>
                <td>Nama Barang</td>
                <td>Harga</td>
                <td>Qty</td> 
                <td>Sub Total</td>
                </tr>` + list_detail + `<tr><td colspan="3">Total</td><td>` + list_ttl + `</td></table>`);


        });


    });


    $('body').delegate('.Editini', 'click', function(e) {
        e.preventDefault();
        window.total_poin = undefined;
        window.id_user = $(this).data('id_user');
        $('#statusModal').modal('show');

    });
    $('#statusModal').on('shown.bs.modal', function(e) {
        e.preventDefault();
        $('#totalPoinmember').empty();

        fetch("{{url('point/total-poin')}}?id_user=" + window.id_user, {
            method: 'GET'
        }).then(res => res.json()).then(data => {
            window.total_poin = data.jumlah_poin;
            $('#totalPoinmember').html('<div class="alert alert-success " style="text-bold"><h2>Total Poin : ' + window.total_poin + '</h2></div>');
            $('input[name="penguranganpoin"]').val(data.jumlah_dipakai);

        });

    });

    $('body').delegate('#simpaneditpoin', 'submit', function(e) {
        e.preventDefault();
        var total_ = parseInt(window.total_poin) - parseInt($('input[name="penguranganpoin"]').val());
        if (total_ < 0) {
            alert('poin tidak mencukupi');
            return;
        }
        const simpaneditpoin = document.forms.namedItem('simpaneditpoin');
        const Form_hps_item = new FormData(simpaneditpoin);
        Form_hps_item.append('_token', '{{csrf_token()}}');
        Form_hps_item.append('id_user', window.id_user);
        fetch("{{url('point/edit-poin-transaksi')}}", {
            method: 'POST',
            body: Form_hps_item
        }).then(res => res.json()).then(data => {
            gettable();
            $('#statusModal').modal('hide');

        });

    });
    $('body').delegate('.Riwayat', 'click', function(e) {   

        e.preventDefault();
        window.id_user=$(this).data('id_user');

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
            if(list_!='')
            {

                $('#listHistory').html(list_);
            }
            else
            {
                $('#listHistory').html('<tr><td colspan="3">Data Kosong</td></tr>');

            }
        });
        
    });
    $('body').delegate('#showModalPoinNominal','click',function(e)
    {
        e.preventDefault();
        $('#ModalFormnominapoin').modal('show');


    });
    $('body').delegate('#simpansettingnominalpoin','submit',function(e)
    {

        e.preventDefault();



        const simpansettingnom = document.forms.namedItem('simpansettingnominalpoin');
        const fomrsmpnsnom = new FormData(simpansettingnom);
        fomrsmpnsnom.append('_token', '{{csrf_token()}}'); 
        fetch("{{url('reward/simpan-setting-nominal')}}", {
            method: 'POST',
            body: fomrsmpnsnom
        }).then(res => res.json()).then(data => {
            window.location.reload();

        });

    });
     //Initialize Select2 Elements
 $('.select2').select2({
      theme: 'bootstrap4'
    })

    $('.select2').on('change',function(){
    var data = $('.select2 option:selected')
                .toArray().map(item => item.text);
                data = data.toString();
        $('.catatan').html(data);
    })
    $('body').delegate('#ResetPoin','click',function(e)
    {

        e.preventDefault();

        if(!confirm('Apakah anda yakin untuk reset semua Poin?'))
        {
            return;
        }

        const fomrreset = new FormData();
        fomrreset.append('_token', '{{csrf_token()}}'); 
        fetch("{{url('reward/poin-reset')}}", {
            method: 'POST',
            body: fomrreset
        }).then(res => res.json()).then(data => {
            window.location.reload();

        });

    });
    

});
</script>
@endsection