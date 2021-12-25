<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Export to PDF</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>
<body>
    <h4 align="center">Laporan Inventarisasi Alat Latihan <?php echo date('Y'); ?> </h4>
    <table class="table table-bordered" border-style="solid" border="1">
        <thead class="thead-dark">
            <tr text-align="center">
                <th>No</th>
                <th>Nama Alat</th>
                <th>Ukuran</th>
                <th>Kondisi</th>
                <th>Jumlah</th>
                <th>Gambar</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($alatLatihan as $al)
            <tr>
                <td align="center">{{ $loop->iteration }}</td>
                <td>{{ $al->namaAlat }}</td>
                <td>{{ $al->ukuran }}</td>
                <td>{{ $al->kondisi }}</td>
                <td align="center">{{ $al->jumlah }}</td>
                <td><img height="200px" src="{{ $al->gambar }}" alt=""></td>
                <td>{{ $al->keterangan }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

<script>
    n =  new Date();
    y = n.getFullYear();
    m = n.getMonth() + 1;
    d = n.getDate();
    document.getElementById("date").innerHTML = y; //Full date Bulan/tanggal/tahun
</script>
</html>
