<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PointTransaksi;

class PointTransactionsController extends Controller
{
    public function pointExport()
    {
        // dd('da;')
        return Excel::download(new PointTransaksi, 'Point-transaksi.xlsx');
    }
}
