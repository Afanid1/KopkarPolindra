<?php

use App\Http\Controllers\Admin\MainPaymentController;
use App\Http\Controllers\Admin\MasterDataController;
use App\Http\Controllers\Admin\MonthlyPaymentController;
use App\Http\Controllers\Admin\OtherPaymentController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\PointController;
use App\Http\Controllers\Admin\PointRewardController;
use App\Http\Controllers\Admin\WalletController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\User\AnggotaController;
use App\Http\Controllers\Admin\BeritaController;
use App\Http\Controllers\Admin\GaleriController;
use App\Http\Controllers\Admin\SejarahController;
use App\Http\Controllers\Admin\StrukturController;
use App\Http\Controllers\Admin\VisiController;
use App\Http\Controllers\Admin\DownloadController;
use App\Http\Controllers\Admin\ContacController;
use App\Http\Controllers\PointTransactionsController;
use App\Http\Controllers\AppController;


use Illuminate\Support\Facades\Auth;
Route::get('/', [AppController::class, 'index']);
Route::get('/features', [AppController::class, 'features']);
Route::get('/contac', [AppController::class, 'contac']);
Route::get('/galeri', [AppController::class, 'galeri']);
Route::get('/berita', [AppController::class, 'berita']);
Route::get('/singlepost', [AppController::class, 'singlepost']);

// Route::get('/', function () {
//     return redirect()->route('login.index');
// });

Route::get('/login', [AuthController::class, 'login'])->name('login.index');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/login-member', [DashboardController::class, 'loginmember']);
Route::get('hitsori-poin', [PointController::class, 'hitsoripoin']);


Route::get('/cetak-poin', [PointRewardController::class, 'cetak']);

Route::get('/check', function () {
    if (Auth::user()->roles->name == 'user') {
        return redirect()->route('user.dashboard');
    }

    if (Auth::user()->roles->name == 'admin') {
        return redirect()->route('admin.dashboard');
    }
})->middleware('role:user,admin');

// sample route with company and user role
Route::get('/check-multi', function () {
    filterMenu();
})->middleware('role:user');

Route::get('/point-transaksi/export', [PointTransactionsController::class, 'pointExport']);

