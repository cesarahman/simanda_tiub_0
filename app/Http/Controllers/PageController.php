<?php

namespace App\Http\Controllers;

use App\Histori;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function CekRole(){
        $data = auth()->user()->role_id;

        return response([
            'data' => $data
        ]);
    }

    public function login()
    {
        return \view('auth.login');
    }

    public function Dashboard(){
        // $admin = User::count();
        // $dosen = Dosen::count();
        // $tenaga = DB::table('tenaga_kependidikan')->count();

        // //UNTUK CHART
        // $tahun = Mahasiswa::orderBy('angkatan','asc')->get();
        // $mahasiswa = DB::table('mahasiswa')
        // ->select(DB::raw('count(*) as total'))
        // ->groupBy('angkatan')
        // ->get();

        // $angkatan = [];
        // foreach($tahun as $t){
        //     $angkatan[] = $t->angkatan;
        // }
        // $angkatan_fix = array_values(array_unique($angkatan));

        // $total = [];
        // foreach($mahasiswa as $m){
        //     $total[] = $m->total;
        // }

        // $lainnya = [];
        // $lainnya[] = $admin;
        // $lainnya[] = $tenaga;
        // $lainnya[] = $dosen;

        //Delete History 30 Hari Sekali
        Histori::where('created_at', '<', Carbon::now()->subDays(30))->delete();

        return view('admin.dashboardAdmin', compact('admin', 'dosen', 'tenaga','angkatan_fix','total','lainnya'));
    }

    public function alatLatihan()
    {
        return \view('bidang1.AlatLatihan');
    }

    public function prestasi()
    {
        return \view('bidang2.Prestasi');
    }

    // public function SearchMenu($menu){
    //     $data = SearchMenu::where('menu',$menu)->first();

    //     return response([
    //         'data' => $data
    //     ]);
    // }

}
