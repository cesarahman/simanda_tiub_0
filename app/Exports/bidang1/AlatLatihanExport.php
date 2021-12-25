<?php

namespace App\Exports\bidang1;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class AlatLatihanExport implements FromCollection, WithHeadings, ShouldAutoSize, WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $data = DB::table('alat_latihan as al')
        ->join('tempat_penyimpanan as tp', 'al.penyimpanan_id', '=', 'tp.id')
        ->select('al.namaAlat', 'al.ukuran', 'al.kondisi', 'al.jumlah', 'al.gambar', 'tp.tempat_simpan')
        ->orderBy('id', 'asc')
        ->get();
        return $data;
    }

    public function headings(): array
    {
        return [
            "Nama Alat",
            "Ukuran",
            "Kondisi",
            "Jumlah",
            "Tempat Penyimpanan",
            "Gambar"
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            // Style the first row as bold text.
            1    => ['font' => ['bold' => true]],
        ];
    }
}
