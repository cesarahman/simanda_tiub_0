$(document).ready(function(){
    $.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN' : $('meta[name="csrf-token]').attr('content')
        }
    });


    //Load DataTable
    LoadAnggota();
    function LoadAnggota(){
        AlertCount();
        $('#datatable-anggota').load('anggota/dataTable', function(){
            var host = window.location.origin;
            $('#tbl-anggota').DataTable({
                processing: true,
                serverSide: true,
                ajax:{
                    url: '/anggota/data',
                    type: "GET"
                },
                columns:[
                    {data:'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable:false},
                    {data: 'foto', render: function(data, type, row) {
							return '<img  class = "rounded mx-auto d-block" height="150px" src="'  + host + '/'+ data + '" />';}},
                    {data: 'nim', name:'nim'},
                    {data: 'nama', name:'nama'},
                    {data: 'namaFakultas', name:'namaFakultas'},
                    {data: 'angkatan', name:'angkatan'},
                    {data: 'spab', name:'spab'},
                    {data: 'aksi', name:'aksi', searchable: false, orderable:false},
                ]
            });
        });
    }

    //Dropdown Agama
    $('body').on('click', '#btn-add-anggota', function(e){
        e.preventDefault();
        $('#agama').empty();
        $('#agama').append('<option value=""> -- Pilih Agama -- </option>');
        $.ajax({
            type: 'GET',
            url: '/anggota/agama',
            contentType: false,
            processData: false,
            success: function(data){
                $('#tambahAnggotaModal').modal('show');
                var agama = data.ag;
                for (var i=0; i < agama.length; i++){
                    $("#agama").append('<option value="'+agama[i].id+'"> '+agama[i].nama_agama+'</option>');
                }
            }
        });
    });

    //Dropdown Fakultas
    $('body').on('click', '#btn-add-anggota', function(e){
        e.preventDefault();
        $('#fakultas').empty();
        $('#fakultas').append('<option value=""> -- Pilih Fakultas -- </option>');
        $.ajax({
            type: 'GET',
            url: '/anggota/fakultas',
            contentType: false,
            processData: false,
            success: function(data){
                $('#tambahAnggotaModal').modal('show');
                var fakultas = data.fk;
                for (var i=0; i < fakultas.length; i++){
                    $("#fakultas").append('<option value="'+fakultas[i].id+'">'+fakultas[i].initial+' - '+fakultas[i].namaFakultas+'</option>');
                }
            }
        });
    });

    //Open Modal Add Data
    $("body").on("click", ".btn-add-anggota", function(e){
        e.preventDefault();
        $("#tambahAnggotaModal").modal("show");
        $("#formTambahAnggota").trigger("reset");
    });

    //Save Data
    $("body").on("submit", "#formTambahAnggota", function(e){
        e.preventDefault();
        var formData = new FormData();

        var token = $('input[name=token]').val();
        var nama = $('input[name=nama]').val();
        var nim = $('input[name=nim]').val();
        var tempat_lahir = $('input[name=tempat_lahir]').val();
        var tgl_lahir = $('input[name=tgl_lahir]').val();
        var agama_id = $('#agama').children('option:selected').val();
        var alamat_asal = $('input[name=alamat_asal]').val();
        var alamat_malang = $('input[name=alamat_malang]').val();
        var no_telp = $('input[name=no_telp]').val();
        var id_line = $('input[name=id_line]').val();
        var fakultas_id = $('#fakultas').children('option:selected').val();
        var prodi_jurusan = $('input[name=prodi_jurusan]').val();
        var angkatan = $('input[name=angkatan]').val();
        var spab = $('input[name=spab]').val();
        var tingkatan = $('input[name=tingkatan]').val();

        formData.append('token', token);
        formData.append('nama', nama );
        formData.append('nim', nim);
        formData.append('tempat_lahir', tempat_lahir);
        formData.append('tgl_lahir', tgl_lahir);
        formData.append('agama_id', agama_id);
        formData.append('alamat_asal', alamat_asal);
        formData.append('alamat_malang', alamat_malang);
        formData.append('no_telp', no_telp);
        formData.append('id_line', id_line);
        formData.append('fakultas_id', fakultas_id);
        formData.append('prodi_jurusan', prodi_jurusan);
        formData.append('angkatan', angkatan);
        formData.append('spab', spab);
        formData.append('tingkatan', tingkatan);
        formData.append('foto', $('input[type=file]')[0].files[0]);

        $(".btn-close").css('display', 'none');
        $('.btn-loading').css('display', '');
        $('.btn-submit').css('display', 'none');

        $.ajax({
            type: 'POST',
            url: "/anggota",
            data: formData,
            processData: false,
            contentType: false,
            success: function(response){
                if(response.hasOwnProperty('error')){
                    $(".btn-close").css('display','');
                    $(".btn-loading").css('display', 'none');
                    $(".btn-submit").css('display', '');
                    Swal.fire({
                        icon: 'error',
                        title: 'Oooopss...',
                        text: response.error
                    });
                }else{
                    $(".btn-close").css('display','');
                    $(".btn-loading").css('display', 'none');
                    $(".btn-submit").css('display', '');
                    $("#tambahAnggotaModal").modal("hide");
                    $("#formTambahAnggota").trigger("reset");
                    LoadAnggota();
                    Swal.fire({
                        icon: 'success',
                        title: 'Sukses',
                        text: 'Berhasil Menambahkan Data',
                        timer: 1200,
                        showConfirmButton: false
                    });
                }

            },
            error: function(err){
                console.log(err);
            }
        });
    });


    //Dropdown Agama
    $('body').on('click', '#btn-edit-anggota', function(e){
        e.preventDefault();
        $('#agama-edit').empty();
        $('#agama-edit').append('<option value=""> -- Pilih Agama -- </option>');
        $.ajax({
            type: 'GET',
            url: '/anggota/agama',
            contentType: false,
            processData: false,
            success: function(data){
                $('#editAnggotaModal').modal('show');
                var agama = data.ag;
                for (var i=0; i < agama.length; i++){
                    $("#agama-edit").append('<option value="'+agama[i].id+'"> '+agama[i].nama_agama+'</option>');
                }
            }
        });
    });

    //Dropdown Fakultas
    $('body').on('click', '#btn-edit-anggota', function(e){
        e.preventDefault();
        $('#fakultas-edit').empty();
        $('#fakultas-edit').append('<option value=""> -- Pilih Fakultas -- </option>');
        $.ajax({
            type: 'GET',
            url: '/anggota/fakultas',
            contentType: false,
            processData: false,
            success: function(data){
                $('#editAnggotaModal').modal('show');
                var fakultas = data.fk;
                for (var i=0; i < fakultas.length; i++){
                    $("#fakultas-edit").append('<option value="'+fakultas[i].id+'">'+fakultas[i].initial+' - '+fakultas[i].nama_fakultas+'</option>');
                }
            }
        });
    });

    $("body").on("click", ".btn-edit-anggota", function(e){
        e.preventDefault();
        $("#editAnggotaModal").modal("show");
        $("#formEditAnggota").trigger("reset");

        var id = $(this).attr("data-id");

        $.ajax({
            type: 'GET',
            url: '/anggota/edit/' + id,
            success: function(response){
                $('#id_anggota').val(response.data.id);
                $('#nama-edit').val(response.data.nama);
                $('#nim-edit').val(response.data.nim);
                $('#tempat_lahir-edit').val(response.data.tempat_lahir);
                $('#tgl_lahir-edit').val(response.data.tgl_lahir);
                $('#agama-edit').val(response.data.agama_id);
                $('#alamat_asal-edit').val(response.data.alamat_asal);
                $('#alamat_malang-edit').val(response.data.alamat_malang);
                $('#no_telp-edit').val(response.data.no_telp);
                $('#id_line-edit').val(response.data.id_line);
                $('#fakultas-edit').val(response.data.fakultas_id);
                $('#prodi_jurusan-edit').val(response.data.prodi_jurusan);
                $('#angkatan-edit').val(response.data.angkatan);
                $('#spab-edit').val(response.data.spab);
                $('#tingkatan-edit').val(response.data.tingkatan);
                $('#image-anggota-edit').val(response.data.nama);


            }
        });





    });



    $("body").on("click",".btn-delete-anggota", function(e){
        e.preventDefault();

        var id = $(this).attr("data-id");
        var namaAnggota = $(this).attr("data-nama");


        Swal.fire({
            title: 'Hapus data ' + namaAnggota + '?',
            text: 'Apakah Anda yakin ingin menghapus data barang rumah tangga ' + namaAnggota + '?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Siap Yakin!'
        }).then((result) => {
            if(result.value){
                $.ajax({
                    type: 'get',
                    url: '/destroy-barangRumahTangga/' + id,
                    success: function(response){
                        if (response.status == 'deleted') {
                            Swal.fire('Deleted!', 'Data ' + namaAnggota + ' berhasil dihapus.', 'success');
                            // console.log(response);
                            LoadBarang();
                        }
                    },
                    error: function(err){
                        console.log(err);
                    }
                });
            }
        });
    });


    //Export Modal
    $("body").on("click", "#btn-export-anggota", function (e) {
        e.preventDefault();
        $("#ExportAnggotaModal").modal("show");
    });

    //Alert History Count
    function AlertCount() {
        $.ajax({
            type: "get",
            url: "/count-today-history-alert",
            success: function(response){
                $("#jumlah_history_today").html(response.total);
            },
            error: function(err){
                console.log(err);
            }
        });
    }
})
