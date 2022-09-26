<?php

namespace App\Exports;

use App\Models\PointTransactions;
use Illuminate\Contracts\View\View;
use App\Models\Reward;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class RewardView implements FromView
{
    public function view(): view
    {
        return view('admin.reward.index', [
            'transaktion' => PointTransactions::with('reward')->get()
        ]);
    }


    // /**
    // * @return \Illuminate\Support\Collection
    // */
    // public function collection()
    // {
    //     return Reward::all();
    // }
}
