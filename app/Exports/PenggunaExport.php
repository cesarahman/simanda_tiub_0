<?php

namespace App\Exports;

use App\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class PenggunaExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {

        if (\auth()->user()->role_id == 1) {
            return User::select('id','nama','email','created_at','updated_at')->where('role_id',2)->get();
        }else{
            return User::select('id','nama','email','created_at','updated_at')->where('role_id',3)->get();
        }
    }

    public function headings(): array
    {
        return [
            '#',
            'Nama Pengguna',
            'Email',
            'Dibuat Tanggal',
            'Terakhir Di-Ubah'
        ];
    }
}
