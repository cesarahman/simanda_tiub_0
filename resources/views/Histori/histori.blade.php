@extends('layouts/adminLayout')
@section('title', 'History')

@section('content')
<script type="text/javascript">
    document.getElementById('history').classList.add('active');
</script>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">History</h1>
    </div>

    <!-- Content Row -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables History</h6>
        </div>
        <div class="d-sm-flex align-items-center m-3">
            <a type="submit" class="btn btn-primary ml-2" href="#" data-toggle="modal" data-target="#exportHistory"><i class="fas fa-file-export"></i> Export </a>
        </div>
        <div class="card-body">
            <div id="datatable-history"></div>
        </div>
    </div>
</div>
</div>
<!-- End of Main Content -->

<!-- Export History Modal-->
<div class="modal fade" id="exportHistory" tabindex="-1" role="dialog" aria-labelledby="ModalExport" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalExport">Export Data</h5>
                <button class="close btn-close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Pilih Format Laporan untuk di Export</div>
            <div class="modal-footer">
                <a href="/history/export-excel" class="btn btn-outline-success"><i class="fas fa-file-excel"></i> Excel</a>
                <a href="/history/export-pdf" class="btn btn-outline-danger"><i class="fas fa-file-pdf"></i> PDF</a>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js-ajax')
      <script src="{{ asset('js/history.js') }}"></script>
@endsection
