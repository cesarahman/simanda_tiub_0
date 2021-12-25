@extends('layouts.adminLayout')
@section('title', 'Data Prestasi')

@section('content')

<script type="text/javascript">
    document.getElementById('prestasi').classList.add('active');
</script>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Prestasi</h1>
    </div>

    <!-- Content Row -->
    <div class="card shadow mb-4">
        <div class="card header py-3">
            <h6 class="m-3 font-weight-bold text-primary">Datatables Prestasi</h6>
        </div>

        <div class="d-sm-flex align-items-center m-3">
            <button data-toggle="modal" class="btn btn-primary ml-2 btn-add-prestasi" id="btn-add-prestasi">+ Add Prestasi</button>&nbsp;<button data-toggle="modal" id="btn-export-prestasi" type="button" class="btn btn-dark"><i class="fas fa-file-export">Cetak Laporan</i></button>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <div id="datatable-prestasi"></div>
            </div>
        </div>
        {{-- <div class="card-body">
            <div class="table-responsive-lg">
                <table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr align="center">
                            <th align="center" scope="col">No</th>
                            <th scope="col">Tahun</th>
                            <th scope="col">Nama Kejuaraan</th>
                            <th scope="col">Capaian</th>
                            <th scope="col">Kategori</th>
                            <th scope="col">Kelas</th>
                            <th scope="col">Nama Atlet</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @for ($i = 0; $i < 200; $i++)
                        <tr align="center">
                            <td width="1%" align="center">{{ $i+1 }}</td>

                            <td>
                                2019
                            </td>

                            <td>PEKAN OLAHRAGA PROVINSI VI JATIM</td>

                            <td>
                                JUARA 1
                            </td>

                            <td>
                                PRESTASI
                            </td>

                            <td>
                                U-63 KG
                            </td>

                            <td>
                                ALFIAN DZULFIKAR
                            </td>


                            <td align="center">
                                <a href="#" data-toggle="modal" data-target="#editPrestasiModal" style="font-size: 18pt; text-decoration: none;" class="mr-3">
                                    <i class="fas fa-pen-square"></i>
                                </a>
                                <a href="#" data-toggle="modal" data-target="#deletePrestasiModal" style="font-size: 18pt; text-decoration: none; color:red;">
                                    <i class="fas fa-trash"></i>
                                </a>
                                <a href="#" data-toggle="modal" data-target="#showPrestasiModal" style="font-size: 18pt; text-decoration: none; color:green;" class="mr-3">
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
<div class="modal fade" id="tambahPrestasiModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ExampleModalLabel">Tambah Data Prestasi</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form accept-charset="utf-8" enctype="multipart/form-data" method="POST" id="FormTambahPrestasi">
                    @csrf

                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="form-group">
                        <label for="tahun">Tahun Kejuaraan</label>
                        <input type="text" class="form-control years-picker" id="tahun" name="tahun">
                    </div>

                    <div class="form-group">
                        <label for="namaKejuaraan">Nama Kejuaraan</label>
                        <input type="text" class="form-control" name="namaKejuaraan" id="namaKejuaraan">
                    </div>

                    <div class="form-group">
                        <label for="capaian">Capaian</label>
                        <input type="text" class="form-control" name="capaian" id="capaian">
                    </div>


                    <div class="form-group">
                        <label for="kategori">Kategori</label>
                        <input type="text" class="form-control" name="kategori" id="kategori"></input type="text">
                    </div>

                    <div class="form-group">
                        <label for="kelas">Kelas</label>
                        <input class="form-control" type="text" name="kelas" id="kelas" width="100%">
                    </div>

                    <div class="form-group">
                        <label for="namaAtlet">Nama Atlet</label>
                        <input class="form-control" type="text" name="namaAtlet" id="namaAtlet">
                    </div>

                        <div class="modal-footer">
                            <button class="btn btn-danger" type="button" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary btn-submit-prestasi">Submit</button>
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
<div class="modal fade" id="editPrestasiModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ExampleModalLabel">Edit Data Prestasi</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form accept-charset="utf-8" enctype="multipart/form-data" method="POST" action="" id="formEditPrestasi">
                    @csrf

                    <input type="hidden" id="id_prestasi">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="form-group">
                        <label for="tahun-edit">Tahun</label>
                        <input type="text" class="form-control" id="tahun-edit" name="tahun-edit">
                    </div>

                    <div class="form-group">
                        <label class="form-row" for="namaKejuaraan-edit">Nama Kejuaraan</label>
                        <input type="text" class="form-control" name="namaKejuaraan-edit" id="namaKejuaraan-edit">
                    </div>

                    <div class="form-group">
                        <label for="capaian-edit">Capaian</label>
                        <input type="text" class="form-control" name="capaian-edit" id="capaian-edit">
                    </div>


                    <div class="form-group">
                        <label for="kategori-edit">Kategori</label>
                        <input type="text" class="form-control" name="kategori-edit" id="kategori-edit">
                    </div>

                    <div class="form-group">
                        <label for="kelas-edit">Kelas</label>
                        <input class="form-control" type="text" name="kelas-edit" id="kelas-edit" width="100%">
                    </div>

                    <div class="form-group">
                        <label for="namaAtlet-edit">Nama Atlet</label>
                        <input class="form-control" type="text" name="namaAtlet-edit" id="namaAtlet-edit">
                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-secondary btn-close" type="button" data-dismiss="modal">Cancel</button>
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

{{-- <!-- Export Data Prestasi --> --}}
<div class="modal fade" id="ExportPrestasiModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cetak Laporan</h5>
                <button class="close btn-close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">X</span>
                </button>
            </div>
            <div class="modal-body">Pilih format Laporan untuk di dicetak</div>
            <div class="modal-footer">
                <a href="/prestasi/export/excel" class="btn btn-outline-success"><i class="fas fa-file-excel"></i> Excel</a>
                <a href="/prestasi/export/pdf" class="btn btn-outline-danger"><i class="fas fa-file-pdf"></i> PDF</a>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js-ajax')
<script src="{{ asset('js/datepicker.js') }}"></script>
<script src="{{ asset('js/bidang2/prestasi.js') }}"></script>
@endsection
