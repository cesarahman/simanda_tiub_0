<?php

namespace App\Exports;

use App\Histori;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class HistoryExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Histori::select('nama','aksi','keterangan','created_at')->get();
    }

    public function headings(): array
    {
        return [
            'Nama Admin',
            'Aksi',
            'Keterangan',
            'Tanggal'
        ];
    }
}
