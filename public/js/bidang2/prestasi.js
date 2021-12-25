$(document).ready(function(){

    $.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    //DataTable
    LoadPrestasi();
    function LoadPrestasi(){
        AlertCount();
        $('#datatable-prestasi').load('/prestasi/dataTable', function(){
            $('#tbl-prestasi').DataTable({
                processing: true,
                serverSide: true,
                ajax:{
                    type: "GET",
                    url: "/prestasi/data",
                },
                columns:[
                    {data:'DT_RowIndex', name:'DT_RowIndex', orderable: false, searchable: false},
                    {data:'tahun', name:'tahun'},
                    {data:'namaKejuaraan', name:'namaKejuaraan'},
                    {data:'capaian', name:'capaian'},
                    {data:'kategori', name:'kategori'},
                    {data:'kelas', name:'kelas'},
                    {data:'namaAtlet', name:'namaAtlet'},
                    {data:'aksi', name:'aksi'}
                ]
            });
        });
    }

    //Open Modal tambah Prestasi
    $("body").on("click",".btn-add-prestasi", function(e){
        e.preventDefault()
        $("#tambahPrestasiModal").modal("show")
        $("#FormTambahPrestasi").trigger("reset")

    })

    //Tambah Prestasi
    $("body").on("submit", "#FormTambahPrestasi", function(e){
        e.preventDefault();
        var formData = new FormData();
        var token = $('input[name=_token]').val();
        var tahun = $('input[name=tahun]').val();
        var namaKejuaraan = $('input[name=namaKejuaraan]').val();
        var capaian = $('input[name=capaian]').val();
        var kategori = $('input[name=kategori]').val();
        var kelas = $('input[name=kelas]').val();
        var namaAtlet = $('input[name=namaAtlet]').val();

        formData.append('_token', token);
        formData.append('tahun', tahun);
        formData.append('namaKejuaraan', namaKejuaraan);
        formData.append('capaian', capaian);
        formData.append('kategori', kategori);
        formData.append('kelas', kelas);
        formData.append('namaAtlet', namaAtlet);

        $(".btn-close").css('display','none');
        $(".btn-loading").css('display','');
        $(".btn-submit-prestasi").css('display','none');

        $.ajax({
            type: "POST",
            url: "/prestasi/store",
            data: formData,
            processData: false,
            contentType: false,
            success: function(response){
                if(response.hasOwnProperty('error')){
                    $(".btn-close").css('display','');
                    $(".btn-loading").css('display', 'none');
                    $(".btn-submit-prestasi").css('display', '');
                    Swal.fire({
                        icon: 'error',
                        title: 'Oooopss...',
                        text: response.error
                    });
                }else{
                    $(".btn-close").css('display','');
                    $(".btn-loading").css('display', 'none');
                    $(".btn-submit-prestasi").css('display', '');
                    $("#tambahPrestasiModal").modal("hide");
                    $("#FormTambahPrestasi").trigger("reset");
                    LoadPrestasi();
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

    //Open Edit Modal
    $("body").on("click",".btn-edit-prestasi", function(e){
        e.preventDefault();
        $("#editPrestasiModal").modal("show");
        $("#FormEditPrestasi").trigger("reset")

        var id = $(this).attr("id");

        $.ajax({
            type: "GET",
            url: "/prestasi/edit/"+id,
            success: function(response){
                $("#id_prestasi").val(response.data.id);
                $("#tahun-edit").val(response.data.tahun);
                $("#namaKejuaraan-edit").val(response.data.namaKejuaraan);
                $("#capaian-edit").val(response.data.capaian);
                $("#kategori-edit").val(response.data.kategori);
                $("#kelas-edit").val(response.data.kelas);
                $("#namaAtlet-edit").val(response.data.namaAtlet);
            },
            error: function(err){
                console.log(err);
            }
        });
    });

    //Save Edit
    $("body").on("submit", "#FormEditPrestasi", function(e){
        e.preventDefault();
        var formData = new FormData();

        var id = $('#id_prestasi').val();
        var token = $('input[name=_token]').val();
        var tahun = $('input[name=tahun-edit]').val();
        var namaKejuaraan = $('input[name=namaKejuaraan-edit]').val();
        var capaian = $('input[name=capaian-edit]').val();
        var kategori = $('input[name=kategori-edit]').val();
        var kelas = $('input[name=kelas-edit]').val();
        var namaAtlet = $('input[name=namaAtlet-edit]').val();

        formData.append('id', id);
        formData.append('_token', token);
        formData.append('tahun', tahun);
        formData.append('namaKejuaraan', namaKejuaraan);
        formData.append('capaian', capaian);
        formData.append('kategori', kategori);
        formData.append('kelas', kelas);
        formData.append('namaAtlet', namaAtlet);

        $(".btn-close").css('display','none');
        $(".btn-loading").css('display','');
        $(".btn-submit").css('display','none');

        $.ajax({
            type: "POST",
            url: '/prestasi/update/'+id,
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
                    $(".btn-submit-prestasi").css('display', '');
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


    //Hapus Data
    $("body").on("click",".btn-delete-prestasi", function(e){
        e.preventDefault();

        var id = $(this).attr("data-id");
        var namaPrestasi = $(this).attr("data-nama");
        var namaAtlet = $(this).attr("data-name");

        Swal.fire({
            title: 'Hapus data ' + namaPrestasi + ' Atas nama ' +namaAtlet+ '?',
            text: 'Apakah Anda yakin ingin menghapus data prestasi ' + namaPrestasi + ' Atas nama ' +namaAtlet+ '?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Siap Yakin!'
        }).then((result) => {
            if(result.value){
                $.ajax({
                    type: 'get',
                    url: '/prestasi/delete' + id,
                    success: function(response){
                        if (response.status == 'deleted') {
                            Swal.fire('Deleted!', 'Data ' + namaPrestasi + '  Atas nama  '+namaAtlet+' berhasil dihapus.', 'success');
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
    $("body").on("click", "#btn-export-prestasi", function (e) {
        e.preventDefault();
        $("#ExportPrestasiModal").modal("show");
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
