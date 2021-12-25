<?php

namespace App\Http\Controllers\bidang1;

use App\AlatLatihan;
use App\Exports\bidang1\AlatLatihanExport;
use App\Histori;
use App\Http\Controllers\Controller;
use App\TempatPenyimpanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use DataTables, PDF, File;


class AlatLatihanController extends Controller
{
    //Index
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //dropdown tempat penyimpanan
        $data = DB::table('alat_latihan as al')
        ->join('tempat_penyimpanan as tp', 'al.penyimpanan_id', '=', 'tp.id')
        ->select('al.*', 'tp.tempat_simpan')
        ->orderBy('id', 'asc')
        ->get();

        //add aksi
        return DataTables::of($data)
        ->addIndexColumn()
        ->addColumn('aksi', function($row){
            $btn = '<a href="javascript:void(0)" data-toggle="modal" data-id="'.$row->id.'" data-value="'.$row->kondisi.'" style="font-size: 18pt; text-decoration: none;" class="mr-3 btn-edit-alat" id="btn-edit-alat">
            <i class="fas fa-pen-square"></i>
            </a>';
            $btn = $btn. '<a href="javascript:void(0)" data-toggle="modal" data-id="'.$row->id.'" data-nama="'.$row->namaAlat.'"  style="font-size: 16pt; text-decoration: none; color:red;" class="mr-3 btn-delete-alat" id="btn-delete-alat">
            <i class="fas fa-trash"></i>
            </a>';
            $btn = $btn. '<a href="javascript:void(0)" data-toggle="modal" data-id="'.$row->id.'" data-nama="'.$row->namaAlat.'" data-value="'.$row->kondisi.'" style="font-size: 16pt; text-decoration: none; color:green;" class="mr-3 btn-show-alat" id="btn-show-alat">
            <i class="fas fa-eye"></i>
            </a>';
            return $btn;
        })
        ->rawColumns(['aksi', 'kondisi'])
        ->make(true);

