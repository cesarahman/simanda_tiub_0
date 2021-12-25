<?php

namespace App\Exports\bidang2;

use App\Prestasi;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class PrestasiExport implements FromCollection, WithHeadings, ShouldAutoSize, WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Prestasi::select('id', 'tahun', 'namaKejuaraan', 'capaian', 'kategori', 'kelas', 'namaAtlet')->get();
    }

    public function headings(): array
    {
        return [
            'No', 'Tahun', 'Nama Kejuaraan', 'Capaian', 'Kategori', 'Kelas', 'Nama Atlet'
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
