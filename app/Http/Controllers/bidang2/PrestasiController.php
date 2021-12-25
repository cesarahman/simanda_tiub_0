<?php

namespace App\Http\Controllers\bidang2;

use App\Exports\bidang2\PrestasiExport;
use App\Histori;
use App\Http\Controllers\Controller;
use App\Prestasi;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use PDF, Validator, DataTables;

class PrestasiController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function index()
    {
        $prestasi = Prestasi::all();

        return DataTables::of($prestasi)
        ->addIndexColumn()
        ->addColumn('aksi', function($row){
            $btn = '<a href="javascript:void(0)" data-toggle="modal" data-id="'.$row->id.'" style="font-size: 18pt; text-decoration: none;" class="mr-3 btn-edit-prestasi" id="btn-edit-prestasi">
            <i class="fas fa-pen-square"></i>
            </a>';
            $btn = $btn. '<a href="javascript:void(0)" data-toggle="modal" data-id="'.$row->id.'" data-nama="'.$row->namaKejuaraan.'" data-name="'.$row->namaAtlet.'"  style="font-size: 16pt; text-decoration: none; color:red;" class="mr-3 btn-delete-prestasi" id="btn-delete-prestasi">
            <i class="fas fa-trash"></i>
            </a>';
            return $btn;
        })
        ->rawColumns(['aksi'])
        ->make(true);

        return \view('bidang2.Prestasi');
    }

    public function loadTable()
    {
        return \view('datatable.TablePrestasi');
        $prestasi = Prestasi::all();

        return \response()->json([
            'data' => $prestasi
        ]);
    }

    public function store(Request $request)
    {
        $messages = array(
            'tahun.required' => 'Kolom tahun harus diisi!',
            'namaKejuaraan.required' => 'Kolom nama kejuaraan harus diisi!',
            'capaian.required' => 'Kolom capaian harus diisi!',
            'kategori.required' => 'Kolom kategoti harus diisi!',
            'kelas.required' => 'Kolom kelas harus diisi!',
            'namaAtlet.required' => 'Kolom nama atlet harus diisi!',
        );

        $validator = Validator::make($request->all(),[
            'tahun' => 'required|string',
            'namaKejuaraan' => 'required|string',
            'capaian' => 'required|string',
            'kategori' => 'required|string',
            'kelas' => 'required|string',
            'namaAtlet' => 'required|string',
        ],$messages);

        if($validator->fails()){
            $error = $validator->errors()->first();
            return response()->json([
                'error' => $error,
            ]);
        }

        $prestasi = new Prestasi;
        $prestasi->tahun = $request->tahun;
        $prestasi->namaKejuaraan = $request->namaKejuaraan;
        $prestasi->capaian = $request->capaian;
        $prestasi->kategori= $request->kategori;
        $prestasi->kelas = $request->kelas;
        $prestasi->namaAtlet = $request->namaAtlet;
        $prestasi->save();

        $history = new Histori;
        $history->nama = auth()->user()->nama;
        $history->aksi = "Tambah";
        $history->keterangan = "Menambahkan Data Prestasi'".$request->namaKejuaraan."'";
        $history->save();

        return response()->json([
            'message' => 'success'
        ]);
    }

    public function edit( $id)
    {
        $prestasi = Prestasi::findOrFail($id);

        return \response()->json([
            'data' => $prestasi
        ]);
    }

    public function update(Request $request, $id)
    {
        $messages = array(
            'tahun.required' => 'Kolom tahun harus diisi!',
            'namaKejuaraan.required' => 'Kolom nama kejuaraab harus diisi!',
            'capaian.required' => 'Kolom capaian harus diisi!',
            'kategori.required' => 'Kolom kategoti harus diisi!',
            'kelas.required' => 'Kolom kelas harus diisi!',
            'namaAtlet.required' => 'Kolom nama atlet harus diisi!',
        );

        $validator = Validator::make($request->all(),[
            'tahun' => 'required|year',
            'namaKejuaraan' => 'required|string'.$id,
            'capaian' => 'required|string'.$id,
            'kategori' => 'required|string'.$id,
            'kelas' => 'required|string'.$id,
            'namaAtlet' => 'required|string'.$id,
        ],$messages);

        if($validator->fails()){
            $error = $validator->errors()->first();
            return response()->json([
                'error' => $error,
            ]);
        }

        $prestasi = Prestasi::findOrFail($id);

        $prestasi->tahun = $request->tahun;
        $prestasi->namaKejuaraan = $request->namaKejuaraan;
        $prestasi->capaian = $request->capaian;
        $prestasi->kategori= $request->kategori;
        $prestasi->kelas = $request->kelas;
        $prestasi->namaAtlet = $request->namaAtlet;
        $prestasi->save();

        if($prestasi->tahun != $request->tahun){
            $history = new Histori;
            $history->nama = \auth()->user()->nama;
            $history->aksi = "Edit";
            $history->keterangan = "Mengedit Nama Barang Barang Rumah Tangga '".$prestasi->tahun."' menjadi '".$request->tahun."'";
            $history->save();
        }
        if($prestasi->namaKejuaraan != $request->namaKejuaraan){
            $history = new Histori;
            $history->nama = \auth()->user()->nama;
            $history->aksi = "Edit";
            $history->keterangan = "Mengedit Nama Barang Barang Rumah Tangga '".$prestasi->namaKejuaraan."' menjadi '".$request->namaKejuaraan."'";
            $history->save();
        }
        if($prestasi->capaian != $request->capaian){
            $history = new Histori;
            $history->nama = \auth()->user()->nama;
            $history->aksi = "Edit";
            $history->keterangan = "Mengedit Nama Barang Barang Rumah Tangga '".$prestasi->capaian."' menjadi '".$request->capaian."'";
            $history->save();
        }
        if($prestasi->kategori != $request->kategori){
            $history = new Histori;
            $history->nama = \auth()->user()->nama;
            $history->aksi = "Edit";
            $history->keterangan = "Mengedit Nama Barang Barang Rumah Tangga '".$prestasi->kategori."' menjadi '".$request->kategori."'";
            $history->save();
        }
        if($prestasi->kelas != $request->kelas){
            $history = new Histori;
            $history->nama = \auth()->user()->nama;
            $history->aksi = "Edit";
            $history->keterangan = "Mengedit Nama Barang Barang Rumah Tangga '".$prestasi->kelas."' menjadi '".$request->kelas."'";
            $history->save();
        }
        if($prestasi->namaAtlet != $request->namaAtlet){
            $history = new Histori;
            $history->nama = \auth()->user()->nama;
            $history->aksi = "Edit";
            $history->keterangan = "Mengedit Nama Barang Barang Rumah Tangga '".$prestasi->namaAtlet."' menjadi '".$request->namaAtlet."'";
            $history->save();
        }

        return \response()->json([
            'message' => 'success'
        ]);
    }

    public function destroy($id)
    {
        $d = Prestasi::find($id);
        $history = new Histori;
        $history->nama = auth()->user()->nama;
        $history->aksi = "Hapus";
        $history->keterangan = "Menghapus data prestasi'".$d->namaKejuaraan."'";
        $history->save();
        $p = Prestasi::destroy($id);

        return \response()->json([
            'status' => 'deleted',
            'message' => 'Delete data prestasi sukses'
        ]);
    }

    public function show($id)
    {
        $prestasi = Prestasi::findOrFail($id);

        return \response()->json([
            'data' => $prestasi
        ]);
    }

    public function export_excel()
    {
        return Excel::download(new PrestasiExport, 'Rekapitulasi Prestasi.xlsx');
    }

    public function export_pdf()
    {
        $prestasi = Prestasi::all();
        $pdf = PDF::loadView('PDF.Prestasi-PDF', ['prestasi'=>$prestasi]);
        return $pdf->download('Pendataan Prestasi.pdf');
    }
}
