<?php
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=daftarpoin.xls");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
$dt_poin=DB::table('tb_poin_transaksi')
->select('id_user', DB::raw('sum(jumlah_poin) as total'))
->where('status','aktif')
->groupBy('id_user')->get();
?>
<table>
	<tr>
		<td>Nama Anggota</td>
		<td>Total Poin</td>

	</tr>
	@foreach($dt_poin as $key)
	@php
	$sisapoin=DB::table('tb_poin_dipakai')->where('id_user','like',@$key->id_user)->first();
	$sisapoin=$sisapoin?@$key->total-$sisapoin->poin:@$key->total;
	@endphp
	<tr>
		<td>{{@$key->id_user}}</td>
		<td>{{$sisapoin}}</td>

	</tr>
	@endforeach
</table>