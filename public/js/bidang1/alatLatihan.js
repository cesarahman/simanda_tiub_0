$(document).ready(function(){

    $.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN' : $('meta[name="csrf-token]').attr('content')
        }
    });

    //Datatable
    LoadAlat();
    function LoadAlat(){
        AlertCount();
        $('#datatable-alatLatihan').load('/alatLatihan/dataTable', function(){
            var host = window.location.origin;
            $('#tbl-alatLatihan').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '/alatLatihan/data',
                    type: 'get'
                },
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex', searchable: false},
                    {data: 'namaAlat', name: 'namaAlat'},
                    {data: 'ukuran', name:'ukuran'},
                    {data: 'kondisi', name: 'kondisi'},
                    {data: 'jumlah', name: 'jumlah'},
                    {data: 'keterangan', name: 'keterangan'},
                    {data: 'tempat_simpan', name: 'tempat_simpan'},
                    {
                        data: 'gambar',
                        name: 'gambar',
                        "render": function (data, type, row) {
                            return '<img src"'+host+'/'+data+'"style="height"100px;width:100px"/>';
                        },
                        searchable: false
                    },
                    {data: 'aksi', name: 'aksi', searchable: false, orderable: false},
                ]
            });
        });
    }

    //Dropdown Tempat Penyimpanan
    $('body').on('click', '.btn-add-alat', function(e){
        e.preventDefault();
        $('#tempat-simpan').empty();
        $('#tempat-simpan').append('<option value=""> -- Pilih Tempat Penyimpanan -- </option>');
        $.ajax({
            type: 'GET',
            url: '/alatLatihan/tempat-simpan',
            contentType: false,
            processData: false,
            success: function(data){
                $('#tambahAlatModal').modal('show');
                var tempatSimpan = data.tp;
                for (var i=0; i < tempatSimpan.length; i++){
                    $("#tempat-simpan").append('<option value="'+tempatSimpan[i].id+'"> '+tempatSimpan[i].tempat_simpan+'</option>');
                }
            }
        });
    });

    //open modal tambah data alat
    $("body").on("click", "#btn-add-alat", function(e){
        e.preventDefault()
        $("#tambahALatModal").modal("show")
        $("#FormTambahAlat").trigger("reset")
    });

    //Tambah Data
    $("body").on("submit", "#FormTambahALat", function(e){
        e.preventDefault();
        var formData = new FormData();

        var token = $('input[name=token]').val();
        var namaAlat = $('input[name=namaAlat]').val();
        var ukuran = $('input[name=ukuran]').val();
        var kondisi = $('input[name=radioKondisi]:checked').val();
        var jumlah = $('input[name=jumlah]').val();
        var tempatSimpan = $('#tempat-simpan').children('option:selected').val();
        var harga = $('input[name=harga]').val();
        var keterangan = tinymce.get('keterangan').getContent();
        var gambar = $('#file-upload')[0].files[0];

        formData.append('token', token);
        formData.append('namaAlat', namaAlat);
        formData.append('ukuran', ukuran);
        formData.append('kondisi', kondisi);
        formData.append('jumlah', jumlah);
        formData.append('tempatSimpan', tempatSimpan);
        formData.append('harga', harga);
        formData.append('keterangan', keterangan);
        formData.append('gambar', gambar);

        $(".btn-close").css('display', 'none');
        $('.btn-loading').css('display', '');
        $('.btn-submit-alat').css('display', 'none');

        if(namaAlat == "" || ukuran == "" || jumlah == "" || tempatSimpan == "" || kondisi == "" || harga == "" || keterangan == ""){
            Swal.fire({
                icon: 'error',
                title: 'Oooopss...',
                text: 'Field form Tidak Boleh Kosong',
                timer: 1200,
                showConfimButton: false
            });
        }else{
            $.ajax({
                type: "POST",
                url: "/alatLatihan",
                data: formData,
                processData: false,
                contentType: false,
                success: function(data){
                    if(data.status == 'ok'){
                        Swal.fire({
                            icon: 'Success',
                            title: 'Berhasil',
                            text: 'Berhasil menambahkan data alat',
                            timer: 1200,
                            showConfimButton: false
                        });
                        $(".btn-close").css('display','');
                        $(".btn-loading").css('display', 'none');
                        $(".btn-submit-alat").css('display', '');
                        $("#tambahAlatModal").modal("hide");
                        $("#FormTambahAlat").trigger("reset");
                        LoadAlat();
                    }else if(data.status == "image_not_valid"){
                        $(".btn-close").css('display','');
                        $(".btn-loading").css('display', 'none');
                        $(".btn-submit-alat").css('display', '');
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal',
                            text: 'File harus berupa gambar (.jpg, .png, .jpeg)',
                            timer: 1200,
                            showConfimButton: false
                        });
                    }else if(data.status == 'empty_image'){
                        $(".btn-close").css('display','');
                        $(".btn-loading").css('display', 'none');
                        $(".btn-submit-alat").css('display', '');
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal',
                            text: 'Gambar tidak boleh kosong',
                            timer: 1200,
                            showConfimButton: false
                        });
                    }
                }
            });
        }
    });

    //Open Modal Edit
    $("body").on("click","#btn-edit-alat", function(e){
        e.preventDefault();
        $('#editAlatModal').modal('show');

        var id = $(this).data('id');
        var value = $(this).attr("data-value");
        var host = window.location.origin;

        $('#id_alat').val(id);
        $('#tempat-simpan-edit').empty();
        $('#tempat-simpan-edit').append('<option value=""> -- Pilih Tempat Penyimpanan -- </option>');
        $.ajax({
            type: 'GET',
            url: '/alatLatihan/tempat-simpan',
            contentType: false,
            processData: false,
            success: function(data) {
                var tempatSimpan = data.tp;
                for (var i = 0; i < tempatSimpan.length; i++) {
                    $("#tempat-simpan-edit").append('<option value="'+tempatSimpan[i].id+'"> '+ tempatSimpan[i].tempat_simpan +' </option>');
                }
                $.ajax({
                    type: 'GET',
                    url: 'alatLatihan/edit/' + id,
                    contentType: false,
                    processData: false,
                    success: function(data){
                        $('#image-edit-alat').attr('src', host+ '/' +data.data[0].gambar);
                        $('#nama-alat-edit').val(data.data[0].namaAlat);
                        $('#ukuran-edit').val(data.data[0].ukuran)
                        $('#radio-kondisi-edit').val(data.data[0].kondisi).prop('checked', true);;
                        $("input[type='radio'][value=" +value+ "]").prop('checked', true);
                        $('#jumlah-alat-edit').val(data.data[0].jumlah);
                        $('#tempat-simpan-edit option[value ='+data.data[0].id+']').attr('selected', 'selected');
                        $('#harga-alat-edit').val(data.data[0].harga);
                        tinymce.get('keterangan-edit').setContent(data.data[0].keterangan);
                    }
                });
            }
        });
    });

    //Save Edit
    $("body").on("submit", "#FormEditModal", function(e){
        e.preventDefault()
        var formData = new FormData();
        var namaAlat = $('input[name=nama-edit]').val();
        var ukuran = $('input[name=ukuran-edit]:').val();
        var kondisi = $('input[name=radioKondisi-edit]:checked').val();
        var jumlah = $('input[name=jumlah-edit]').val();
        var tempatSimpan = $('#EdittempatSimpan').children('option:selected').val();
        var harga = $('input[harga-edit]').val();
        var keterangan = tinymce.get('keterangan-edit').getContent();
        var token = $('input[name=token]').val();
        var gambar = $('#Editfile-upload')[0].files[0];

        formData.append('token', token);
        formData.append('namaAlat', namaAlat);
        formData.append('ukuran', ukuran);
        formData.append('kondisi', kondisi);
        formData.append('jumlah', jumlah);
        formData.append('tempatSimpan', tempatSimpan);
        formData.append('harga', harga);
        formData.append('keterangan', keterangan);
        formData.append('gambar', $('input[type=file]')[0].files[0]);
        formData.append('gambar', gambar);

        if(namaAlat == "" || jumlah == "" || tempatSimpan == "" || kondisi == ""){
            Swal.fire({
                icon: 'error',
                title: 'Gagal',
                text: 'Form tidak boleh kosong!!!',
                timer: 1200,
                showConfimButton: false
            });
        }else{
            $.ajax({
                type: "POST",
                url: "alatLatihan/update/" + id,
                data: formData,
                processData: false,
                contentType: false,
                success: function(data){
                    if(data.status == 'ok'){
                        Swal.fire({
                            icon: 'Successs',
                            title: 'Berhasil',
                            text: 'Berhasil mengedit data alat latihan',
                            timer: 1200,
                            showConfimButton: false
                        });
                        $('#FormEditModal').trigger('reset');
                        $('#EditAlatModal .close').click();
                        LoadAlat();
                    }else if(data.status == "image_not_vaid"){
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal',
                            text: 'File harus berupa gambar (.jpg, .png, .jpeg)',
                            timer: 1200,
                            showConfimButton: false
                        });
                    }else if(data.status == 'empty_image'){
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal',
                            text: 'Gambar tidak boleh kosong',
                            timer: 1200,
                            showConfimButton: false
                        });
                    }
                }
            });
        }
    });


    //Delete Data Barang
    $('body').on('click', '.btn-delete-alat', function(e) {
        e.preventDefault();
        var id = $(this).data('id');
        var namaAlat = $(this).data('nama');

        Swal.fire({
            title: 'Anda yakin ingin menghapus data alat ' + namaAlat + '?',
            text: "Anda tidak dapat membatalkan aksi ini!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Siap Yakin!'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    type: 'GET',
                    url: 'alatLatihan/delete/' + id,
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        if(data.status == 'deleted') {
                            Swal.fire(
                                'Deleted!',
                                'Data ' + namaBarang + ' berhasil dihapus.',
                                'success'
                                )
                            LoadAlat();
                        }
                    }
                });
            }
        })
    });

    //Show data Barang
    $("body").on("click", '.btn-show-alat', function(e){
        e.preventDefault();
        $('#showAlatModal').modal('show');
        var id = $(this).data('id');
        var value = $(this).attr("data-value");
        var host = window.location.origin;
        tinymce.get('keterangan-show').setMode('readonly');

        $('#id_alat').val(id);
        $('#tempat-simpan-show').empty();
        $('#tempat-simpan-show').append('<option value=""> -- Pilih Tempat Penyimpanan -- </option>');
        $.ajax({
            type: 'GET',
            url: '/alatLatihan/tempat-simpan',
            contentType: false,
            processData: false,
            success: function(data) {
                var tempatSimpan = data.tp;
                for (var i = 0; i < tempatSimpan.length; i++) {
                    $("#tempat-simpan-show").append('<option value="'+tempatSimpan[i].id+'"> '+ tempatSimpan[i].tempat_simpan +' </option>');
                }
                $.ajax({
                    type: 'GET',
                    url: 'alatLatihan/show/' + id,
                    contentType: false,
                    processData: false,
                    success: function(data){
                        $('#image-show-alat').attr('src', host+ '/' +data.data[0].gambar);
                        $('#nama-alat-show').val(data.data[0].namaAlat);
                        $('#ukuran-show').val(data.data[0].ukuran)
                        $('#radio-kondisi-show').val(data.data[0].kondisi).prop('checked', true);;
                        $("input[type='radio'][value=" +value+ "]").prop('checked', true);
                        $('#jumlah-alat-show').val(data.data[0].jumlah);
                        $('#tempat-simpan-show option[value ='+data.data[0].id+']').attr('selected', 'selected');
                        $('#harga-alat-show').val(data.data[0].harga);
                        tinymce.get('keterangan-show').setContent(data.data[0].keterangan);
                    }
                });
            }
        });
    });

    //Export Modal
    $("body").on("click", "#btn-export-alat", function (e) {
        e.preventDefault();
        $("#ExportAlatModal").modal("show");
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

