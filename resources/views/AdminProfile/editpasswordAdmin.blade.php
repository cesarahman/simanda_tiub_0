@extends('layouts/adminLayout')
@section('title', 'Edit Password')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Password</h1>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- edit form column -->
        <div class="col-md-9 personal-info">

            <form class="form-horizontal form-edit-password" role="form">
                <div class="form-group">
                    <label class="col-md-3 control-label">Password Lama:</label>
                    <div class="col-md-8 input-group" id="show_hide_password">
                        <input class="form-control" type="password" id="password-lama" autocomplete="off" placeholder="Masukkan Password Lama...">
                        <!-- Show Hide Password Component -->
                        <a href=""><div class="input-group-addon eye">
                            <i class="fa fa-eye-slash" aria-hidden="true"></i>
                        </div></a>
                        <!-- Show Hide Password Component -->
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Password Baru:</label>
                    <div class="col-md-8 input-group" id="show_hide_password-2">
                        <input class="form-control" type="password" id="password" autocomplete="off" placeholder="Masukkan Password Baru...">
                        <!-- Show Hide Password Component -->
                        <a href=""><div class="input-group-addon eye">
                            <i class="fa fa-eye-slash" aria-hidden="true"></i>
                        </div></a>
                        <!-- Show Hide Password Component -->
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Konfirmasi Password Baru:</label>
                    <div class="col-md-8 input-group" id="show_hide_password-3">
                        <input class="form-control" type="password" id="password-confirm" autocomplete="off" placeholder="Masukkan Konfirmasi Password...">
                        <!-- Show Hide Password Component -->
                        <a href=""><div class="input-group-addon eye">
                            <i class="fa fa-eye-slash" aria-hidden="true"></i>
                        </div></a>
                        <!-- Show Hide Password Component -->
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label"></label>
                    <div class="col-md-8">
                        <input type="button" class="btn btn-primary" data-id="{{ auth()->user()->id }}" id="btn-edit-password" value="Save Changes">
                        <span></span>
                        <input type="reset" class="btn btn-default" value="Cancel">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
<!-- End of Main Content -->

@endsection



<script>
    function readURL(input, id) {
        id = id || '#file-image';
        if (input.files &amp;&amp; input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $(id).attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
            $('#file-image').removeClass('hidden');
            $('#start').hide();
        }
    }
</script>
