<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;

class AllRewardPointExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */ 
    public function collection()
    {
        return DB::table('tb_poin_transaksi')
            ->select('id_user', DB::raw('sum(jumlah_poin) as total'))
            ->groupBy('id_user')->get();
    }
}