Route::group(['as' => 'admin.', 'middleware' => 'role:admin'], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::group(['prefix' => 'meta', 'as' => 'meta.'], function () {
        Route::get('/', [MasterDataController::class, 'index'])->name('index');
        Route::get('/datatables', [MasterDataController::class, 'datatables'])->name('ajax.data');
        Route::get('/show/{id?}', [MasterDataController::class, 'show'])->name('show');
        Route::post('/store', [MasterDataController::class, 'store'])->name('store');
        Route::post('/destroy/{id?}', [MasterDataController::class, 'destroy'])->name('destroy');
    });

    Route::group(['prefix' => 'user', 'as' => 'user.'], function () {
        Route::get('/manage-user', [UserController::class, 'index'])->name('index');
        Route::get('/datatables', [UserController::class, 'datatables'])->name('ajax');
        Route::get('/show/{id?}', [UserController::class, 'show'])->name('show');
        Route::post('/store', [UserController::class, 'store'])->name('store');
        Route::post('/destroy/{id?}', [UserController::class, 'destroy'])->name('destroy');

        Route::group(['prefix' => 'wallet', 'as' => 'wallet.'], function () {
            Route::get('/', [WalletController::class, 'index'])->name('index');
            Route::get('/datatables', [WalletController::class, 'datatables'])->name('ajax');
            Route::get('/show/{id?}', [WalletController::class, 'show'])->name('show');
        });
    });

    Route::group(['prefix' => 'berita', 'as' => 'berita.'], function () {
        Route::get('manage-berita', [BeritaController::class, 'index'])->name('index');
        Route::get('berita-create', [BeritaController::class, 'create'])->name('create');
        Route::post('/store', [BeritaController::class, 'store'])->name('store');
        Route::get('/berita-edit/{id}', [BeritaController::class, 'edit'])->name('edit');
        Route::put('/update/{id}', [BeritaController::class, 'update'])->name('update');
        Route::delete('/destroy/{id?}', [BeritaController::class, 'destroy'])->name('destroy');

    });
    Route::group(['prefix' => 'contac', 'as' => 'contac.'], function () {
        Route::get('manage-contac', [ContacController::class, 'index'])->name('index');
        Route::get('contac-create', [ContacController::class, 'create'])->name('create');
        Route::post('/store', [ContacController::class, 'store'])->name('store');
        Route::get('/contac-edit/{id}', [ContacController::class, 'edit'])->name('edit');
        Route::put('/update/{id}', [ContacController::class, 'update'])->name('update');
        Route::delete('/destroy/{id?}', [ContacController::class, 'destroy'])->name('destroy');

    });
    Route::group(['prefix' => 'download', 'as' => 'download.'], function () {
        Route::get('manage-download', [DownloadController::class, 'index'])->name('index');
        Route::get('download-create', [DownloadController::class, 'create'])->name('create');
        Route::post('/store', [DownloadController::class, 'store'])->name('store');
        Route::get('/download-edit/{id}', [DownloadController::class, 'edit'])->name('edit');
        Route::put('/update/{id}', [DownloadController::class, 'update'])->name('update');
        Route::delete('/destroy/{id?}', [DownloadController::class, 'destroy'])->name('destroy');

    });
    Route::group(['prefix' => 'visi', 'as' => 'visi.'], function () {
        Route::get('manage-visi', [VisiController::class, 'index'])->name('index');
        Route::get('visi-create', [VisiController::class, 'create'])->name('create');
        Route::post('/store', [VisiController::class, 'store'])->name('store');
        Route::get('/contac-edit/{id}', [VisiController::class, 'edit'])->name('edit');
        Route::put('/update/{id}', [VisiController::class, 'update'])->name('update');
        Route::delete('/destroy/{id?}', [VisiController::class, 'destroy'])->name('destroy');

    });
    Route::group(['prefix' => 'sejarah', 'as' => 'sejarah.'], function () {
        Route::get('manage-sejarah', [SejarahController::class, 'index'])->name('index');
        Route::get('sejarah-create', [SejarahController::class, 'create'])->name('create');
        Route::post('/store', [SejarahController::class, 'store'])->name('store');
        Route::get('/sejarah-edit/{id}', [SejarahController::class, 'edit'])->name('edit');
        Route::put('/update/{id}', [SejarahController::class, 'update'])->name('update');
        Route::delete('/destroy/{id?}', [SejarahController::class, 'destroy'])->name('destroy');

    });
    Route::group(['prefix' => 'struktur', 'as' => 'struktur.'], function () {
        Route::get('manage-struktur', [StrukturController::class, 'index'])->name('index');
        Route::get('struktur-create', [StrukturController::class, 'create'])->name('create');
        Route::post('/store', [StrukturController::class, 'store'])->name('store');
        Route::get('/struktur-edit/{id}', [StrukturController::class, 'edit'])->name('edit');
        Route::put('/update/{id}', [StrukturController::class, 'update'])->name('update');
        Route::delete('/destroy/{id?}', [StrukturController::class, 'destroy'])->name('destroy');

    });
    Route::group(['prefix' => 'galeri', 'as' => 'galeri.'], function () {
        Route::get('manage-galeri', [GaleriController::class, 'index'])->name('index');
        Route::get('galeri-create', [GaleriController::class, 'create'])->name('create');
        Route::post('/store', [GaleriController::class, 'store'])->name('store');
        Route::get('/galeri-edit/{id}', [GaleriController::class, 'edit'])->name('edit');
        Route::put('/update/{id}', [GaleriController::class, 'update'])->name('update');
        Route::delete('/destroy/{id?}', [GaleriController::class, 'destroy'])->name('destroy');

    });

    Route::group(['prefix' => 'point', 'as' => 'point.'], function () {
        Route::get('/manage-user', [PointController::class, 'index'])->name('index');
        Route::get('get-poin-transaksi', [PointController::class, 'getpointransaksi']);
        Route::get('datapoin', [PointController::class, 'datapoin']);
        Route::get('get-table-poin', [PointController::class, 'gettablepoin']);
        Route::post('edit-poin-transaksi', [PointController::class, 'editpointransaksi']);
        Route::get('hapus-poin-transaksi', [PointController::class, 'hapuspointransaksi']);
        Route::get('detail-belanja', [PointController::class, 'pointdetailbelanja']);
        Route::get('total-poin', [PointController::class, 'gettotalpoin']);



        Route::group(['prefix' => 'wallet', 'as' => 'wallet.'], function () {
            Route::get('/', [WalletController::class, 'index'])->name('index');
            Route::get('/datatables', [WalletController::class, 'datatables'])->name('ajax');
            Route::get('/show/{id?}', [WalletController::class, 'show'])->name('show');
        });
    });
    Route::group(['prefix' => 'reward', 'as' => 'reward.'], function () {
        Route::get('/manage-poin', [PointRewardController::class, 'index'])->name('index');
        Route::get('get-poin-transaksi', [PointRewardController::class, 'getpointransaksi']);
        Route::get('datapoin', [PointRewardController::class, 'datapoin']);
        Route::get('get-table-point', [PointRewardController::class, 'gettablepoint']);
        Route::post('edit-poin-transaksi', [PointRewardController::class, 'editpointransaksi']);
        Route::get('hapus-poin-transaksi', [PointRewardController::class, 'hapuspointransaksi']);
        Route::get('detail-belanja', [PointRewardController::class, 'pointdetailbelanja']);
        Route::get('total-poin', [PointRewardController::class, 'gettotalpoin']);
        Route::post('simpan-setting-nominal', [PointRewardController::class, 'simpansettingnominal']);
        Route::post('poin-reset', [PointRewardController::class, 'poinreset']);
        



        Route::group(['prefix' => 'wallet', 'as' => 'wallet.'], function () {
            Route::get('/', [WalletController::class, 'index'])->name('index');
            Route::get('/datatables', [WalletController::class, 'datatables'])->name('ajax');
            Route::get('/show/{id?}', [WalletController::class, 'show'])->name('show');
        });
    });
    Route::group(['prefix' => 'payment', 'as' => 'payment.'], function () {
        Route::group(['prefix' => 'main', 'as' => 'main.'], function () {
            Route::get('/', [MainPaymentController::class, 'index'])->name('index');
            Route::get('/datatables', [MainPaymentController::class, 'datatables'])->name('ajax');
            Route::get('/show/{id?}', [MainPaymentController::class, 'show'])->name('show');
            Route::post('/store', [MainPaymentController::class, 'store'])->name('store');
            Route::post('/destroy/{id?}', [MainPaymentController::class, 'destroy'])->name('destroy');
        });

        Route::group(['prefix' => 'monthly', 'as' => 'monthly.'], function () {
            Route::get('/', [MonthlyPaymentController::class, 'index'])->name('index');
            Route::get('/datatables', [MonthlyPaymentController::class, 'datatables'])->name('ajax');
            Route::get('/show/{id?}', [MonthlyPaymentController::class, 'show'])->name('show');
            Route::post('/store', [MonthlyPaymentController::class, 'store'])->name('store');
            Route::post('/destroy/{id?}', [MonthlyPaymentController::class, 'destroy'])->name('destroy');
        });

        Route::group(['prefix' => 'other', 'as' => 'other.'], function () {
            Route::get('/', [OtherPaymentController::class, 'index'])->name('index');
            Route::get('/datatables', [OtherPaymentController::class, 'datatables'])->name('ajax');
            Route::get('/show/{id?}', [OtherPaymentController::class, 'show'])->name('show');
            Route::post('/store', [OtherPaymentController::class, 'store'])->name('store');
            Route::post('/destroy/{id?}', [OtherPaymentController::class, 'destroy'])->name('destroy');
        });
    });
});
Route::group(['prefix' => 'user', 'as' => 'user.', 'middleware' => 'role:user'], function () {
    Route::get('/dashboard', [AnggotaController::class, 'dashboard'])->name('dashboard');
    Route::get('/poin-user', [AnggotaController::class, 'poinuser'])->name('poinuser');
    Route::get('/get-table-poin', [AnggotaController::class, 'gettablepoin']);
    Route::get('/get-table-poin/{id_poin}', [AnggotaController::class, 'gettablepoindetail']);

    Route::get('/payment/list', [AnggotaController::class, 'payment'])->name('payment.main.index');
    Route::get('/payment/monthly/list', [AnggotaController::class, 'paymentmonthly'])->name('payment.monthly.index');
    Route::get('/payment/other/list', [AnggotaController::class, 'paymentother'])->name('payment.other.index');

    Route::get('/keuangan-user', [AnggotaController::class, 'keuanganuser'])->name('keuangan');
});
