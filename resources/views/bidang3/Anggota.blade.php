@extends('layouts.adminLayout')
@section('title', 'Data Anggota')

@section('content')

<script type="text/javascript">
    document.getElementByName('anggota').classList.add('active');
</script>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Anggota</h1>
    </div>

    <!-- Content Row -->
    <div class="card shadow mb-4">
        <div class="card header py-3">
            <h6 class="m-3 font-weight-bold text-primary">Datatables Anggota</h6>
        </div>

        <div class="d-sm-flex align-items-center m-3">
            <button data-toggle="modal"  class="btn btn-primary ml-2 btn-add-anggota" id="btn-add-anggota">+ Add Anggota</button>&nbsp;<button id="btn-export-anggota" type="button" class="btn btn-dark"><i class="fas fa-file-export">Cetak Laporan</i></button>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <div id="datatable-anggota"></div>
            </div>
        </div>
        {{-- <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr align="center">
                            <th align="center" scope="col">No</th>
                            <th scope="col">NIM</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Fakultas</th>
                            <th scope="col">Angkatan</th>
                            <th scope="col">SPAB</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @for ($i = 0; $i < 200; $i++)
                        <tr align="center">
                            <td width="1%" align="center">{{ $i+1 }}</td>

                            <td>
                                183140914111074
                            </td>

                            <td>
                                Cesa Rahman Lathif
                            </td>

                            <td>
                                Program Pendidikan Vokasi
                            </td>

                            <td>
                                2018
                            </td>

                            <td>
                                101
                            </td>


                            <td align="center">
                                <a href="#" data-toggle="modal" data-target="#editAnggotaModal" style="font-size: 18pt; text-decoration: none;" class="mr-3">
                                    <i class="fas fa-pen-square"></i>
                                </a>
                                <a href="#" data-toggle="modal" data-target="#deleteAnggotaModal" style="font-size: 18pt; text-decoration: none; color:red;">
                                    <i class="fas fa-trash"></i>
                                </a>
                                <a href="#" data-toggle="modal" data-target="#showAnggotaModal" style="font-size: 18pt; text-decoration: none; color:green;" class="mr-3">
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
<div class="modal fade" id="tambahAnggotaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ExampleModalLabel">Tambah Data Anggota</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form accept-charset="utf-8" enctype="multipart/form-data" method="POST" action="" id="formTambahAnggota">
                    @csrf

                    <input type="hidden" name="token" value="{{ csrf_token() }}">

                    <div class="form-group">
                        <label for="nama">Nama Anggota</label>
                        <input type="text" class="form-control" id="nama" name="nama">
                    </div>

                    <div class="form-group">
                        <label for="nim">NIM</label>
                        <input type="string" class="form-control" name="nim" id="nim">
                    </div>

                    <div class="form-row form-group">
                        <div class="form-group col-md-6">
                            <label for="tempat_lahir">Tempat Lahir</label>
                            <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="tgl_lahir">Tanggal Lahir</label>
                            <input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="agama">Agama</label>
                        <select name="agama" id="agama" aria-placeholder="agama" class="form-control">
                            <option align="center" value="">-- Pilih Agama --</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="alamat_asal">Alamat Asal</label>
                        <input type="text" class="form-control" name="alamat_asal" id="alamat_asal">
                    </div>

                    <div class="form-group">
                        <label for="alamat_malang-edit">Alamat di Malang</label>
                        <input type="text" class="form-control" name="alamat_malang" id="alamat-malang">
                    </div>

                    <div class="form-row form-group">
                        <div class="form-group col-md-6">
                            <label for="no_telp-edit">Nomor Telepon/WA</label>
                            <input class="form-control" type="text" name="no_telp-edit" id="no_telp-edit">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="id_line-">ID Line</label>
                            <input class="form-control" type="text" name="id_line-" id="id_line-">
                        </div>
                    </div>

                    <div class="form-row form-group">
                        <div class="form-group col-7">
                            <label for="fakultas">Fakultas</label>
                            <select name="fakultas" id="fakultas" aria-placeholder="Fakultas" class="form-control">
                                <option align="center" value="">-- Pilih Fakultas --</option>
                            </select>
                        </div>

                        <div class="form-group col-5">
                            <label for="prodi_jurusan">Program Studi/Jurusan</label>
                            <input type="text" class="form-control" name="prodi_jurusan" id="prodi_jurusan">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="angkatan">Angkatan</label>
                        <input type="text" class="form-control" name="angkatan" id="angkatan">
                    </div>

                    <div class="form-group">
                        <label for="spab">SPAB</label>
                        <input type="text" class="form-control" name="spab" id="spab">
                    </div>

                    <div class="form-group">
                        <label for="tingkatan">Tingkatan Terakhir</label>
                        <input type="text" class="form-control" name="tingkatan" id="tingkatan">
                    </div>

                    <div class="form-group mt-3">
                        <label for="foto">Foto</label>
                        <input id="foto" type="file" name="foto " accept="image/*" onchange="readURL(this);" aria-describedby="inputGroupFileAddon01">
                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-danger" type="button" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary btn-submit">Submit</button>
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


<!-- Modal Edit Data -->
<div class="modal fade" id="editAnggotaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ExampleModalLabel">Edit Data Anggota</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form accept-charset="utf-8" enctype="multipart/form-data" method="POST" action="" id="FormEditModal">
                    @csrf

                    <input type="hidden" name="id_anggota" id="id_anggota">
                    <input type="hidden" name="token" value="{{ csrf_token() }}">

                    <div class="form-group">
                        <label for="nama-edit">Nama Anggota</label>
                        <input type="text" class="form-control" id="nama-edit" name="nama-edit">
                    </div>

                    <div class="form-group">
                        <label for="nim-edit">NIM</label>
                        <input type="string" class="form-control" name="nim-edit" id="nim-edit">
                    </div>

                    <div class="form-row form-group">
                        <div class="form-group col-md-6">
                            <label for="tempat_lahir-edit">Tempat Lahir</label>
                            <input type="text" class="form-control" name="tempat_lahir-edit" id="tempat_lahir-edit">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="tgl_lahir-edit">Tanggal Lahir</label>
                            <input type="date" class="form-control" name="tgl_lahir-edit" id="tgl_lahir-edit">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="agama-edit">Agama</label>
                        <select name="agama-edit" id="agama-edit" aria-placeholder="agama-edit" class="form-control">
                            <option align="center" value="">-- Pilih Agama --</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="alamat_asal-edit">Alamat Asal</label>
                        <input type="text" class="form-control" name="alamat_asal-edit" id="alamat_asal-edit">
                    </div>

                    <div class="form-group">
                        <label for="alamat_malang-edit">Alamat di Malang</label>
                        <input type="text" class="form-control" name="alamat_malang-edit" id="alamat-malang">
                    </div>

                    <div class="form-row form-group">
                        <div class="form-group col-md-6">
                            <label for="no_telp-edit">Nomor Telepon/WA</label>
                            <input class="form-control" type="text" name="no_telp-edit" id="no_telp-edit">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="id_line-edit">ID Line</label>
                            <input class="form-control" type="text" name="id_line-edit" id="id_line-edit">
                        </div>
                    </div>

                    <div class="form-row form-group">
                        <div class="form-group col-7">
                            <label for="fakultas-edit">Fakultas</label>
                            <select name="fakultas-edit" id="fakultas-edit" aria-placeholder="Fakultas" class="form-control">
                                <option align="center" value="">-- Pilih Fakultas --</option>
                            </select>
                        </div>

                        <div class="form-group col-5">
                            <label for="prodi_jurusan-edit">Program Studi/Jurusan</label>
                            <input type="text" class="form-control" name="prodi_jurusan-edit" id="prodi_jurusan-edit">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="angkatan-edit">Angkatan</label>
                        <input type="text" class="form-control" name="angkatan-edit" id="angkatan-edit">
                    </div>

                    <div class="form-group">
                        <label for="spab-edit">SPAB</label>
                        <input type="text" class="form-control" name="spab-edit" id="spab-edit">
                    </div>

                    <div class="form-group">
                        <label for="tingkatan-edit">Tingkatan Terakhir</label>
                        <input type="text" class="form-control" name="tingkatan-edit" id="tingkatan-edit">
                    </div>

                    <div class="form-group mt-4">
                        <img src="" alt="" id="image-anggota-edit">
                    </div>

                    <div class="form-group mt-3">
                        <label for="foto">Foto</label>
                        <input id="foto" type="file" name="foto " accept="image/*" onchange="readURL(this);" aria-describedby="inputGroupFileAddon01">
                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-danger" type="button" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary btn-save">Submit</button>
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


    {{-- <!-- Show Data Modal --> --}}
    <div class="modal fade" id="showAnggotaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        <label for="nama-show">Nama Anggota</label>
                        <input type="text" class="form-control" id="nama-show" name="nama-show">
                    </div>

                    <div class="form-group">
                        <label class="form-row" for="nim-show">NIM</label>
                        <input type="text" class="form-control" name="nim-show" id="nim-show">
                    </div>

                    <div class="form-group">
                        <label for="tempat-lahir-show">Tempat Lahir</label>
                        <input type="text" class="form-control" name="tempat-lahir-show" id="tempat-lahir-show">
                    </div>

                    <div class="form-group">
                        <label for="tgl-lahir-show">Tanggal Lahir</label>
                        <input type="date" class="form-control" name="tgl-lahir-show" id="tgl-lahir-show">
                    </div>

                    <div class="form-group">
                        <label for="agama-show">Agama</label>
                        <select name="agama-show" id="agama-show" aria-placeholder="agama-show" class="form-control">
                            <option align="center" value="">-- Pilih Agama --</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="alamat-asal-show">Alamat Asal</label>
                        <textarea class="form-control" name="alamat-asal-show" id="alamat-asal-show"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="alamat-malang-show">Alamat di Malang</label>
                        <textarea class="form-control" name="alamat-malang-show" id="alamat-malang-show"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="notelp-show">Nomor Telepon/WA</label>
                        <input class="form-control" type="text" name="notelp-show" id="notelp-show">
                    </div>

                    <div class="form-group">
                        <label for="id-line-show">ID Line</label>
                        <input class="form-control" type="text" name="id-line-show" id="id-line-show">
                    </div>

                    <div class="form-group">
                        <label for="fakultas-show">Fakultas</label>
                        <select name="fakultas-show" id="fakultas-show" aria-placeholder="Fakultas-show" class="form-control">
                            <option align="center" value="">-- Pilih Fakultas --</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="prodi-jurusan-show">Program Studi/Jurusan</label>
                        <input type="text" class="form-control" name="prodi-jurusan-show" id="prodi-jurusan-show">
                    </div>

                    <div class="form-group">
                        <label for="angkatan-show">Angkatan</label>
                        <input type="text" class="form-control years-picker" name="angkatan-show" id="angkatan-show">
                    </div>

                    <div class="form-group">
                        <label for="spab-show">SPAB</label>
                        <input type="text" class="form-control" name="spab-show" id="spab-show">
                    </div>

                    <div class="form-group">
                        <label for="tingkatan-show">Tingkatan</label>
                        <input type="text" class="form-control" name="tingkatan-show" id="tingkatan-show">
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
    <div class="modal fade" id="ExportAnggotaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <a href="/" class="btn btn-outline-success"><i class="fas fa-file-excel"></i> Excel</a>
                    <a href="/" class="btn btn-outline-danger"><i class="fas fa-file-pdf"></i> PDF</a>
                </div>
            </div>
        </div>
    </div>


    @endsection

    @section('js-ajax')
    <script src="{{ asset('js/bidang3/anggota.js') }}"></script>
    @endsection
