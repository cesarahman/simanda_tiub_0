@extends('layouts.adminLayout')
@section('title', 'Data Barang Rumah Tangga')

@section('content')

<script type="text/javascript">
    document.getElementById('barangRumahTangga').classList.add('active');
</script>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Barang Rumah Tangga</h1>
    </div>

    <!-- Content Row -->
    <div class="card shadow mb-4">
        <div class="card header py-3">
            <h6 class="m-3 font-weight-bold text-primary">Datatables Barang Rumah Tangga</h6>
        </div>

        <div class="d-sm-flex align-items-center m-3">
            <button class="btn btn-primary ml-2 btn-add-barang" id="btn-add-barang">+ Add Barang</button>&nbsp;<button id="btn-export-barang" type="button" class="btn btn-dark btn-export-barang"><i class="fas fa-file-export">Cetak</i></button>
        </div>

        <div class="card-body">
            <div id="datatable-barangRumahTangga"></div>
        </div>
    </div>
</div>

<!-- End of Main Content -->

<!-- Modal Add Data -->
<div class="modal fade" id="tambahDataModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ExampleModalLabel">Tambah Data</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form accept-charset="utf-8" enctype="multipart/form-data" method="POST" action="" id="FormTambahData">
                    @csrf

                    <input type="hidden" name="token" value="{{ csrf_token() }}">

                    <div class="form-group mt-3">
                        <label for="namaBarang">Nama Barang</label>
                        <input type="text" class="form-control" id="namaBarang" name="namaBarang">
                    </div>

                    <div class="form-group mt-3">
                        <label for="kondisi">Kondisi</label>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="card bg-gradient-success text-white small text-center" style="height: 3.2rem">
                                    <div class="card-body">
                                        <h5 class="card-title">Baik</h5>
                                        <div class="form-check">
                                            <input class="form-check-input position-relative" type="radio" name="radioKondisi" id="kondisibarang1" value="baik" aria-label="rgKondisi">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="card bg-gradient-warning text-white small text-center" style="height: 3.2rem">
                                    <div class="card-body">
                                        <h5 class="card-title">Cukup</h5>
                                        <div class="form-check">
                                            <input class="form-check-input position-relative" type="radio" name="radioKondisi" id="kondisibarang2" value="cukup" aria-label="rgKondisi">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="card bg-gradient-danger text-white small text-center" style="height: 3.2rem">
                                    <div class="card-body">
                                        <h5 class="card-title">Rusak</h6>
                                            <div class="form-check">
                                                <input class="form-check-input position-relative" type="radio" name="radioKondisi" id="kondisibarang3" value="rusak" aria-label="rgKondisi">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </h5>
                    </div>

                    <br/>

                    <div class="form-group mt-3">
                        <label for="keterangan">Keterangan</label>
                        <textarea class="form-control" name="keterangan" id="keterangan"></textarea>
                    </div>

                    <div class="form-group mt-3">
                        <label for="jumlah">Jumlah Barang</label>
                        <input type="number" name="jumlah" id="jumlah">
                    </div>

                </div>

                <div class="modal-footer">
                    <button class="btn btn-danger" type="button" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary btn-submit-barang">Submit</button>
                    <button class="btn btn-primary btn-loading" type="button" style="display: none;" disabled>
                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                        Memproses...
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Edit Data -->
<div class="modal fade" id="editDataModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ExampleModalLabel">Edit Data Data</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body form-group">
                <form accept-charset="utf-8" enctype="multipart/form-data" method="post" id="formEditModal">
                    @csrf

                    <input type="hidden" id="id_anggota">
                    <input type="hidden" name="token" value="{{ csrf_token() }}">

                    <div class="form-group mt-3">
                        <label for="EditNamaBarang">Nama Barang</label>
                        <input type="text" class="form-control" id="EditNama" name="nama-edit">
                    </div>

                    <div class="form-group mt-3">
                        <label for="Editkondisi">Kondisi</label>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="card bg-gradient-success text-white shadow text-center" style="height: 3.5rem">
                                    <div class="card-body">
                                        <h5 class="card-title">Baik</h5>
                                        <div class="form-check">
                                            <input class="form-check-input position-relative" type="radio" name="radioKondisi-edit" id="EditradioKondisi" value="baik" aria-label="rgKondisi" checked="checked">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="card bg-gradient-warning text-white shadow text-center" style="height: 3.5rem">
                                    <div class="card-body">
                                        <h5 class="card-title">Cukup</h5>
                                        <div class="form-check">
                                            <input class="form-check-input position-relative" type="radio" name="radioKondisi-edit" id="EditradioKondisi" value="cukup" aria-label="rgKondisi" checked="checked">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="card bg-gradient-danger text-white small text-center" style="height: 3.5rem">
                                    <div class="card-body">
                                        <h5 class="card-title">Rusak</h5>
                                        <div class="form-check">
                                            <input class="form-check-input position-relative" type="radio" name="radioKondisi-edit" id="EditradioKondisi" value="rusak" aria-label="rgKondisi" checked="checked">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group mt-3">
                        <label for="keterangan-edit">Keterangan</label>
                        <textarea class="form-control" id="keterangan-edit" name="keterangan-edit"></textarea>
                    </div>

                    <div class="form-group mt-3">
                        <label for="jumlah-edit">Jumlah Barang</label>
                        <input type="number" id="EditJumlah" name="jumlah-edit">
                    </div>

                    {{-- <input type="hidden" id="penyimpanan_id">
                    <input type="hidden" id="kategori_id"> --}}

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

