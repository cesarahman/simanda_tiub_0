<?php

namespace App\Http\Controllers\bidang3;

use App\Agama;
use App\Anggota;
use App\Fakultas;
use App\Histori;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use DataTables, PDF, Validator, File;

class AnggotaController extends Controller
{

    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function index()
    {
        return \view('bidang3.Anggota');
    }

    public function loadTable()
    {
        return \view('datatable.TableAnggota');
        //     $a = Anggota::all();

        //     return \response()->json($a);
    }

    public function loadData()
    {
        //Panggil data dropdown
        $a = DB::table('anggota as a')
        ->join('agama as ag', 'a.agama_id', '=', 'ag.id')
        ->join('fakultas as fk', 'a.fakultas_id', '=', 'fk.id')
        ->select('a.*', 'ag.nama_agama', 'fk.initial', 'fk.namaFakultas')
        ->orderBy('id', 'asc')
        ->get();
        

        //add kolom aksi
        return DataTables::of($a)
        ->addIndexColumn()
        ->addColumn('aksi', function($row){
            $btn = '<a href="javascript:void(0)" data-toggle="modal" data-id="'.$row->id.'" style="font-size: 18pt; text-decoration: none;" class="mr-3 btn-edit-anggota" id="btn-edit-anggota">
            <i class="fas fa-pen-square"></i>
            </a>';
            $btn = $btn. '<a href="javascript:void(0)" data-toggle="modal" data-id="'.$row->id.'" data-nama="'.$row->nama.'"  style="font-size: 16pt; text-decoration: none; color:red;" class="mr-3 btn-delete-anggota" id="btn-delete-anggota">
            <i class="fas fa-trash"></i>
            </a>';
            $btn = $btn. '<a href="javascript:void(0)" data-toggle="modal" data-id="'.$row->id.'" data-nama="'.$row->nama.'" style="font-size: 16pt; text-decoration: none; color:green;" class="mr-3 btn-show-anggota" id="btn-show-anggota">
            <i class="fas fa-eye"></i>
            </a>';
            return $btn;
        })
        ->rawColumns(['aksi'])
        ->make(\true);
    }

    public function getAgama()
    {
        $ag = Agama::orderBy('id', 'asc')->get();
        return \response()->json([
            'ag' => $ag
        ]);
    }

    public function getFakultas()
    {
        $fk = Fakultas::orderBy('id', 'asc')->get();
        return \response()->json([
            'fk' => $fk
        ]);

    }

