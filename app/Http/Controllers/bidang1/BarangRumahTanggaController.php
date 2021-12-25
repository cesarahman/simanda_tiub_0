<?php

namespace App\Http\Controllers\bidang1;

use App\BarangRumahTangga;
use App\Exports\bidang1\BarangRumahTanggaExport;
use App\Histori;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use DataTables, PDF, Validator, File;

class BarangRumahTanggaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('bidang1.BarangRumahTangga');
    }

    public function loadTable()
    {
        return view('datatable.TableBarangRumahTangga');
        $brt = BarangRumahTangga::all();

        return response()->json($brt);
    }

    public function loadData()
    {
        $brt = BarangRumahTangga::all();
        return DataTables::of($brt)
        ->addIndexColumn()
        ->addColumn('aksi', function($row){
            $btn = '<a href="javascript:void(0)" data-toggle="modal" data-id="'.$row->id.'" data-value="'.$row->kondisi.'" style="font-size: 18pt; text-decoration: none;" class="mr-3 btn-edit-barang" id="btn-edit-barang">
            <i class="fas fa-pen-square"></i>
            </a>';
            $btn = $btn. '<a href="javascript:void(0)" data-toggle="modal" data-id="'.$row->id.'" data-nama="'.$row->namaBarang.'"  style="font-size: 16pt; text-decoration: none; color:red;" class="mr-3 btn-delete-barang" id="btn-delete-barang">
            <i class="fas fa-trash"></i>
            </a>';
            $btn = $btn. '<a href="javascript:void(0)" data-toggle="modal" data-id="'.$row->id.'" data-nama="'.$row->namaBarang.'" data-value="'.$row->kondisi.'" style="font-size: 16pt; text-decoration: none; color:green;" class="mr-3 btn-show-barang" id="btn-show-barang">
            <i class="fas fa-eye"></i>
            </a>';
            return $btn;
        })
        // ->addColumn('kondisi', function($row){
        //     if($row->kondisi = 'baik'){
        //         $tag = '<div class="card bg-gradient-success text-white small text-center" style="height: 3.2rem">
        //         <div class="card-body">
        //         <h5 class="card-title">Baik</h5>
        //         </div>
        //         </div>';
        //         return $tag;
        //     }else if($row->kondisi = 'cukup'){
        //         $tag = '<div class="card bg-gradient-warning text-white small text-center" style="height: 3.2rem">
        //         <div class="card-body">
        //         <h5 class="card-title">Cukup</h5>
        //         </div></div>';
        //         return $tag;
        //     }else{
        //         $tag = '<div class="card bg-gradient-warning text-white small text-center" style="height: 3.2rem">
        //         <div class="card-body">
        //         <h5 class="card-title">Cukup</h5>
        //         </div></div>';
        //         return $tag;
        //     }
        // })
        ->rawColumns(['aksi', 'kondisi'])
        ->make(true);
    }

    public function get($id)
    {
        $barangRumahTangga = BarangRumahTangga::findOrFail($id);
        return \response()->json([
            'data' => $barangRumahTangga
        ]);
    }

    public function store(Request $request)
    {
        $messages = array(
            'namaBarang.required' => 'Kolom nama barang barang harus diisi!',
            'kondisi.required' => 'Kondisi barang harus diisi!',
            'jumlah.required' => 'Jumlah barang harus diisi!',
        );

        $validator = Validator::make($request->all(),[
            'namaBarang' => 'required|string',
            'kondisi' => 'required|string',
            'jumlah' => 'required|integer',
        ],$messages);

        if($validator->fails()){
            $error = $validator->errors()->first();
            return response()->json([
                'error' => $error,
            ]);
        }

        $barangRumahTangga = new barangRumahTangga;
        $barangRumahTangga->namaBarang = $request->namaBarang;
        $barangRumahTangga->kondisi = $request->kondisi;
        $barangRumahTangga->jumlah = $request->jumlah;
        $barangRumahTangga->keterangan = $request->keterangan;
        $barangRumahTangga->penyimpanan_id = 1;
        $barangRumahTangga->kategori_id = 1;
        $barangRumahTangga->save();

        $history = new Histori;
        $history->nama = auth()->user()->nama;
        $history->aksi = "Tambah";
        $history->keterangan = "Menambahkan Barang Rumah Tangga '".$request->namaBarang."'";
        $history->save();

        return response()->json([
            'message' => 'success'
        ]);
    }

    public function update(Request $request, $id)
    {
        $messages = array(
            'namaBarang.required' => 'Kolom nama barang harus diisi!',
            'kondisi.required' => 'Opsi Kondisi barang harus diisi!',
            'jumlah.required' => 'Kolom jumlah harus diisi!',
        );

        $validator = Validator::make($request->all(),[
            'namaBarang' => 'required|string',
            'kondisi' => 'required|string,'.$id,
            'jumlah' => 'required|integer,'.$id,
        ], $messages);

        if($validator->fails()){
            $error = $validator->errors()->first();
            return \response()->json([
                'error' => $error,
            ]);
        }

        $barangRumahTangga = BarangRumahTangga::find($id);

        $barangRumahTangga->namaBarang = $request->namaBarang;
        $barangRumahTangga->kondisi = $request->kondisi;
        $barangRumahTangga->jumlah = $request->jumlah;
        $barangRumahTangga->keterangan = $request->keterangan;
        $barangRumahTangga->save();

        if($barangRumahTangga->namaBarang != $request->namaBarang){
            $history = new Histori;
            $history->nama = \auth()->user()->nama;
            $history->aksi = "Edit";
            $history->keterangan = "Mengedit Nama Barang Barang Rumah Tangga '".$barangRumahTangga->namaBarang."' menjadi '".$request->namaBarang."'";
            $history->save();
        }
        if($barangRumahTangga->kondisi != $request->kondisi){
            $history = new Histori;
            $history->nama = \auth()->user()->nama;
            $history->aksi = "Edit";
            $history->keterangan = "Mengedit Kondisi Barang Rumah Tangga '".$barangRumahTangga->kondisi."' menjadi '".$request->kondisi."'";
            $history->save();
        }
        if($barangRumahTangga->jumlah != $request->jumlah){
            $history = new Histori;
            $history->nama = \auth()->user()->nama;
            $history->aksi = "Edit";
            $history->keterangan = "Mengedit Jumlah Barang Rumah Tangga '".$barangRumahTangga->jumlah."' menjadi '".$request->jumlah."'";
            $history->save();
        }
        if($barangRumahTangga->keterangan != $request->keterangan){
            $history = new Histori;
            $history->nama = \auth()->user()->nama;
            $history->aksi = "Edit";
            $history->keterangan = "Mengedit keterangan Barang Rumah Tangga '".$barangRumahTangga->keterangan."'";
            $history->save();
        }

        return response()->json([
            'message' => 'success',
        ]);

    }

    public function destroy($id)
    {

        $d = BarangRumahTangga::find($id);
        $history = new Histori;
        $history->nama = auth()->user()->nama;
        $history->aksi = "Hapus";
        $history->keterangan = "Menghapus Barang Rumah Tangga '".$d->namaBarang."'";
        $history->save();
        $brt = BarangRumahTangga::destroy($id);

        return response()->json([
            'status' => 'deleted',
            'message' => 'Delete Barang Rumah Tangga Sukses'
        ]);
    }


    public function export_excel()
    {
        return Excel::download(new BarangRumahTanggaExport, 'Barang Rumah Tangga.xlsx');
    }

    public function export_pdf()
    {
        $barangRumahTangga = BarangRumahTangga::all();
        $pdf = PDF::loadview('PDF.barangRumahTangga-PDF', ['barangRumahTangga'=>$barangRumahTangga]);
        return $pdf->download('Laporan Inventarisasi barang Rumah Tangga.pdf');

    }
}


?>
