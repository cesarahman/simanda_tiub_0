@extends('layouts.adminLayout')
@section('title', 'Data Alat Latihan')

@section('content')

<script type="text/javascript">
    document.getElementByName('alatLatihan').classList.add('active');
</script>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Alat Latihan</h1>
    </div>

    <!-- Content Row -->
    <div class="card shadow mb-4">
        <div class="card header py-3">
            <h6 class="m-3 font-weight-bold text-primary">Datatables Alat Latihan</h6>
        </div>

        <div class="d-sm-flex align-items-center m-3">
            <button data-toggle="modal" class="btn btn-primary ml-2 btn-add-alat" id="btn-add-alat">+ Add Alat</button>&nbsp;<button id="btn-export-alat" type="button" class="btn btn-dark"><i class="fas fa-file-export">Cetak Laporan</i></button>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <div id="datatable-alatLatihan"></div>
            </div>
        </div>

        {{-- <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr align="center">
                            <th align="center" scope="col">No</th>
                            <th scope="col">Nama Alat</th>
                            <th scope="col">Ukuran</th>
                            <th scope="col">Kondisi</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">Keterangan</th>
                            <th scope="col">Tempat Penyimpanan</th>
                            <th scope="col">Gambar</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @for ($i = 0; $i < 200; $i++)
                        <tr align="center">
                            <td width="1%" align="center">{{ $i+1 }}</td>


                            <td>Hand Glove</td>

                            <td>
                                {{-- <div class="card bg-gradient-success text-white shadow text-center" style="height: 3.5rem;">
                                    <div class="card-body">Baik</div>
                                </div>
                                2
                            </td>

                            <td>
                                baik
                            </td>

                            <td>
                                2
                            </td>

                            <td>
                                <p class="text-wrap">Baru</p>
                            </td>

                            <td>
                                <img src="{{ asset('img/handglove.JPG') }}" alt="" style="width: 100px; height: 100px;">
                            </td>

                            <td align="center">
                                <a href="#" data-toggle="modal" data-target="#editAlatModal" style="font-size: 18pt; text-decoration: none;" class="mr-3">
                                    <i class="fas fa-pen-square"></i>
                                </a>
                                <a href="#" data-toggle="modal" data-target="#deleteAlatModal" style="font-size: 18pt; text-decoration: none; color:red;">
                                    <i class="fas fa-trash"></i>
                                </a>
                                <a href="#" data-toggle="modal" data-target="#showAlatModal" style="font-size: 18pt; text-decoration: none; color:green;" class="mr-3">
                                    <i class="fas fa-eye"></i>
                                </a>
                            </td>
                        </tr>
                        @endfor
                    </tbody>
                </table>
            </div>
        </div> --}}
    </div>
</div>
<!-- End of Main Content -->

<!-- Modal Add Data -->
<div class="modal fade" id="tambahAlatModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ExampleModalLabel">Tambah Data Alat Latihan</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form accept-charset="utf-8" enctype="multipart/form-data" method="POST" id="FormTambahAlat">
                    @csrf

                    <input type="hidden" name="token" value="{{ csrf_token() }}">

                    <div class="form-group">
                        <label for="nama-alat">Nama Alat</label>
                        <input type="text" class="form-control" id="nama-alat" name="nama-alat">
                    </div>

                    <div class="form-group">
                        <label class="form-row" for="ukuran">Ukuran</label>
                        <input type="text" class="form-control" name="ukuran" id="ukuran">
                    </div>

                    <div class="form-group">
                        <label for="kondisi">Kondisi</label>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="card bg-gradient-success text-white shadow text-center" style="height: 3.5rem">
                                    <div class="card-body">
                                        <h5 class="card-title">Baik</h5>
                                        <div class="form-check">
                                            <input class="form-check-input position-relative" type="radio" name="radio-kondisi" id="radio-kondisi" value="baik" aria-label="rgKondisi">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="card bg-gradient-warning text-white shadow text-center" style="height: 3.5rem">
                                    <div class="card-body">
                                        <h5 class="card-title">Cukup</h5>
                                        <div class="form-check">
                                            <input class="form-check-input position-relative" type="radio" name="radio-kondisi" id="radio-kondisi" value="cukup" aria-label="rgKondisi">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="card bg-gradient-danger text-white small text-center" style="height: 3.5rem">
                                    <div class="card-body">
                                        <h5 class="card-title">Rusak</h5>
                                        <div class="form-check">
                                            <input class="form-check-input position-relative" type="radio" name="radio-kondisi" id="radio-kondisi" value="rusak" aria-label="rgKondisi">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <br/>

                    <div class="form-group">
                        <label for="keterangan-alat">Keterangan</label>
                        <textarea class="form-control" name="keterangan-alat" id="keterangan-alat"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="jumlah">Jumlah Alat</label>
                        <br/>
                        <input class="form-control" type="number" name="jumlah-alat" id="jumlah-alat" width="100%">
                    </div>

                    <div class="form-group">
                        <label class="mt-2" for="tempat-simpan">Tempat Penyimpanan</label>
                        <br/>
                        <select name="tempat-simpan" id="tempat-simpan" aria-placeholder="Tempat Penyimpanan" class="form-control">
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="harga">Harga</label>
                        <br/>
                        <input class="form-control" type="number" name="harga-alat" id="harga-alat">
                    </div>


                    <div class="form-group mt-3">
                        <label for="gambar">Gambar</label>
                        <input id="file-upload" type="file" name="gambar " accept="image/*" onchange="readURL(this);" aria-describedby="inputGroupFileAddon01">
                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-danger" type="button" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary btn-submit-alat">Submit</button>
                        <button class="btn btn-primary btn-loading" type="button" style="display: none;" disabled>
                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                            Memproses...
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>

<!-- Modal Edit Data -->
<div class="modal fade" id="editAlatModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ExampleModalLabel">Edit Data Data</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form accept-charset="utf-8" enctype="multipart/form-data" method="POST" action="" id="FormEditModal">
                    @csrf

                    <input type="hidden" id="id_alat">
                    <input type="hidden" name="token" value="{{ csrf_token() }}">

                    <div class="form-group">
                        <label for="nama-alat-edit">Nama Alat</label>
                        <input type="text" class="form-control" id="nama-alat-edit" name="nama-alat-edit">
                    </div>

                    <div class="form-group">
                        <label class="form-row" for="ukuran-edit">Ukuran</label>
                        <input type="text" class="form-control" name="ukuran-edit" id="ukuran-edit">
                    </div>

                    <div class="form-group">
                        <label for="kondisi">Kondisi</label>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="card bg-gradient-success text-white shadow text-center" style="height: 3.5rem">
                                    <div class="card-body">
                                        <h5 class="card-title">Baik</h5>
                                        <div class="form-check">
                                            <input class="form-check-input position-relative" type="radio" name="radio-kondisi-edit" id="radio-kondisi-edit" value="baik" aria-label="rgKondisi">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="card bg-gradient-warning text-white shadow text-center" style="height: 3.5rem">
                                    <div class="card-body">
                                        <h5 class="card-title">Cukup</h5>
                                        <div class="form-check">
                                            <input class="form-check-input position-relative" type="radio" name="radio-kondisi-edit" id="radio-kondisi-edit" value="cukup" aria-label="rgKondisi">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="card bg-gradient-danger text-white small text-center" style="height: 3.5rem">
                                    <div class="card-body">
                                        <h5 class="card-title">Rusak</h5>
                                        <div class="form-check">
                                            <input class="form-check-input position-relative" type="radio" name="radio-kondisi-edit" id="radio-kondisi-edit" value="rusak" aria-label="rgKondisi">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <br/>

                    <div class="form-group">
                        <label for="keterangan-alat-rusak">Keterangan</label>
                        <textarea class="form-control" name="keterangan-alat-rusak" id="keterangan-alat-rusak"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="jumlah-alat-edit">Jumlah Alat</label>
                        <br/>
                        <input class="form-control" type="number" name="jumlah-alat-edit" id="jumlah-alat-edit" width="100%">
                    </div>

                    <div class="form-group">
                        <label class="mt-2" for="tempat-simpan-edit">Tempat Penyimpanan</label>
                        <br/>
                        <select name="tempat-simpan-edit" id="tempat-simpan-edit" aria-placeholder="Tempat Penyimpanan" class="form-control">
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="harga-alat-edit">Harga</label>
                        <br/>
                        <input class="form-control" type="number" name="harga-alat-edit" id="harga-alat-edit">
                    </div>

                    <div class="form-group mt-4">
                        <img src="" alt="" id="image-alat-edit">
                    </div>

                    <div class="form-group mt-3">
                        <label for="gambar">Gambar</label>
                        <input id="file-upload" type="file" name="gambar " accept="image/*" onchange="readURL(this);" aria-describedby="inputGroupFileAddon01">
                    </div>


                </div>

                <div class="modal-footer">
                    <button class="btn btn-danger btn-close" type="button" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button class="btn btn-primary btn-loading" type="button" style="display: none;" disabled>
                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                        Memproses...
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- <!-- Show Data Modal --> --}}
<div class="modal fade" id="showAlatModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail Alat Rumah Tangga</h5>
                <button class="close btn-close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="form-group">
                    <label for="nama-alat-show">Nama Alat</label>
                    <input type="text" class="form-control" id="nama-alat-show" name="nama-alat-show">
                </div>

                <div class="form-group">

                    <label class="form-row" for="ukuran-show">Ukuran</label>
                    <input type="text" class="form-control" name="ukuran-show" id="ukuran-show">
                </div>

                <div class="form-group">
                    <label for="kondisi">Kondisi</label>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="card bg-gradient-success text-white shadow text-center" style="height: 3.5rem">
                                <div class="card-body">
                                    <h5 class="card-title">Baik</h5>
                                    <div class="form-check">
                                        <input class="form-check-input position-relative" type="radio" name="radio-kondisi-show" id="radio-kondisi-show" value="baik" aria-label="rgKondisi">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="card bg-gradient-warning text-white shadow text-center" style="height: 3.5rem">
                                <div class="card-body">
                                    <h5 class="card-title">Cukup</h5>
                                    <div class="form-check">
                                        <input class="form-check-input position-relative" type="radio" name="radio-kondisi-show" id="radio-kondisi-show" value="cukup" aria-label="rgKondisi">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="card bg-gradient-danger text-white small text-center" style="height: 3.5rem">
                                <div class="card-body">
                                    <h5 class="card-title">Rusak</h5>
                                    <div class="form-check">
                                        <input class="form-check-input position-relative" type="radio" name="radio-kondisi-show" id="radio-kondisi-show" value="rusak" aria-label="rgKondisi">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <br/>

                <div class="form-group">
                    <label for="keterangan-alat-rusak">Keterangan</label>
                    <textarea class="form-control" name="keterangan-alat-rusak" id="keterangan-alat-rusak"></textarea>
                </div>

                <div class="form-group">
                    <label for="jumlah-alat-show">Jumlah Alat</label>
                    <br/>
                    <input class="form-control" type="number" name="jumlah-alat-show" id="jumlah-alat-show" width="100%">
                </div>

                <div class="form-group">
                    <label class="mt-2" for="tempat-simpan-show">Tempat Penyimpanan</label>
                    <br/>
                    <select name="tempat-simpan-show" id="tempat-simpan-show" aria-placeholder="Tempat Penyimpanan" class="form-control">
                        <option align="center" value="">-- Pilih Tempat Penyimpanan --</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="harga-alat-show">Harga</label>
                    <br/>
                    <input class="form-control" type="number" name="harga-alat-show" id="harga-alat-show">
                </div>

                <div class="form-group mt-4">
                    <img src="" alt="" id="image-alat-show">
                </div>


            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary btn-close" type="button" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>


{{-- <!-- Export Data Barang --> --}}
<div class="modal fade" id="ExportAlatModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Export</h5>
                <button class="close btn-close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Pilih Format Laporan untuk di Export</div>
            <div class="modal-footer">
                <a href="/alatLatihan/excel" class="btn btn-outline-success"><i class="fas fa-file-excel"></i> Excel</a>
                <a href="/alatLatihan/pdf" class="btn btn-outline-danger"><i class="fas fa-file-pdf"></i> PDF</a>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js-ajax')
<script src="{{ asset('js/bidang1/alatLatihan.js') }}"></script>
@endsection