    public function store(Request $request)
    {

        $messages = array(
            'nama.required' => 'Kolom nama tidak boleh kosong!',
            'nim.required' => 'Kolom NIM tidak boleh kosong!',
            'nim.unique' => 'NIM telah digunakan!',
            'tempat_lahir.required' => 'Kolom tempat lahir tidak boleh kosong!',
            'tgl_lahir.required' => 'NIM telah digunakan!',
            'agama_id.required' => 'kolom agama tidak boleh kosong!',
            'alamat_asal.required' => 'Kolom alamat asal tidak boleh kosong!',
            'no_telp.required' => 'Kolom deskripsi tidak boleh kosong!',
            'no_telp.unique' => 'Nomor Telepon telah digunakan!',
            'fakultas_id.required' => 'Kolom deskripsi tidak boleh kosong!',
            'prodi_jurusan.required' => 'Kolom deskripsi tidak boleh kosong!',
            'angkatan.required' => 'Kolom angkatan tidak boleh kosong!',
            'spab.required' => 'Kolom spab tidak boleh kosong!',
            'foto.required' => 'Harap masukkan foto!',
            'foto.mimes' => 'Field foto Perlu di Isi dengan Format: jpeg,jpg,png'
        );

        $validator = Validator::make($request->all(),[
            'nama' => 'required',
            'nim' => 'required|unique:anggota,nim',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required|date',
            'agama_id' => 'required|integer',
            'alamat_asal' => 'required',
            'no_telp' => 'required|unique:anggota,no_telp',
            'fakultas_id' => 'required|integer',
            'prodi_jurusan' => 'required',
            'spab' => 'required',
            'foto' => 'mimes:jpeg,jpg,png,gif|required|max:10000'
        ],$messages);

        if($validator->fails()){
            $error = $validator->errors()->first();
            return response()->json([
                'error' => $error,
            ]);
        }

        if($request->hasFile('foto')){
            $directory = 'assets/upload/anggota';
            $file = request()->file('foto');
            $name = time().$file->getClientOriginalName();
            $file->name = $name;
            $file->move($directory, $file->name);

            $a = new Anggota;
            $a->nama = $request->nama;
            $a->nim = $request->nim;
            $a->tempat_lahir = $request->tempat_lahir;
            $a->tgl_lahir = $request->tgl_lahir;
            $a->agama_id = $request->agama_id;
            $a->alamat_asal = $request->alamat_asal;
            $a->alamat_malang = $request->alamat_malang;
            $a->no_telp = $request->no_telp;
            $a->id_line = $request->id_line;
            $a->fakultas_id = $request->fakultas_id;
            $a->prodi_jurusan = $request->prodi_jurusan;
            $a->angkatan = $request->angkatan;
            $a->spab = $request->spab;
            $a->tingkatan = $request->tingkatan;
            $a->foto= $directory."/".$name;
            $a->save();

            $history = new Histori;
            $history->nama = auth()->user()->nama;
            $history->aksi = "Tambah";
            $history->keterangan = "Menambahkan Anggota '".$request->nama."'";
            $history->save();

            return response()->json([
                'message' => 'success'
            ]);
        }
    }


public function edit($id)
{

}

public function update(Request $request, $id)
{
    $messages = array(
        'nama.required' => 'Kolom nama tidak boleh kosong!',
        'nim.required' => 'Kolom NIM tidak boleh kosong!',
        'nim.unique' => 'NIM telah digunakan!',
        'tempat_lahir.required' => 'Kolom tempat lahir tidak boleh kosong!',
        'tgl_lahir.required' => 'NIM telah digunakan!',
        'agama_id.required' => 'kolom agama tidak boleh kosong!',
        'alamat_asal.required' => 'Kolom alamat asal tidak boleh kosong!',
        'no_telp.required' => 'Kolom deskripsi tidak boleh kosong!',
        'no_telp.unique' => 'Nomor Telepon telah digunakan!',
        'fakultas_id.required' => 'Kolom deskripsi tidak boleh kosong!',
        'prodi_jurusan.required' => 'Kolom deskripsi tidak boleh kosong!',
        'angkatan.required' => 'Kolom angkatan tidak boleh kosong!',
        'tingkatan.required' => 'Kolom tingkatan tidak boleh kosong!',
        'spab.required' => 'Kolom spab tidak boleh kosong!',
        'foto.required' => 'Harap masukkan foto!',
        'foto.mimes' => 'Field foto Perlu di Isi dengan Format: jpeg,jpg,png'
    );

    $validator = Validator::make($request->all(),[
        'nama' => 'required|string',
        'nim' => 'required|string|unique:anggota,nim'.$id,
        'tempat_lahir' => 'required|string',
        'tgl_lahir' => 'required|date',
        'agama_id' => 'required|integer',
        'alamat_asal' => 'required|string',
        'no_telp' => 'required|string|unique:anggota,nim'.$id,
        'fakultas_id' => 'required|integer',
        'prodi_jurusan' => 'required|stirng',
        'spab' => 'required|string',
        'foto' => 'mimes:jpeg,jpg,png,gif|required|max:10000'
    ],$messages);

    if($validator->fails()){
        $error = $validator->errors()->first();
        return response()->json([
            'error' => $error,
        ]);
    }


}

public function destroy($id)
{

}

public function show()
{

}

public function export_excel()
{

}

public function export_pdf()
{

}

}