        //Buka view
        return view('bidang1.AlatLatihan');
    }

    public function getTempat()
    {
        $data = TempatPenyimpanan::orderBy('id', 'asc')->get();
        return response()->json([
            'tp' => $data
        ]);
    }

    public function checkGambar($file)
    {
        $file = strtolower($file);
        $ex = array("png", "jpg", "jpeg", "svg");
        if (in_array($file, $ex)) {
            return true;
        }
        return false;
    }

    public function loadTable()
    {
        return view('datatable.TableAlatLatihan');
    }

    public function store(Request $request)
    {
        $namaAlat = $request->namaAlat;
        $ukuran = $request->ukuran;
        $kondisi = $request->kondisi;
        $jumlah = $request->jumlah;
        $tempatSimpan = $request->tempatSimpan;
        $harga = $request->harga;
        $keterangan = $request->keterangan;
        $gambar = $request->file('gambar');
        if($gambar != null){
            $fileEx = $gambar->getClientOriginalName();
            $fileArr = explode(".", $fileEx);
            $panjangArray = count($fileArr);
            $indexTerakhir = $panjangArray - 1;
            if($this->checkGambar($fileArr[$indexTerakhir])) {
                $gambarName = time().'_'.$fileEx;
                $gambarPath = "img/alatLatihan";
                $gambar->move($gambarPath, $gambarName, "public");

                $alatLatihan = new AlatLatihan;
                $alatLatihan->gambar = $gambarPath.'/'.$gambarName;
                $alatLatihan->namaAlat = $namaAlat;
                $alatLatihan->ukuran = $ukuran;
                $alatLatihan->kondisi = $kondisi;
                $alatLatihan->jumlah = $jumlah;
                $alatLatihan->harga = $harga;
                $alatLatihan->keterangan = $keterangan;
                $alatLatihan->penyimpanan_id = $tempatSimpan;
                $alatLatihan->kategori_id = 2;
                $alatLatihan->save();

                $history = new Histori;
                $history->nama = auth()->user()->nama;
                $history->aksi = "Tambah";
                $history->keterangan = "Menambahkan Alat Latihan '".$request->namaAlat."'";
                $history->save();

                if($alatLatihan){
                    return response()->json([
                        'status' => 'ok'
                    ]);
                }
            }else{
                return response()->json([
                    'status' => 'image_not_valid'
                ]);
            }
        }else{
            return response()->json([
                'status' => 'empty_image'
            ]);
        }
    }

    public function edit( $id)
    {
        $data = DB::table('alat_latihan as al')
        ->join('tempat_penyimpanan as tp', 'al.penyimpanan_id', '=', 'tp.id')
        ->where('al.id', $id)
        ->select('al.*', 'tp.tempat_simpan')
        ->orderBy('id', 'asc')
        ->get();

        return response()->json([
            'status' => 'ok',
            'data' => $data
        ]);
    }

    public function update(Request $request, $id)
    {
        $namaAlat = $request->namaAlat;
        $ukuran = $request->ukuran;
        $kondisi = $request->kondisi;
        $jumlah = $request->jumlah;
        $tempatSimpan = $request->tempatSimpan;
        $harga = $request->harga;
        $keterangan = $request->keterangan;
        $gambar = $request->file('gambar');
        if($gambar != null) {
            $fileEx = $gambar->getClientOriginalName();
            $fileArr = explode(".", $fileEx);
            $panjangArray = count($fileArr);
            $indexTerakhir = $panjangArray - 1;

            if($this->checkGambar($fileArr[$indexTerakhir])) {
                $gambarDelete = AlatLatihan::find($id)->value('gambar');
                File::delete($gambarDelete);
                $gambarName = time().'_'.$fileEx;
                $gambarPath = "img/tenaga";
                $gambar->move($gambarPath, $gambarName, "public");

                $alatLatihan = AlatLatihan::find($id);

                if ($alatLatihan->namaAlat != $namaAlat) {
                    $history = new Histori;
                    $history->nama = \auth()->user()->nama;
                    $history->aksi = "Edit";
                    $history->keterangan = "Mengedit Nama Alat Latihan '".$alatLatihan->namaAlat."' menjadi '".$namaAlat."'";
                    $history->save();
                }
                if ($alatLatihan->ukuran != $ukuran) {
                    $history = new Histori;
                    $history->nama = \auth()->user()->nama;
                    $history->aksi = "Edit";
                    $history->keterangan = "Mengedit Nama Alat Latihan '".$alatLatihan->ukuran."' menjadi '".$ukuran."'";
                    $history->save();
                }
                if($alatLatihan->kondisi != $kondisi){
                    $history = new Histori;
                    $history->nama = \auth()->user()->nama;
                    $history->aksi = "Edit";
                    $history->keterangan = "Mengedit Kondisi Alat Latihan '".$alatLatihan->kondisi."' menjadi '".$kondisi."'";
                    $history->save();
                }
                if($alatLatihan->jumlah != $jumlah){
                    $history = new Histori;
                    $history->nama = \auth()->user()->nama;
                    $history->aksi = "Edit";
                    $history->keterangan = "Mengedit Jumlah Alat Latihan '".$alatLatihan->jumlah."' menjadi '".$jumlah."'";
                    $history->save();
                }
                if($alatLatihan->tempatSimpan != $tempatSimpan){
                    $history = new Histori;
                    $history->nama = \auth()->user()->nama;
                    $history->aksi = "Edit";
                    $history->keterangan = "Mengedit Tempat Penyimpanan Alat Latihan '".$alatLatihan->tempatSimpan."' menjadi '".$tempatSimpan."'";
                    $history->save();
                }
                if($alatLatihan->harga != $harga){
                    $history = new Histori;
                    $history->nama = \auth()->user()->nama;
                    $history->aksi = "Edit";
                    $history->keterangan = "Mengedit Harga Alat Latihan '".$alatLatihan->harga."' menjadi '".$harga."'";
                    $history->save();
                }
                if($alatLatihan->keterangan != $keterangan){
                    $history = new Histori;
                    $history->nama = \auth()->user()->nama;
                    $history->aksi = "Edit";
                    $history->keterangan = "Mengedit Keterangan Alat Latihan '".$alatLatihan->keterangan."'";
                    $history->save();
                }
                if($alatLatihan->gambar != $gambar){
                    $history = new Histori;
                    $history->nama = \auth()->user()->nama;
                    $history->aksi = "Edit";
                    $history->gambar = "Mengedit Gambar Alat Latihan '".$alatLatihan->gambar."'";
                    $history->save();
                }

                $alatLatihan->gambar = $gambarPath.'/'.$gambarName;
                $alatLatihan->namaAlat = $namaAlat;
                $alatLatihan->ukuran = $ukuran;
                $alatLatihan->kondisi = $kondisi;
                $alatLatihan->jumlah = $jumlah;
                $alatLatihan->tempatSimpan = $tempatSimpan;
                $alatLatihan->harga = $harga;
                $alatLatihan->keterangan = $keterangan;
                $alatLatihan->save();

                if($alatLatihan) {
                    return response()->json([
                        'status' => 'ok'
                    ]);
                }
            } else {
                return response()->json([
                    'status' => 'image_not_valid'
                ]);
            }
        } else {
            $alatLatihan = AlatLatihan::find($id);

            if ($alatLatihan->namaAlat != $namaAlat) {
                $history = new Histori;
                $history->nama = \auth()->user()->nama;
                $history->aksi = "Edit";
                $history->keterangan = "Mengedit Nama Alat Latihan '".$alatLatihan->namaAlat."' menjadi '".$namaAlat."'";
                $history->save();
            }
            if ($alatLatihan->ukuran != $ukuran) {
                $history = new Histori;
                $history->nama = \auth()->user()->nama;
                $history->aksi = "Edit";
                $history->keterangan = "Mengedit Nama Alat Latihan '".$alatLatihan->ukuran."' menjadi '".$ukuran."'";
                $history->save();
            }
            if($alatLatihan->kondisi != $kondisi){
                $history = new Histori;
                $history->nama = \auth()->user()->nama;
                $history->aksi = "Edit";
                $history->keterangan = "Mengedit Kondisi Alat Latihan '".$alatLatihan->kondisi."' menjadi '".$kondisi."'";
                $history->save();
            }
            if($alatLatihan->jumlah != $jumlah){
                $history = new Histori;
                $history->nama = \auth()->user()->nama;
                $history->aksi = "Edit";
                $history->keterangan = "Mengedit Jumlah Alat Latihan '".$alatLatihan->jumlah."' menjadi '".$jumlah."'";
                $history->save();
            }
            if($alatLatihan->tempatSimpan != $tempatSimpan){
                $history = new Histori;
                $history->nama = \auth()->user()->nama;
                $history->aksi = "Edit";
                $history->keterangan = "Mengedit Tempat Penyimpanan Alat Latihan '".$alatLatihan->tempatSimpan."' menjadi '".$tempatSimpan."'";
                $history->save();
            }
            if($alatLatihan->harga != $harga){
                $history = new Histori;
                $history->nama = \auth()->user()->nama;
                $history->aksi = "Edit";
                $history->keterangan = "Mengedit Harga Alat Latihan '".$alatLatihan->harga."' menjadi '".$harga."'";
                $history->save();
            }
            if($alatLatihan->keterangan != $keterangan){
                $history = new Histori;
                $history->nama = \auth()->user()->nama;
                $history->aksi = "Edit";
                $history->keterangan = "Mengedit Keterangan Alat Latihan '".$alatLatihan->keterangan."'";
                $history->save();
            }

            $alatLatihan->namaAlat = $namaAlat;
            $alatLatihan->ukuran = $ukuran;
            $alatLatihan->kondisi = $kondisi;
            $alatLatihan->jumlah = $jumlah;
            $alatLatihan->tempatSimpan = $tempatSimpan;
            $alatLatihan->harga = $harga;
            $alatLatihan->keterangan = $keterangan;
            $alatLatihan->save();

            if($alatLatihan) {
                return response()->json([
                    'status' => 'ok'
                ]);
            }
        }
    }

    public function destroy($id)
    {
        $gambarDelete = AlatLatihan::where('id', $id)->value('gambar');
        File::delete($gambarDelete);
        $a = AlatLatihan::find($id);
        $history = new Histori;
        $history->nama = auth()->user()->nama;
        $history->aksi = "Hapus";
        $history->keterangan = "Menghapus Barang Rumah Tangga '".$a->namaBarang."'";
        $history->save();
        $al = AlatLatihan::destroy($id);

        return response()->json([
            'status' => 'deleted',
            'message' => 'Delete Barang Rumah Tangga Sukses'
        ]);
    }

    public function show($id)
    {
        $data = DB::table('alat_latihan as al')
        ->join('tempat_penyimpanan as tp', 'al.penyimpanan_id', '=', 'tp.id')
        ->where('al.id', $id)
        ->select('al.*', 'tp.tempat_simpan')
        ->orderBy('id', 'asc')
        ->get();

        return response()->json([
            'status' => 'ok',
            'data' => $data
        ]);
    }

    public function export_excel()
    {
        return Excel::download(new AlatLatihanExport, 'Inventarisasi Alat Latihan.xlsx');
    }

    public function export_pdf()
    {
        $data = DB::table('alat_latihan as al')
        ->join('tempat_penyimpanan as tp', 'al.penyimpanan_id', '=', 'tp.id')
        ->select('al.*', 'tp.tempat_simpan')
        ->orderBy('id', 'asc')
        ->get();

        $pdf = PDF::loadView('PDF.AlatLatihan-PDF',['AlatLatihan'=>$data]);
        return $pdf->download('Laporan Inventarisasi Alat Latihan.pdf');
    }
}