{{-- <!-- Show Data Modal --> --}}
<div class="modal fade" id="ShowBarangModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail Barang Rumah Tangga</h5>
                <button class="close btn-close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">

                <input type="hidden" id="id_barang">

                <div class="form-group">
                    <label for="NamaBarang">Nama Barang</label>
                    <input type="text" class="form-control" id="ShownamaBarang" name="NamaBarang" disabled>
                </div>

                <div class="form-group">
                    <label for="Editkondisi">Kondisi</label>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="card bg-gradient-success text-white shadow text-center" style="height: 3.5rem">
                                <div class="card-body">
                                    <h5 class="card-title">Baik</h5>
                                    <div class="form-check">
                                        <input class="form-check-input position-relative" type="radio" name="show-radioKondisi" id="ShowradioKondisi" value="baik" aria-label="rgKondisi" disabled checked>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="card bg-gradient-warning text-white shadow text-center" style="height: 3.5rem">
                                <div class="card-body">
                                    <h5 class="card-title">Cukup</h5>
                                    <div class="form-check">
                                        <input class="form-check-input position-relative" type="radio" name="show-radioKondisi" id="show-radioKondisi" value="cukup" aria-label="rgKondisi" disabled checked>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="card bg-gradient-danger text-white small text-center" style="height: 3.5rem">
                                <div class="card-body">
                                    <h5 class="card-title">Rusak</h5>
                                    <div class="form-check">
                                        <input class="form-check-input position-relative" type="radio" name="show-radioKondisi" id="show-radioKondisi" value="rusak" aria-label="rgKondisi" disabled checked>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="show-keterangan">keterangan</label>
                    <textarea class="form-control" name="show-keterangan" id="show-keterangan" disabled></textarea>
                </div>

                <div class="form-group">
                    <label for="show-jumlah">Jumlah Barang</label>
                    <input type="number" name="show-jumlah" id="ShowJumlah" disabled>
                </div>

            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary btn-close" type="button" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>


{{-- <!-- Export Data Barang --> --}}
<div class="modal fade" id="ExportBarangModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Export</h5>
                <button class="close btn-close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">X</span>
                </button>
            </div>
            <div class="modal-body">Pilih Format Laporan untuk di Export</div>
            <div class="modal-footer">
                <a href="{{ route('exportExcel') }}" class="btn btn-outline-success"><i class="fas fa-file-excel"></i> Excel</a>
                <a href="{{ route('exportPDF') }}" class="btn btn-outline-danger"><i class="fas fa-file-pdf"></i> PDF</a>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js-ajax')
<script src="{{ asset('js/bidang1/barangRumahTangga.js') }}"></script>
@endsection
