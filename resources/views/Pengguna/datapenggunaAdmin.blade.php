@extends('layouts/adminLayout')
@section('title', 'Data Pengguna')

@section('content')

<script type="text/javascript">
    document.getElementById('datapengguna').classList.add('active');
</script>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Pengguna</h1>
    </div>

    <!-- Content Row -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Pengguna</h6>
        </div>

        <div class="d-sm-flex align-items-center m-3">
            <a class="btn btn-primary ml-2" href="#" data-toggle="modal" data-target="#PenggunaModal">+ Add Pengguna</a>
            <!-- Export Data -->
            <a href="{{url('datapengguna/export')}}" class="btn btn-success shadow-sm ml-1"><i class="fas fa-file-excel mr-2"></i>Export</a>
            <!-- Export Data -->
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <div id="datatable-pengguna"></div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- End of Main Content -->

<!-- Add Sosmed Modal-->
<div class="modal fade" id="PenggunaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Pengguna</h5>
                <button class="close btn-close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">

                <form accept-charset="utf-8" enctype="multipart/form-data" method="post" id="FormPengguna">
                    @csrf

                    <label for="namapengguna" class="mt-2">Nama pengguna</label>
                    <input type="text" class="form-control" id="nama" name="nama">

                    <label for="email" class="mt-2">Email</label>
                    <input type="text" class="form-control" id="email" name="email">

                    <label for="password" class="mt-2">Default Password</label>
                    <input type="text" id="password" name="password" class="form-control">

                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary btn-close" type="button" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary btn-submit-pengguna">Submit</button>
                    <button class="btn btn-primary btn-loading" type="button" style="display: none;" disabled>
                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                        Memproses...
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('js-ajax')
<script type="text/javascript" src="{{asset('js/Pengguna/Pengguna.js')}}"></script>
@endsection
