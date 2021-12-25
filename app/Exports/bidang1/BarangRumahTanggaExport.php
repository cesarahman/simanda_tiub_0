<?php

namespace App\Exports\bidang1;

use App\BarangRumahTangga;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;


class BarangRumahTanggaExport implements FromCollection, WithHeadings, ShouldAutoSize, WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return BarangRumahTangga::select('namaBarang', 'kondisi', 'jumlah', 'keterangan')->get();
    }

    public function headings(): array
    {
        return [
            'No',
            'Nama Barang',
            'Kondisi',
            'Jumlah Barang',
            'Keterangan'
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
