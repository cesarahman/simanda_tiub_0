<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'PageController@login');

//Khusus SuperDuperAdmin
Route::group(['middleware'=>['auth', 'checkRole:1']], function(){
    //Data Pengguna
    Route::get('/datapengguna', 'Pengguna\PenggunaController@index');
    Route::get('/load/table-pengguna','Pengguna\PenggunaController@LoadTablePengguna');
    Route::get('/load/data-pengguna','Pengguna\PenggunaController@LoadDataPengguna');
    Route::get('/hapus-pengguna/{id}','Pengguna\PenggunaController@destroy');
    Route::post('/tambah-pengguna','Pengguna\PenggunaController@store');
    Route::get('/datapengguna/export','Pengguna\PenggunaController@export');

    Route::get('/editprofile', 'PengaturanAkun\ProfileController@EditProfile');
    Route::post('/editprofile/{id}', 'PengaturanAkun\ProfileController@updateProfile');

    Route::get('/editpassword', 'PengaturanAkun\ProfileController@EditPassword');
    Route::post('/editpassword/{id}', 'PengaturanAkun\ProfileController@updatePassword');

    //History
    Route::get('/history','HistoryController@index');
    Route::get('/load/table-history','HistoryController@LoadTableHistory');
    Route::get('/load/data-history','HistoryController@LoadDataHistory');
    Route::get('/today-history-alert','HistoryController@TodayHistory');
    Route::get('/history-clicked/{id}','HistoryController@HistoryClicked');
    Route::get('/count-today-history-alert','HistoryController@CountTodayHistory');
    Route::get('/history/export-excel','HistoryController@export_excel');
    Route::get('/history/export-pdf','HistoryController@export_pdf');

});

Route::group(['middleware'=>['auth', 'checkRole: 2']], function(){
    //Data Pengguna
    Route::get('/datapengguna', 'Pengguna\PenggunaController@index');
    Route::get('/load/table-pengguna','Pengguna\PenggunaController@LoadTablePengguna');
    Route::get('/load/data-pengguna','Pengguna\PenggunaController@LoadDataPengguna');
    Route::get('/hapus-pengguna/{id}','Pengguna\PenggunaController@destroy');
    Route::post('/tambah-pengguna','Pengguna\PenggunaController@store');
    Route::get('/datapengguna/export','Pengguna\PenggunaController@export');
});


Route::group(['middleware'=>['auth', 'checkRole: 2,3']], function(){

    //edit profile
    Route::get('/editprofile', 'PengaturanAkun\ProfileController@EditProfile');
    Route::post('/editprofile/{id}', 'PengaturanAkun\ProfileController@updateProfile');

    //edit password
    Route::get('/editpassword', 'PengaturanAkun\ProfileController@EditPassword');
    Route::post('/editpassword/{id}', 'PengaturanAkun\ProfileController@updatePassword');

    //logout
    Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

    //cek role
    Route::get('/cek-role', 'PageController@CekRole')->name('cekRole');

    //Data Barang Rumah Tangga
    Route::get('/barangRumahTangga', 'bidang1\BarangRumahTanggaController@index');
    Route::get('/load/table-barangRumahTangga', 'bidang1\BarangRumahTanggaController@loadTable');
    Route::get('/load/data-barangRumahTangga', 'bidang1\BarangRumahTanggaController@loadData');
    Route::post('/store-barangRumahTangga', 'bidang1\BarangRumahTanggaController@store')->name('storeBarang');
    Route::get('/edit-barangRumahTangga/{id}', 'bidang1\BarangRumahTanggaController@get')->name('getBarang');
    Route::post('/update-barangRumahTangga/{id}', 'bidang1\BarangRumahTanggaController@update')->name('updateBarang');
    Route::get('/destroy-barangRumahTangga/{id}', 'bidang1\BarangRumahTanggaController@destroy')->name('destroyBarang');
    Route::get('/export-barangRumahTangga/pdf', 'bidang1\BarangRumahTanggaController@export_pdf')->name('exportPDF');
    Route::get('/export-barangRumahTangga/excel', 'bidang1\BarangRumahTanggaController@export_excel')->name('exportExcel');

    Route::prefix('alatLatihan')->group(function () {
        Route::get('/', 'PageController@alatLatihan');
        Route::post('/', 'bidang1\AlatLatihanController@store');
        Route::get('tempat-simpan', 'bidang1\AlatLatihanController@getTempat');
        Route::get('data', 'bidang1\AlatLatihanController@index');
        Route::get('dataTable', 'bidang1\AlatLatihanController@loadTable');
        Route::get('edit/{id}', 'bidang1\AlatLatihanController@edit');
        Route::get('show/{id}', 'bidang1\AlatLatihanController@show');
        Route::get('delete/{id}', 'bidang1\AlatLatihanController@destroy');
        Route::post('update/{id}', 'bidang1\AlatLatihanController@update');
        Route::get('/show/{id}',  'bidang1\AlatLatihanController@show');
        Route::get('/export/excel',  'bidang1\AlatLatihanController@export_excel');
        Route::get('/export/pdf',  'bidang1\AlatLatihanController@export_pdf');
    });

    Route::prefix('prestasi')->group(function () {
        Route::get('/', 'PageController@prestasi');
        Route::post('/store', 'bidang2\PrestasiController@store');
        Route::get('data', 'bidang2\PrestasiController@index');
        Route::get('dataTable', 'bidang2\PrestasiController@loadTable');
        Route::get('edit/{id}', 'bidang2\PrestasiController@edit');
        Route::get('show/{id}', 'bidang2\PrestasiController@show');
        Route::get('delete/{id}', 'bidang2\PrestasiController@destroy');
        Route::post('update/{id}', 'bidang2\PrestasiController@update');
        Route::get('/show/{id}',  'bidang2\PrestasiController@show');
        Route::get('/export/excel',  'bidang2\PrestasiController@export_excel');
        Route::get('/export/pdf',  'bidang2\PrestasiController@export_pdf');
    });

    Route::prefix('anggota')->group(function (){
        Route::get('/', 'bidang3\AnggotaController@index');
        Route::post('/', 'bidang3\AnggotaController@store');
        Route::get('data', 'bidang3\AnggotaController@loadData');
        Route::get('agama', 'bidang3\AnggotaController@getAgama');
        Route::get('fakultas', 'bidang3\AnggotaController@getFakultas');
        Route::get('dataTable', 'bidang3\AnggotaController@loadTable');
        Route::get('edit/{id}', 'bidang3\AnggotaController@edit');
        Route::get('show/{id}', 'bidang3\AnggotaController@show');
        Route::get('delete/{id}', 'bidang3\AnggotaController@destroy');
        Route::post('update/{id}', 'bidang3\AnggotaController@update');
        Route::get('/show/{id}',  'bidang3\AnggotaController@show');
        Route::get('/export/excel',  'bidang3\AnggotaController@export_excel');
        Route::get('/export/pdf',  'bidang3\AnggotaController@export_pdf');
    });

});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
