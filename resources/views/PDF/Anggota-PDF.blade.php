<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Export to PDF</title>
</head>
<body>

    <h4 align="center">Data Anggota TIUB</h4>
    <style type="text/css">
        .tg  {border-collapse:collapse;border-spacing:0;margin:0px auto;}
        .tg td{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
            overflow:hidden;padding:10px 5px;word-break:normal;}
            .tg th{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
                font-weight:normal;overflow:hidden;padding:10px 5px;word-break:normal;}
                .tg .tg-cly1{text-align:left;vertical-align:middle}
                .tg .tg-0lax{text-align:left;vertical-align:top}
                .tg .tg-0pky{border-color:inherit;text-align:left;vertical-align:top}
                @media screen and (max-width: 767px) {.tg {width: auto !important;}.tg col {width: auto !important;}.tg-wrap {overflow-x: auto;-webkit-overflow-scrolling: touch;margin: auto 0px;}}</style>
                @foreach ($anggota as $a)

                <div class="tg-wrap"><table class="tg">
                    <tbody>
                        <tr>
                            <td class="tg-0lax">No</td>
                            <td class="tg-cly1" rowspan="6"><img sizes="100px" src="{{ $a->foto }}" alt=""></td>
                            <td class="tg-0pky">Nama</td>
                            <td class="tg-0pky">{{ $a->nama }}</td>
                        </tr>
                        <tr>
                            <td class="tg-cly1" rowspan="5">{{ $loop->iteration }}</td>
                            <td class="tg-0pky">TTL</td>
                            <td class="tg-0pky">{{ $a->tempat_lahit }}, {{ $a->tgl_lahir }}</td>
                        </tr>
                        <tr>
                            <td class="tg-0pky">Alamat</td>
                            <td class="tg-0pky">{{ $a->alamat_asal }}</td>
                        </tr>
                        <tr>
                            <td class="tg-0pky">NIM</td>
                            <td class="tg-0pky">{{ $a->nim }}</td>
                        </tr>
                        <tr>
                            <td class="tg-0pky">Fakultas/Jurusan</td>
                            <td class="tg-0pky">{{ $a->namaFakultas }}/SI</td>
                        </tr>
                        <tr>
                            <td class="tg-0pky">No. HP/ID Line</td>
                            <td class="tg-0pky">{{ $a->no_telp }}/{{ $a->id_line }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>

                @endforeach
        </body>
        </html>
