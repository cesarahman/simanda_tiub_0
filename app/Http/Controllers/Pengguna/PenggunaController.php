<?php

namespace App\Http\Controllers\Pengguna;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\User;
use App\Histori;
use App\Exports\PenggunaExport;
use DataTables;
use Validator;
use File;

class PenggunaController extends Controller
{
    public function index(){
        return view('Pengguna.datapenggunaAdmin');
    }

    public function store(Request $request){


        $messages = array(
            'nama.required' => 'Kolom nama tidak boleh kosong!',
            'email.required' => 'Kolom Email tidak boleh kosong!',
            'email.unique' => 'Email telah digunakan!',
            'password.required' => 'Kolom Password tidak boleh kosong!',
        );

        $validator = Validator::make($request->all(),[
            'nama' => 'required|string',
            'email' => 'required|unique:users,email',
            'password' => 'required'
        ],$messages);

        if($validator->fails()){
            $error = $validator->errors()->first();
            return response()->json([
                'error' => $error,
            ]);
        }

        $u = new User;
        $u->nama = $request->nama;
        $u->email = $request->email;
        $u->password = bcrypt($request->password);
        if (\auth()->user()->role_id == 1) {
            $u->role_id = 2;
        }else{
            $u->role_id = 3;
        }
        $u->remember_token = '';
        $u->save();

        $history = new Histori;
        $history->nama = auth()->user()->nama;
        $history->aksi = "Tambah";
        $history->keterangan = "Menambahkan Akun '".$request->email."'";
        $history->save();

        return response([
            'message' => 'sukses',
        ]);
    }

    public function destroy($id){
        $gambarPath = User::where('id', $id)->value('gambar');
        File::delete('img/profile/'. $gambarPath);

        $u = User::find($id);
        Histori::where('nama',$u->nama)->delete();
        $u->delete();

        $history = new Histori;
        $history->nama = auth()->user()->nama;
        $history->aksi = "Hapus";
        $history->keterangan = "Menghapus Akun '".$u->email."' beserta Historynya";
        $history->save();

        return response([
            'message' => "delete sukses"
        ]);
    }

    public function LoadTablePengguna(){
        return view('datatable.TablePengguna');
    }

    public function LoadDataPengguna(){

        if (\auth()->user()->role_id == 1) {
            $jabatan = User::where('role_id','2')->orderBy('id','desc')->get();
        }else{
            $jabatan = User::where('role_id','3')->orderBy('id','desc')->get();
        }

        // $jabatan = User::where('role_id','3')->orderBy('id','desc')->get();

        return Datatables::of($jabatan)->addIndexColumn()
        ->addColumn('aksi', function($row){
            $btn =  '<a href="javascript:void(0)" data-id="'.$row->id.'" data-nama="'.$row->nama.'" class="btn-delete-pengguna" style="font-size: 18pt; text-decoration: none; color:red;">
            <i class="fas fa-trash"></i>
            </a>';
            return $btn;
        })
        ->rawColumns(['aksi'])
        ->make(true);
    }

    public function export(){
        return Excel::download(new PenggunaExport, date("dmY-His").'-DataPengguna.xlsx');
    }
}
