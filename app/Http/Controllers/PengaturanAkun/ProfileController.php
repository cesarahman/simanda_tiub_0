<?php

namespace App\Http\Controllers\PengaturanAkun;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \App\User;
use \App\Histori;
use Validator;
use File;
use Hash;

class ProfileController extends Controller
{

    public function EditProfile(){
        return view('AdminProfile.editprofileAdmin');
    }

    public function EditPassword(){
        return view('AdminProfile.editpasswordAdmin');
    }

    public function updatePassword(Request $request, $id)
    {

        $validator = Validator::make($request->all(),[
            'password_lama' => 'required|string',
            'password' => 'required|string',
            'password_confirmation' => 'required|string'
        ]);

        if($validator->fails()) {
            $error = $validator->errors()->first();
            return response()->json([
                'error' => $error,
            ]);
        }else{
            if(Hash::check($request->password_lama, auth()->user()->password)) {
                $password = $request->password;
                $passwordConfirm = $request->password_confirmation;
                $length = strlen($password);

                if($length < 8){
                    return response([
                        'status' => '2'
                    ]);
                }else{
                    if($password == $passwordConfirm){
                        $user = User::find($id);
                        $user->password = bcrypt($passwordConfirm);
                        $user->save();

                        if($user) {

                            $history = new Histori;
                            $history->nama = auth()->user()->nama;
                            $history->aksi = "Edit";
                            $history->keterangan = "Akun '".auth()->user()->email."' mengubah passwordnya'";
                            $history->save();

                            return response()->json([
                                'status' => '1'
                            ]);
                        } else {
                            return response()->json([
                                'status' => '0'
                            ]);
                        }

                    } else {
                        return response()->json([
                            'status' => 'invalid_password'
                        ]);
                    }
                }

            } else {
                return response()->json([
                    'status' => 'salah'
                ]);
            }
        }

    }

    public function updateProfile(Request $request, $id)
    {
        if($request->hasFile('gambar')) {
            $fileName = time().'_'.$request->file('gambar')->getClientOriginalName();
            $filePath = $request->file('gambar')->move('img/profile', $fileName, 'public');
            File::delete('img/profile/'. auth()->user()->gambar);
            $user = User::find($id);
            $histori = Histori::where('nama',$user->nama)->get();
            if($histori){
                DB::table('history')->where('nama','=',auth()->user()->nama)->update(array('nama' => $request->nama));
            }
            $user->nama = $request->nama;
            $user->email = $request->email;
            $user->gambar = $fileName;
            $user->save();
            if($user) {

                $history = new Histori;
                $history->nama = auth()->user()->nama;
                $history->aksi = "Edit";
                $history->keterangan = "Akun '".auth()->user()->email."' memperbarui profilenya";
                $history->save();

                return response()->json([
                    'status' => '1',
                ]);
            }

        } else {
            $cek = $this->cekEmail($request->email);
            $cekNama = $this->cekNama($request->nama);
            if($cek==false && $cekNama==false) {
                $user = User::find($id);
                $histori = Histori::where('nama',$user->nama)->get();
                if($histori){
                    DB::table('history')->where('nama','=',auth()->user()->nama)->update(array('nama' => $request->nama));
                }
                $user->nama = $request->nama;
                $user->email = $request->email;
                $user->save();
                if($user) {

                    $history = new Histori;
                    $history->nama = auth()->user()->nama;
                    $history->aksi = "Edit";
                    $history->keterangan = "Akun '".auth()->user()->email."' memperbarui Nama & Email menjadi '".$request->nama."' & '".$request->email."'";
                    $history->save();

                    return response()->json([
                        'status' => '1',
                    ]);
                }
            } else if($cekNama==false) {
                $user = User::find($id);
                $histori = Histori::where('nama',$user->nama)->get();
                if($histori){
                    DB::table('history')->where('nama','=',auth()->user()->nama)->update(array('nama' => $request->nama));
                }
                $user->nama = $request->nama;
                $user->save();
                if($user) {

                    $history = new Histori;
                    $history->nama = auth()->user()->nama;
                    $history->aksi = "Edit";
                    $history->keterangan = "Akun '".auth()->user()->email."' memperbarui Nama menjadi '".$request->nama."'";
                    $history->save();

                    return response()->json([
                        'status' => '1',
                    ]);
                }
            } else if($cek==false) {
                $user = User::find($id);
                $user->email = $request->email;
                $user->save();
                if($user) {

                    $history = new Histori;
                    $history->nama = auth()->user()->nama;
                    $history->aksi = "Edit";
                    $history->keterangan = "Akun '".auth()->user()->email."' memperbarui Email menjadi '".$request->email."'";
                    $history->save();

                    return response()->json([
                        'status' => '1',
                    ]);
                }
            } else if($cek==true) {
                return response()->json([
                    'status' => 'email_sudah_ada',
                ]);
            }

        }

    }

    function cekEmail($email)
    {
        $cek = User::where('email', $email)->first();
        if(!$cek) {
            return false;
        }
        return true;
    }

    function cekNama($nama)
    {
        $cek = User::where('nama', $nama)->first();
        if(!$cek) {
            return false;
        }
        return true;
    }

    public function CekUpdatePassword(){
        $user = User::find(auth()->user()->id);

        return response([
            'user' => $user
        ]);
    }
}
