$(document).ready(function(){

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    //Datatable
    LoadBarang();
    function LoadBarang(){
        AlertCount();
        $('#datatable-barangRumahTangga').load('/load/table-barangRumahTangga', function(){
            $('#tbl-barangRumahTangga').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '/load/data-barangRumahTangga',
                    type: 'get'
                },
                columns: [
                    {
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: true,
                        searchable: false
                    },
                    {
                        data: 'namaBarang',
                        name: 'namaBarang'
                    },
                    {
                        data: 'kondisi',
                        name: 'kondisi'
                    },
                    {
                        data: 'jumlah',
                        name: 'jumlah'
                    },
                    {
                        data: 'aksi',
                        name: 'aksi',
                        searchable: false,
                        orderable: false
                    },
                ]
            });
        });
    }

    //open modal tambah data barang
    $("body").on("click", ".btn-add-barang", function(e){
        e.preventDefault()
        $("#tambahDataModal").modal("show")
        $("#FormTambahData").trigger("reset")
    });

    //Tambah Data
    $("body").on("submit", "#FormTambahData", function(e){
        e.preventDefault()
        var formData = new FormData();
        var namaBarang = $('input[name=namaBarang]').val();
        var kondisi = $('input[name=radioKondisi]:checked').val();
        var jumlah = $('input[name=jumlah]').val();
        var keterangan = tinymce.get('keterangan').getContent();
        var token = $('input[name=token]').val();
        formData.append('_token', token);
        formData.append('namaBarang', namaBarang);
        formData.append('kondisi', kondisi);
        formData.append('jumlah', jumlah);
        formData.append('keterangan', keterangan);

        $(".btn-close").css('display', 'none');
        $('.btn-loading').css('display', '');
        $('.btn-submit-barang').css('display', 'none');

        $.ajax({
            type: 'POST',
            url: "/store-barangRumahTangga",
            data: formData,
            processData: false,
            contentType: false,
            success: function(response){
                if(response.hasOwnProperty('error')){
                    $(".btn-close").css('display','');
                    $(".btn-loading").css('display', 'none');
                    $(".btn-submit-barang").css('display', '');
                    Swal.fire({
                        icon: 'error',
                        title: 'Oooopss...',
                        text: response.error
                    });
                }else{
                    $(".btn-close").css('display','');
                    $(".btn-loading").css('display', 'none');
                    $(".btn-submit-barang").css('display', '');
                    $("#tambahDataModal").modal("hide");
                    $("#FormTambahData").trigger("reset");
                    LoadBarang();
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

    //Open Modal Edit
    $("body").on("click",".btn-edit-barang", function(e){
        e.preventDefault();
        $("#editDataModal").modal("show");
        $("#FormEditModal").trigger("reset")

        var id = $(this).attr("data-id");
        var value = $(this).attr("data-value");

        $.ajax({
            type: "get",
            url: "/edit-barangRumahTangga/"+id,
            success: function(response){
                $("#id_barang").val(response.data.id);
                $("#EditNama").val(response.data.namaBarang);
                $('#EditradioKondisi').val(response.data.kondisi).prop('checked', true);
                $("input[type='radio'][value=" +value+ "]").prop('checked', true);
                tinymce.get('keterangan-edit').setContent(response.data.keterangan);
                $('#EditJumlah').val(response.data.jumlah);
            },
            error: function(err){
                console.log(err);
            }
        });
    });

    //Save Edit
    $("body").on("submit","#FormEditData", function(e){
        e.preventDefault();
        var formData = new FormData();
        var id = $('#id_barang').val();
        var namaBarang = $('input[name=nama-edit]').val();
        var kondisi = $('input[name=radioKondisi-edit]:checked').val();
        var jumlah = $('input[name=jumlah-edit]').val();
        var keterangan = tinymce.get('keterangan-edit').getContent();
        var token = $('input[name=token]').val();

        formData.append('_token', token);
        formData.append('namaBarang', namaBarang);
        formData.append('kondisi', kondisi);
        formData.append('jumlahBarang', jumlah);
        formData.append('keterangan', keterangan);

        $(".btn-close").css('display', 'none');
        $(".btn-loading").css('display', '');
        $(".btn-save").css('display', 'none');

        $.ajax({
            type: "POST",
            url: "/update-barangRumahTangga/"+id,
            data: formData,
            processData: false,
            contentType:false,
            success: function (response) {
                if(response.message == 'success'){
                    $(".btn-close").css('display');
                    $(".btn-loading").css('display', 'none');
                    $('.btn-submit-barang').css('display', '');
                    $('#EditDataModal').modal("hide");
                    $('#FormEditBarang').trigger("reset");
                    LoadBarang();
                    Swal.fire({
                        icon: 'success',
                        title: 'Sukses',
                        text: 'Data berhasil diubah',
                        timer: 1200,
                        showConfirmButton: false,
                    });
                }else{
                    $(".btn-close").css('display');
                    $(".btn-loading").css('display', 'none');
                    $('.btn-save').css('display', '');
                    Swal.fire({
                        icon: 'error',
                        title: 'Oooppss... ',
                        text: response, error
                    });
                }
            },
            error: function(err){
                console.log(err);
            }
        });
    });

    //Delete Data Barang
    $("body").on("click",".btn-delete-barang", function(e){
        e.preventDefault();

        var id = $(this).attr("data-id");
        var namaBarang = $(this).attr("data-nama");


        Swal.fire({
            title: 'Hapus data ' + namaBarang + '?',
            text: 'Apakah Anda yakin ingin menghapus data barang rumah tangga ' + namaBarang + '?',
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
                            Swal.fire('Deleted!', 'Data ' + namaBarang + ' berhasil dihapus.', 'success');
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

    //Show data Barang
    $("body").on("click", ".btn-show-barang", function(e){
        e.preventDefault();
        $('#ShowBarangModal').modal("show");
        tinymce.get('show-keterangan').setMode('readonly');

        var id = $(this).attr("data-id");
        var value = $(this).attr("data-value");

        $.ajax({
            type: 'GET',
            url: "/update-barangRumahTangga/"+id,
            success: function(response){

                $("#id_barang").val(response.data.id);
                $("#ShownamaBarang").val(response.data.namaBarang);
                $('#ShowradioKondisi').val(response.data.kondisi).prop('checked', true);
                $("input[type='radio'][value=" +value+ "]").prop('checked', true);
                tinymce.get('show-keterangan').setContent(response.data.keterangan);
                $('#ShowJumlah').val(response.data.jumlah);
            },
            error: function (err) {
                console.log(err);
            }
        });
    });

    //Export Modal
    $("body").on("click", "#btn-export-barang", function (e) {
        e.preventDefault();
        $("#ExportBarangModal").modal("show");
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


});

