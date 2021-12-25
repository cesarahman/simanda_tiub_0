$(document).ready(function() {

    tinymce.init({
        selector: 'textarea',  // change this value according to your HTML
        forced_root_block : 'p'
    });

    //CEK PASSWORD UPDATE UNTUK ADMIN BARU
    // $.ajax({
    //     url: "/cek-update-pass",
    //     type: "get",
    //     success: function(response){
    //         // console.log(response.user.created_at)
    //         if(response.user.created_at == response.user.updated_at && response.user.id_role == 2){
    //             Swal.fire({
	// 				icon: 'info',
	// 				title: 'Ganti Password',
    //                 text: 'Untuk Admin baru wajib mengganti password untuk menggunakan fitur pada portal ini',
    //                 showCloseButton: true,
    //                 showConfirmButton: false,
    //                 allowOutsideClick: true,
	// 				footer: '<a href="/editpassword"><button class="btn btn-primary">Ganti Password</button></a>'
	// 			});
    //         }
    //     },
    //     error: function(err){
    //         console.log(err)
    //     }
    // })

	//------------------------------------------FITUR JABATAN------------------------------------------

	// //DATATABLE JABATAN
	// LoadTableJabatan();
	// function LoadTableJabatan() {
	// 	AlertCount();
	// 	$('#datatable-jabatan').load('/load/table-jabatan', function() {
	// 		$('#tbl-jabatan').DataTable({
	// 			processing: true,
	// 			serverSide: true,
	// 			ajax: {
	// 				url: '/load/data-jabatan',
	// 				type: 'get'
	// 			},
	// 			columns: [
	// 				{
	// 					data: 'DT_RowIndex',
	// 					name: 'DT_RowIndex',
	// 					searchable: false
	// 				},
	// 				{
	// 					data: 'nama_jabatan',
	// 					name: 'nama_jabatan'
	// 				},
	// 				{
	// 					data: 'aksi',
	// 					name: 'aksi',
	// 					searchable: false,
	// 					orderable: false
	// 				}
	// 			]
	// 		});
	// 	});
	// }

	// //TAMBAH JAWABAN
	// $('body').on('submit', '#form-tambah-jabatan', function(e) {
	// 	e.preventDefault();
	// 	$('.btn-close').css('display', 'none');
	// 	$('.btn-loading').css('display', '');
	// 	$('#btn-submit-jabatan').css('display', 'none');
	// 	var data = $('#form-tambah-jabatan').serialize();
	// 	$.ajax({
	// 		type: 'post',
	// 		url: '/admin/tambah-jabatan',
	// 		data: data,
	// 		success: function(response) {

    //             if(response.message == "gagal"){
    //                 $('.btn-close').css('display', '');
    //                 $('.btn-loading').css('display', 'none');
    //                 $('#btn-submit-jabatan').css('display', '');
    //                 Swal.fire({
    //                     icon: 'error',
    //                     title: 'Error',
    //                     text: 'Form tidak boleh kosong!',
    //                 });
    //             }else{
    //                 $('.modal-title-jabatan').html();
    //                 $('#TambahJabatanModal').modal('hide');
    //                 $('#form-tambah-jabatan').trigger('reset');
    //                 $('.btn-close').css('display', '');
    //                 $('.btn-loading').css('display', 'none');
    //                 $('#btn-submit-jabatan').css('display', '');
    //                 LoadTableJabatan();
    //                 Swal.fire({
    //                     icon: 'success',
    //                     title: 'Sukses',
    //                     text: 'Berhasil Menambahkan Jabatan',
    //                     timer: 1200,
    //                     showConfirmButton: false
    //                 });
    //             }

	// 		},
	// 		error: function(err) {
	// 			console.log(err);
	// 		}
	// 	});
	// });

	// //DELETE JABATAN
	// $('body').on('click', '.btn-delete-jabatan', function(e) {
	// 	e.preventDefault();
	// 	var id = $(this).attr('data-id');
	// 	var nama = $(this).attr('data-nama');
	// 	Swal.fire({
	// 		title: 'Hapus ' + nama + '?',
	// 		text: 'Anda tidak dapat mengurungkan aksi ini!',
	// 		icon: 'warning',
	// 		showCancelButton: true,
	// 		confirmButtonColor: '#3085d6',
	// 		cancelButtonColor: '#d33',
	// 		confirmButtonText: 'Ya, Hapus!'
	// 	}).then((result) => {
	// 		if (result.value) {
	// 			$.ajax({
	// 				type: 'get',
	// 				url: '/admin/delete-jabatan/' + id,
	// 				success: function(response) {
	// 					Swal.fire('Deleted!', nama + ' telah dihapus.', 'success');
	// 					LoadTableJabatan();
	// 				},
	// 				error: function(err) {
	// 					console.log(err);
	// 				}
	// 			});
	// 		}
	// 	});
	// });

	// $('body').on('click', '.btn-edit-jabatan', function(e) {
	// 	e.preventDefault();
	// 	var id = $(this).attr('data-id');
	// 	var nama = $(this).attr('data-nama');
	// 	$('#EditJabatanModal').modal('show');
	// 	$('#btn-save-jabatan').css('display', '');
    //     $('#kolom-jabatan').val(nama);
    //     $("#jabatan-id").val(id)
    // });

    // $('body').on('submit', '#form-edit-jabatan', function(e) {
    //     e.preventDefault();
    //     $('.btn-close-edit').css('display', 'none');
    //     $('.btn-loading-edit').css('display', '');
    //     $('#btn-save-jabatan').css('display', 'none');
    //     var data = $('#form-edit-jabatan').serialize();
    //     var id = $("#jabatan-id").val()
    //     console.log(id)
    //     $.ajax({
    //         type: 'post',
    //         url: '/admin/edit-jabatan/' + id,
    //         data: data,
    //         success: function(response) {

    //             if(response.message == "gagal"){
    //                 $('.btn-close-edit').css('display', '');
    //                 $('.btn-loading-edit').css('display', 'none');
    //                 $('#btn-save-jabatan').css('display', '');
    //                 Swal.fire({
    //                     icon: 'error',
    //                     title: 'Error',
    //                     text: 'Form tidak boleh kosong!',
    //                 });
    //             }else{
    //                 $('#EditJabatanModal').modal('hide');
    //                 $('#form-edit-jabatan').trigger('reset');
    //                 $('.btn-close-edit').css('display', '');
    //                 $('.btn-loading-edit').css('display', 'none');
    //                 $('#btn-save-jabatan').css('display', '');
    //                 LoadTableJabatan();
    //                 Swal.fire({
    //                     icon: 'success',
    //                     title: 'Sukses',
    //                     text: 'Berhasil Mengedit Jabatan',
    //                     timer: 1200,
    //                     showConfirmButton: false
    //                 });
    //             }

    //         },
    //         error: function(err) {
    //             console.log(err);
    //         }
    //     });
    // });



	// //------------------------------------------END FITUR JABATAN-----------------------------------------

	// LoadTableSemester();

	// function LoadTableSemester() {
	// 	AlertCount();
	// 	$('#datatable-semester').load('/load/table-semester', function() {
	// 		$('#tbl-semester').DataTable({
	// 			processing: true,
	// 			serverSide: true,
	// 			ajax: {
	// 				url: '/load/data-semester',
	// 				type: 'get'
	// 			},
	// 			columns: [
	// 				{
	// 					data: 'DT_RowIndex',
	// 					name: 'DT_RowIndex',
	// 					searchable: false
	// 				},
	// 				{
	// 					data: 'semester',
	// 					name: 'semester'
	// 				},
	// 				{
	// 					data: 'status',
	// 					name: 'status'
	// 				},
	// 				{
	// 					data: 'aksi',
	// 					name: 'aksi',
	// 					searchable: false,
	// 					orderable: false
	// 				}
	// 			]
	// 		});
	// 	});
	// }
	// $('body').on('click', '#OpenModalSMT', function() {
	// 	$('#TambahSemesterModal').modal('show');
	// 	$('#btn-submit-semester').css('display', '');
	// });
	// //TAMBAH SMT
	// $('body').on('submit', '#form-tambah-semester', function(e) {
	// 	e.preventDefault();
	// 	$('.btn-close').css('display', 'none');
	// 	$('.btn-loading').css('display', '');
	// 	$('#btn-submit-semester').css('display', 'none');
	// 	var name = $('input[name=semester-tambah]').val();
	// 	var token = $('input[name=token]').val();

	// 	// console.log(status);
	// 	$.ajax({
	// 		type: 'post',
	// 		url: '/admin/tambah-semester',
	// 		data: { _token: token, semester_tambah: name },
	// 		success: function(response) {

    //             if(response.message == "gagal"){
    //                 $('.btn-close').css('display', '');
    //                 $('.btn-loading').css('display', 'none');
    //                 $('#btn-submit-semester').css('display', '');
    //                 Swal.fire({
    //                     icon: 'error',
    //                     title: 'Error',
    //                     text: 'Form tidak boleh kosong!',
    //                 });
    //             }else{

    //                 $('.modal-title-semester').html();
    //                 $('#TambahSemesterModal').modal('hide');
    //                 $('#form-tambah-semester').trigger('reset');
    //                 $('.btn-close').css('display', '');
    //                 $('.btn-loading').css('display', 'none');
    //                 $('#btn-submit-semester').css('display', '');
    //                 LoadTableSemester();
    //                 Swal.fire({
    //                     icon: 'success',
    //                     title: 'Sukses',
    //                     text: 'Berhasil Menambahkan Semester',
    //                     timer: 1200,
    //                     showConfirmButton: false
    //                 });
    //             }

	// 		},
	// 		error: function(err) {
	// 			console.log(err);
	// 		}
	// 	});
	// });

	// $('body').on('click', '.btn-delete-semester', function(e) {
	// 	e.preventDefault();
	// 	var id = $(this).attr('data-id');
	// 	var semester = $(this).attr('data-semester');
	// 	Swal.fire({
	// 		title: 'Hapus ' + semester + '?',
	// 		text: 'Anda tidak dapat mengurungkan aksi ini!',
	// 		icon: 'warning',
	// 		showCancelButton: true,
	// 		confirmButtonColor: '#3085d6',
	// 		cancelButtonColor: '#d33',
	// 		confirmButtonText: 'Ya, Hapus!'
	// 	}).then((result) => {
	// 		if (result.value) {
	// 			$.ajax({
	// 				type: 'get',
	// 				url: '/admin/delete-semester/' + id,
	// 				success: function(response) {
	// 					Swal.fire('Deleted!', semester + ' telah dihapus.', 'success');
	// 					LoadTableSemester();
	// 				},
	// 				error: function(err) {
	// 					console.log(err);
	// 				}
	// 			});
	// 		}
	// 	});
	// });

	// $('body').on('click', '.btn-edit-semester', function(e) {
	// 	e.preventDefault();
	// 	var id = $(this).attr('data-id');
	// 	var semester = $(this).attr('data-semester');
	// 	var status = $(this).attr('data-status');
	// 	$('input[name=id-edit]').val(id);
	// 	$('#editSemesterModal').modal('show');
	// 	$('#btn-submit-semester').css('display', 'none');
	// 	$('#btn-save-semester').css('display', '');
	// 	$('#semester-edit').val(semester);

	// 	if (status == 'aktif') {
	// 		$('.btn-aktifkan').css('display', 'none');
	// 		$('.btn-nonaktifkan').css('display', '');
	// 	} else {
	// 		$('.btn-aktifkan').css('display', '');
	// 		$('.btn-nonaktifkan').css('display', 'none');
	// 	}
	// });

	// //AKTIFKAN SEMESTER
	// $('body').on('click', '.btn-aktifkan', function(e) {
	// 	e.preventDefault();
	// 	var id = $('#id-edit').val();

	// 	$('.btn-close-edit').css('display', 'none');
	// 	$('.btn-aktifkan').css('display', 'none');
	// 	$('.btn-loading-edit').css('display', '');
	// 	$('#btn-save-semester').css('display', 'none');

	// 	$.ajax({
	// 		type: 'get',
	// 		url: '/aktifkan-semester/' + id,
	// 		success: function(response) {
	// 			$('#editSemesterModal').modal('hide');
	// 			$('.btn-close-edit').css('display', '');
	// 			$('.btn-aktifkan').css('display', '');
	// 			$('.btn-loading-edit').css('display', 'none');
	// 			$('#btn-save-semester').css('display', '');
	// 			LoadTableSemester();
	// 			Swal.fire({
	// 				icon: 'success',
	// 				title: 'Sukses',
	// 				text: 'Semester di aktifkan',
	// 				timer: 1200,
	// 				showConfirmButton: false
	// 			});
	// 		},
	// 		error: function(err) {
	// 			console.log(err);
	// 		}
	// 	});
	// });

	// //NONAKTIFKAN SEMESTER
	// $('body').on('click', '.btn-nonaktifkan', function(e) {
	// 	e.preventDefault();
	// 	var id = $('#id-edit').val();

	// 	$('.btn-close-edit').css('display', 'none');
	// 	$('.btn-nonaktifkan').css('display', 'none');
	// 	$('.btn-loading-edit').css('display', '');
	// 	$('#btn-save-semester').css('display', 'none');

	// 	$.ajax({
	// 		type: 'get',
	// 		url: '/non-aktifkan-semester/' + id,
	// 		success: function(response) {
	// 			$('#editSemesterModal').modal('hide');
	// 			$('.btn-close-edit').css('display', '');
	// 			$('.btn-nonaktifkan').css('display', '');
	// 			$('.btn-loading-edit').css('display', 'none');
	// 			$('#btn-save-semester').css('display', '');
	// 			LoadTableSemester();
	// 			Swal.fire({
	// 				icon: 'success',
	// 				title: 'Sukses',
	// 				text: 'Semester di non-aktifkan',
	// 				timer: 1200,
	// 				showConfirmButton: false
	// 			});
	// 		},
	// 		error: function(err) {
	// 			console.log(err);
	// 		}
	// 	});
	// });

	// $('body').on('submit', '#form-edit-semester', function(e) {
	// 	e.preventDefault();
	// 	$('.btn-close-edit').css('display', 'none');
	// 	$('.btn-loading-edit').css('display', '');
	// 	$('#btn-save-semester').css('display', 'none');
	// 	$('.btn-aktifkan').css('display', 'none');
	// 	$('.btn-nonaktifkan').css('display', 'none');
	// 	var name = $('input[name=semester-edit]').val();
	// 	var token = $('input[name=token-edit]').val();
	// 	var id = $('input[name=id-edit]').val();

	// 	$.ajax({
	// 		type: 'post',
	// 		url: '/admin/edit-semester/' + id,
	// 		data: { _token: token, semester: name },
	// 		success: function(response) {

    //             if(response.message == "gagal"){
    //                 $('.btn-close-edit').css('display', '');
    //                 $('.btn-loading-edit').css('display', 'none');
    //                 $('#btn-save-semester').css('display', '');
    //                 Swal.fire({
    //                     icon: 'error',
    //                     title: 'Error',
    //                     text: 'Form tidak boleh kosong!',

    //                 });
    //             }else{
    //                 $('#editSemesterModal').modal('hide');
    //                 $('#form-edit-semester').trigger('reset');
    //                 $('.btn-close-edit').css('display', '');
    //                 $('.btn-loading-edit').css('display', 'none');
    //                 $('#btn-save-semester').css('display', '');
    //                 LoadTableSemester();
    //                 Swal.fire({
    //                     icon: 'success',
    //                     title: 'Sukses',
    //                     text: 'Berhasil Mengedit Semester',
    //                     timer: 1200,
    //                     showConfirmButton: false
    //                 });
    //             }

	// 		},
	// 		error: function(err) {
	// 			console.log(err);
	// 		}
	// 	});
	// });

	// LoadTableBK();
	// function LoadTableBK() {
	// 	AlertCount();
	// 	$('#datatable-bk').load('/load/table-bk', function() {
	// 		$('#tbl-bk').DataTable({
	// 			processing: true,
	// 			serverSide: true,
	// 			ajax: {
	// 				url: '/load/data-bk',
	// 				type: 'get'
	// 			},
	// 			columns: [
	// 				{
	// 					data: 'DT_RowIndex',
	// 					name: 'DT_RowIndex',
	// 					searchable: false
	// 				},
	// 				{
	// 					data: 'nama_bk',
	// 					name: 'nama_bk'
	// 				},
	// 				{
	// 					data: 'gambar',
	// 					render: function(data, type, row) {
	// 						return '<img  class = "rounded mx-auto d-block" height="100px" src="' + data + '" />';
	// 					}
	// 				},
	// 				{
	// 					data: 'aksi',
	// 					name: 'aksi',
	// 					searchable: false,
	// 					orderable: false
	// 				}
	// 			]
	// 		});
	// 	});
	// }
	// //TAMBAH SMT
	// $('body').on('submit', '#form-tambah-bk', function(e) {
	// 	e.preventDefault();
	// 	$('.btn-close').css('display', 'none');
	// 	$('.btn-loading').css('display', '');
	// 	$('#btn-submit-bk').css('display', 'none');

	// 	var formData = new FormData();
	// 	var name = $('input[name=nama-tambah]').val();
	// 	var deskripsi = tinymce.get('deskripsi-tambah').getContent();
	// 	var token = $('input[name=token]').val();
	// 	formData.append('_token', token);
	// 	formData.append('nama', name);
	// 	formData.append('deskripsi', deskripsi);
	// 	formData.append('gambar', $('input[type=file]')[0].files[0]);
	// 	console.log(deskripsi);
	// 	if (tinymce.get('deskripsi-tambah').getContent() == '') {
	// 		$('.btn-close').css('display', '');
	// 		$('.btn-loading').css('display', 'none');
	// 		$('#btn-submit-bk').css('display', '');
	// 		Swal.fire({
	// 			icon: 'error',
	// 			title: 'Error',
	// 			text: 'Field Deksripsi perlu di isi',
	// 			timer: 1200,
	// 			showConfirmButton: false
	// 		});
	// 	} else {
	// 		$('#form-tambah-bk').trigger('reset');
	// 		$.ajax({
	// 			type: 'post',
	// 			url: '/admin/tambah-bk',
	// 			data: formData,
	// 			processData: false,
	// 			contentType: false,
	// 			success: function(response) {
	// 				$('.btn-close').css('display', '');
	// 				$('.btn-loading').css('display', 'none');
	// 				$('#btn-submit-bk').css('display', '');
	// 				LoadTableBK();
	// 				if (response.hasOwnProperty('error')) {
	// 					Swal.fire({
	// 						icon: 'error',
	// 						title: 'Ooopss...',
	// 						text: response.error,
	// 						timer: 1200,
	// 						showConfirmButton: false
	// 					});
	// 				} else {
	// 					$('#BKModal').modal('hide');
	// 					$('#form-tambah-bk').trigger('reset');
	// 					$('#blah').attr('src', '');
	// 					LoadTableBK();
	// 					Swal.fire({
	// 						icon: 'success',
	// 						title: 'Sukses',
	// 						text: 'Berhasil Menambahkan Bidang Keahlian',
	// 						timer: 1200,
	// 						showConfirmButton: false
	// 					});
	// 				}
	// 			},
	// 			error: function(err) {
	// 				console.log(err);
	// 			}
	// 		});
	// 	}
	// });

	// $('body').on('click', '.btn-delete-bk', function(e) {
	// 	e.preventDefault();
	// 	var id = $(this).attr('data-id');
	// 	var nama = $(this).attr('data-nama');
	// 	Swal.fire({
	// 		title: 'Hapus ' + nama + '?',
	// 		text: 'Anda tidak dapat mengurungkan aksi ini!',
	// 		icon: 'warning',
	// 		showCancelButton: true,
	// 		confirmButtonColor: '#3085d6',
	// 		cancelButtonColor: '#d33',
	// 		confirmButtonText: 'Ya, Hapus!'
	// 	}).then((result) => {
	// 		if (result.value) {
	// 			$.ajax({
	// 				type: 'get',
	// 				url: '/admin/delete-bk/' + id,
	// 				success: function(response) {
	// 					Swal.fire('Deleted!', nama + ' telah dihapus.', 'success');
	// 					LoadTableBK();
	// 				},
	// 				error: function(err) {
	// 					console.log(err);
	// 				}
	// 			});
	// 		}
	// 	});
	// });

	// $('body').on('click', '.btn-edit-bk', function(e) {
	// 	e.preventDefault();
	// 	var id = $(this).attr('data-id');
	// 	$('#file-upload-edit').css('display', '');
	// 	$('.btn-close-edit').css('display', '');
	// 	$('.btn-loading-edit').css('display', 'none');
	// 	$('#btn-save-bk').css('display', '');
	// 	$('#file-upload-edit').attr('disabled', false);
	// 	$('#nama-edit').prop('readonly', false);
	// 	tinymce.get('deskripsi-edit').setMode('design');
	// 	$.ajax({
	// 		url: '/admin/edit-bk/' + id,
	// 		type: 'GET',
	// 		success: function(res) {
	// 			$('#modal-title-bk').html('Edit Bidang Keahlian');
	// 			$('#editBKModal').modal({ backdrop: 'static', keyboard: false });
	// 			$('#editBKModal').modal('show');
	// 			$('#btn-save-bk').css('display', '');
	// 			$('input[name=edit-id]').val(id);
	// 			$('#nama-edit').val(res.values.nama_bk);
	// 			tinymce.get('deskripsi-edit').setContent(res.values.deskripsi);
	// 			if (res.values.gambar) {
	// 				$('#blah-edit').attr('src', res.values.gambar);
	// 			}
	// 		}
	// 	});
	// 	return false;
	// });
	// $('body').on('click', '.btn-show-bk', function(e) {
	// 	e.preventDefault();
	// 	var id = $(this).attr('data-id');
	// 	$('#btn-save-bk').css('display', 'none');
	// 	$('#file-upload-edit').css('display', 'none');
	// 	$.ajax({
	// 		url: '/admin/edit-bk/' + id,
	// 		type: 'GET',
	// 		success: function(res) {
	// 			$('#modal-title-bk').html('Detail Bidang Keahlian');
	// 			$('#editBKModal').modal({ backdrop: 'static', keyboard: false });
	// 			$('#editBKModal').modal('show');
	// 			$('input[name=edit-id]').val(id);
	// 			$('input[name=edit-id]');
	// 			$('#nama-edit').val(res.values.nama_bk);
	// 			tinymce.get('deskripsi-edit').setContent(res.values.deskripsi);
	// 			$('#file-upload-edit').attr('disabled', true);
	// 			$('#nama-edit').prop('readonly', true);
	// 			tinymce.get('deskripsi-edit').setMode('readonly');
	// 			if (res.values.gambar) {
	// 				$('#blah-edit').attr('src', res.values.gambar);
	// 			}
	// 		}
	// 	});
	// 	return false;
	// });
	// $('body').on('submit', '#form-edit-bk', function(e) {
	// 	e.preventDefault();
	// 	$('.btn-close-edit').css('display', 'none');
	// 	$('.btn-loading-edit').css('display', '');
	// 	$('#btn-save-bk').css('display', 'none');
	// 	var formData = new FormData();
	// 	var name = $('input[name=nama-edit]').val();
	// 	var deskripsi = tinymce.get('deskripsi-edit').getContent();
	// 	var token = $('input[name=token]').val();
	// 	var id = $('input[name=edit-id]').val();
	// 	formData.append('_token', token);
	// 	formData.append('nama', name);
	// 	formData.append('deskripsi', deskripsi);

	// 	if ($('#file-upload-edit').get(0).files.length != 0) {
	// 		formData.append('gambar', $('input[type=file]')[1].files[0]);
	// 	}
	// 	if (tinymce.get('deskripsi-edit').getContent() == '') {
	// 		$('#form-edit-bk').trigger('reset');
	// 		$('.btn-close-edit').css('display', '');
	// 		$('.btn-loading-edit').css('display', 'none');
	// 		$('#btn-save-bk').css('display', '');
	// 		Swal.fire({
	// 			icon: 'error',
	// 			title: 'Error',
	// 			text: 'Field Deksripsi perlu di isi',
	// 			timer: 1200,
	// 			showConfirmButton: false
	// 		});
	// 	} else {
	// 		$.ajax({
	// 			type: 'post',
	// 			url: '/admin/konfirmasi-edit-bk/' + id,
	// 			data: formData,
	// 			processData: false,
	// 			contentType: false,
	// 			success: function(response) {
	// 				$('.btn-close-edit').css('display', '');
	// 				$('.btn-loading-edit').css('display', 'none');
	// 				$('#btn-save-bk').css('display', '');

	// 				if (response.hasOwnProperty('error')) {
	// 					Swal.fire({
	// 						icon: 'error',
	// 						title: 'Ooopss...',
	// 						text: response.error,
	// 						timer: 1200,
	// 						showConfirmButton: false
	// 					});
	// 				} else {
	// 					$('#editBKModal').modal('hide');
	// 					$('#form-edit-bk').trigger('reset');
	// 					LoadTableBK();
	// 					Swal.fire({
	// 						icon: 'success',
	// 						title: 'Sukses',
	// 						text: 'Berhasil Mengedit Bidang Keahlian',
	// 						timer: 1200,
	// 						showConfirmButton: false
	// 					});
	// 				}
	// 			},
	// 			error: function(err) {
	// 				console.log(err);
	// 			}
	// 		});
	// 		return false;
	// 	}
	// });

	//---------FITUR PENGATURAN PROFILE  ----
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});

	//update profile
	$('body').on('click', '#btn-edit-profile', function(e) {
		e.preventDefault();
		var formData = new FormData();
		var name = $('input[name=name]').val();
		var email = $('input[name=email]').val();
		var files = $('#file-upload')[0].files[0];
		var id = $(this).data('id');

		formData.append('gambar', files);
		formData.append('nama', name);
        formData.append('email', email);

		$.ajax({
			type: 'POST',
			url: 'editprofile/' + id,
			data: formData,
			contentType: false,
			processData: false,
			success: function(data) {

				if (data.status == '1') {
					Swal.fire({
						icon: 'success',
						title: 'Sukses',
						text: 'Sukses edit profile',
						timer: 1000,
						showConfirmButton: false
					});
					location.reload();
				} else if (data.status == '0') {
					Swal.fire({
						icon: 'error',
						title: 'Ooopss...',
						text: 'Gagal edit profile',
						timer: 1000,
						showConfirmButton: false
					});
				} else {
					Swal.fire({
						icon: 'error',
						title: 'Ooopss...',
						text: 'Email sudah ada!',
						timer: 1200,
						showConfirmButton: false
					});
				}
            },
            error: function(err){
                console.log(err)
            }
		});
	});

	//ganti password
	$('body').on('click', '#btn-edit-password', function(e) {
		e.preventDefault();
		var password = $('#password').val();
		var password_confirm = $('#password-confirm').val();
		var password_lama = $('#password-lama').val();
		var id = $(this).data('id');
		if (password == '' || password_confirm == '') {
			Swal.fire({
				icon: 'error',
				title: 'Oops...',
				text: 'Password tidak boleh kosong!',
				timer: 1000,
				showConfirmButton: false
			});
		} else {

            if(password_lama == password){
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Password Lama dan Password baru harus beda!',
                    timer: 1000,
                    showConfirmButton: false
                });
            }else{
                $.ajax({
                    type: 'POST',
                    url: 'editpassword/' + id,
                    data: {
                        password: password,
                        password_confirmation: password_confirm,
                        id: id,
                        password_lama: password_lama
                    },
                    dataType: 'json',
                    success: function(data) {
                        if (data.status == '1') {
                            $('.form-edit-password')[0].reset();
                            window.location.href = '/home';
                            Swal.fire({
                                icon: 'success',
                                title: 'Sukses',
                                text: 'Sukses ganti password',
                                timer: 1000,
                                showConfirmButton: false
                            });
                        } else if(data.status == '2'){

                            $('.form-edit-password')[0].reset();
                            Swal.fire({
                                icon: 'error',
                                title: 'Ooopss...',
                                text: 'Panjang Password baru minimal 8 Karakter',
                                timer: 1000,
                                showConfirmButton: false
                            });

                        } else if (data.status == '0') {
                            $('.form-edit-password')[0].reset();
                            Swal.fire({
                                icon: 'error',
                                title: 'Ooopss...',
                                text: 'Gagal ganti password',
                                timer: 1000,
                                showConfirmButton: false
                            });
                        } else if (data.status == 'salah') {
                            $('.form-edit-password')[0].reset();
                            Swal.fire({
                                icon: 'error',
                                title: 'Ooopss...',
                                text: 'Password anda salah!',
                                timer: 1000,
                                showConfirmButton: false
                            });
                        } else {
                            $('.form-edit-password')[0].reset();
                            Swal.fire({
                                icon: 'error',
                                title: 'Ooopss...',
                                text: 'Password harus sama!',
                                timer: 1200,
                                showConfirmButton: false
                            });
                        }
                    }
                });
            }

		}
	});
	//--END PENGATURAN PROFILE ----

	//------------------------------------------FITUR FAQ------------------------------------------

	//DATATABLE FAQ
	LoadTableFaq();

	function LoadTableFaq() {
		AlertCount();
		$('#datatable-faq').load('/load/table-faq', function() {
			$('#tbl-faq').DataTable({
				processing: true,
				serverSide: true,
				ajax: {
					url: '/load/data-faq',
					type: 'get'
				},
				columns: [
					{
						data: 'DT_RowIndex',
						name: 'DT_RowIndex',
						searchable: false
					},
					{
						data: 'pertanyaan',
						name: 'pertanyaan'
					},
					{
						data: 'aksi',
						name: 'aksi',
						searchable: false,
						orderable: false
					}
				]
			});
		});
	}

    //OPEN MODAL TAMBAH FAQ
    $("body").on("click",".btn-modal-faq", function(e){
        e.preventDefault()
        $("#form-tambah-faq").trigger("reset")
        $("#TambahFaqModal").modal("show")
    })

	//TAMBAH FAQ
	$('body').on('submit', '#form-tambah-faq', function(e) {
		e.preventDefault();
		$('.btn-close').css('display', 'none');
		$('.btn-loading').css('display', '');
		$('#btn-submit-faq').css('display', 'none');
        var data = $('#form-tambah-faq').serialize();
        var pertanyaan = $("#pertanyaan").val()
        var jawaban = $("#jawaban").val()

        if(pertanyaan != '' && jawaban != ''){
            $.ajax({
                type: 'post',
                url: '/admin/tambah-faq',
                data: data,
                success: function(response) {
                    $('.modal-title-faq').html();
                    $('#TambahFaqModal').modal('hide');
                    $('#form-tambah-faq').trigger('reset');
                    $('.btn-close').css('display', '');
                    $('.btn-loading').css('display', 'none');
                    $('#btn-submit-faq').css('display', '');
                    LoadTableFaq();
                    Swal.fire({
                        icon: 'success',
                        title: 'Sukses',
                        text: 'Berhasil Menambahkan Jabatan',
                        timer: 1200,
                        showConfirmButton: false
                    });
                },
                error: function(err) {
                    console.log(err);
                }
            });
        }else{
            $('.btn-close').css('display', '');
            $('.btn-loading').css('display', 'none');
            $('#btn-submit-faq').css('display', '');
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Form tidak boleh kosong!',
                timer: 1200,
                showConfirmButton: false
            });
        }

    });

    //SHOW FAQ
    $("body").on("click",".btn-show-faq",function(e){
        e.preventDefault()
        $("#ShowFaqModal").modal("show")
        var id = $(this).attr("data-id")

        $.ajax({
            type: "get",
            url: "/faq-get/"+id,
            success: function(response){
                $("#show_pertanyaan").val(response.data.pertanyaan)
                tinymce.get('show_jawaban').setContent(response.data.jawaban);
                tinymce.get('show_jawaban').setMode('readonly');
            },
            error: function(err){
                console.log(err)
            }
        })
    })

	//DELETE FAQ
	$('body').on('click', '.btn-delete-faq', function(e) {
		e.preventDefault();
		var id = $(this).attr('data-id');
		Swal.fire({
			title: 'Hapus Data Ini ?',
			text: 'Anda tidak dapat mengurungkan aksi ini!',
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Ya, Hapus!'
		}).then((result) => {
			if (result.value) {
				$.ajax({
					type: 'get',
					url: '/admin/delete-faq/' + id,
					success: function(response) {
						Swal.fire({
                            icon: 'success',
                            title: 'Sukses',
                            text: 'Berhasil Menghapus FAQ',
                            timer: 1200,
                            showConfirmButton: false
                        });
						LoadTableFaq();
					},
					error: function(err) {
						console.log(err);
					}
				});
			}
		});
	});

	$('body').on('click', '.btn-edit-faq', function(e) {
		e.preventDefault();
		var id = $(this).attr('data-id');
		var pertanyaan = $(this).attr('data-pertanyaan');

        $.ajax({
            type: "get",
            url: "/faq-get/"+id,
            success: function(response){
                // console.log()
                $('#EditFaqModal').modal('show');
                $('#btn-submit-faq').css('display', 'none');
                $('#btn-save-faq').css('display', '');
                $('#kolom-pertanyaan').val(pertanyaan);
                tinymce.get('jawaban_edit').setContent(response.data.jawaban);
                $('#id-faq').val(id);

            },
            error: function(err){
                console.log(err)
            }
        })

    });

    $('body').on('submit', '#form-edit-faq', function(e) {
        e.preventDefault();
        $('.btn-close-edit').css('display', 'none');
        $('.btn-loading-edit').css('display', '');
        $('#btn-save-faq').css('display', 'none');
        var data = $('#form-edit-faq').serialize();
        var id = $("#id-faq").val()
        var pertanyaan = $("#kolom-pertanyaan").val()
        var jawaban = tinymce.get('jawaban_edit').getContent();

        if(pertanyaan != '' && jawaban != ''){
            $.ajax({
                type: 'post',
                url: '/admin/edit-faq/' + id,
                data: data,
                success: function(response) {
                    $('#EditFaqModal').modal('hide');
                    $('#form-edit-faq').trigger('reset');
                    $('.btn-close-edit').css('display', '');
                    $('.btn-loading-edit').css('display', 'none');
                    $('#btn-save-faq').css('display', '');
                    LoadTableFaq();
                    Swal.fire({
                        icon: 'success',
                        title: 'Sukses',
                        text: 'Berhasil Mengedit Jabatan',
                        timer: 1200,
                        showConfirmButton: false
                    });
                },
                error: function(err) {
                    console.log(err);
                }
            });
        }else{
            $('.btn-close-edit').css('display', '');
            $('.btn-loading-edit').css('display', 'none');
            $('#btn-save-faq').css('display', '');
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Form tidak boleh kosong!',
                timer: 1200,
                showConfirmButton: false
            });
        }

    });

	//------------------------------------------END FITUR JABATAN-----------------------------------------

    //ALERT HISTORY COUNT
    function AlertCount(){
        $.ajax({
            type: "get",
            url: "/count-today-history-alert",
            success: function(response){
                $("#jumlah_history_today").html(response.total);
            },
            error: function(err){
                console.log(err)
            }
        })
    }

    //OPEN ALERT HISTORY
    $("#alertsDropdown").on("click", function(e){
        e.preventDefault
        AlertHistory()
    })

    $(document).on('click', '#dm', function (e) {
        e.stopPropagation();
      });

    //LIST ALERT HISTORY;
    function AlertHistory(){
        $.ajax({
            type: "get",
            url: "/today-history-alert",
            success: function(response){
                $('#list-alert-history').html('');
                let history = response.data

                $.each(history,function (i, data){
                    // console.log(history[i].nama)
                    // console.log(response.user)
                    if(history[i].nama == response.user){
                        if(history[i].aksi == "Tambah"){
                            if(history[i].status == "clicked"){
                                $("#list-alert-history").append(`
                                <button class="dropdown-item d-flex align-items-center btn-history" data-id=`+data.id+`>
                                    <div class="mr-3">
                                        <div class="icon-circle bg-success">
                                            <i class="fas fa-plus text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-black-500">`+ data.nama +`</div>
                                        <span class="font-weight-bold">`+ data.keterangan +`</span>
                                    </div>
                                </button>
                                `)
                            }else{
                                $("#list-alert-history").append(`
                                <button class="dropdown-item d-flex align-items-center btn-history unclicked" data-id=`+data.id+`>
                                    <div class="mr-3">
                                        <div class="icon-circle bg-success">
                                            <i class="fas fa-plus text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-black-500">`+ data.nama +`</div>
                                        <span class="font-weight-bold">`+ data.keterangan +`</span>
                                    </div>
                                </button>
                                `)
                            }
                        }else if(history[i].aksi == "Hapus"){
                            if(history[i].status == "clicked"){
                                $("#list-alert-history").append(`
                                <button class="dropdown-item d-flex align-items-center btn-history" data-id=`+data.id+`>
                                    <div class="mr-3">
                                        <div class="icon-circle bg-danger">
                                            <i class="fas fa-trash text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-black-500">`+ data.nama +`</div>
                                        <span class="font-weight-bold">`+ data.keterangan +`</span>
                                    </div>
                                </button>
                                `)
                            }else{
                                $("#list-alert-history").append(`
                                <button class="dropdown-item d-flex align-items-center btn-history unclicked" data-id=`+data.id+`>
                                    <div class="mr-3">
                                        <div class="icon-circle bg-danger">
                                            <i class="fas fa-trash text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-black-500">`+ data.nama +`</div>
                                        <span class="font-weight-bold">`+ data.keterangan +`</span>
                                    </div>
                                </button>
                                `)
                            }

                        }else if(history[i].aksi == "Edit" || history[i].aksi == "Mengaktifkan" || history[i].aksi == "Menonaktifkan"){
                            if(history[i].status == "clicked"){
                                $("#list-alert-history").append(`
                                <button class="dropdown-item d-flex align-items-center btn-history" data-id=`+data.id+`>
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-black-500">`+ data.nama +`</div>
                                        <span class="font-weight-bold">`+ data.keterangan +`</span>
                                    </div>
                                </button>
                                `)
                            }else{
                                $("#list-alert-history").append(`
                                <button class="dropdown-item d-flex align-items-center btn-history unclicked" data-id=`+data.id+`>
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-black-500">`+ data.nama +`</div>
                                        <span class="font-weight-bold">`+ data.keterangan +`</span>
                                    </div>
                                </button>
                                `)
                            }

                        }

                    }else{
                        if(history[i].aksi == "Tambah"){
                            if(history[i].status == "clicked"){
                                $("#list-alert-history").append(`
                                <button class="dropdown-item d-flex align-items-center btn-history" data-id=`+data.id+`>
                                    <div class="mr-3">
                                        <div class="icon-circle bg-success">
                                            <i class="fas fa-plus text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-black-500">`+ data.nama +`</div>
                                        <span class="font-weight-bold">`+ data.keterangan +`</span>
                                    </div>
                                </button>
                                `)
                            }else{
                                $("#list-alert-history").append(`
                                <button class="dropdown-item d-flex align-items-center btn-history unclicked" data-id=`+data.id+`>
                                    <div class="mr-3">
                                        <div class="icon-circle bg-success">
                                            <i class="fas fa-plus text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-black-500">`+ data.nama +`</div>
                                        <span class="font-weight-bold">`+ data.keterangan +`</span>
                                    </div>
                                </button>
                                `)
                            }

                        }else if(history[i].aksi == "Hapus"){
                            if(history[i].status == "clicked"){
                                $("#list-alert-history").append(`
                                <button class="dropdown-item d-flex align-items-center btn-history" data-id=`+data.id+`>
                                    <div class="mr-3">
                                        <div class="icon-circle bg-danger">
                                            <i class="fas fa-trash text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-black-500">`+ data.nama +`</div>
                                        <span class="font-weight-bold">`+ data.keterangan +`</span>
                                    </div>
                                </button>
                                `)
                            }else{
                                $("#list-alert-history").append(`
                                <button class="dropdown-item d-flex align-items-center btn-history unclicked" data-id=`+data.id+`>
                                    <div class="mr-3">
                                        <div class="icon-circle bg-danger">
                                            <i class="fas fa-trash text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-black-500">`+ data.nama +`</div>
                                        <span class="font-weight-bold">`+ data.keterangan +`</span>
                                    </div>
                                </button>
                                `)
                            }
                        }else if(history[i].aksi == "Edit" || history[i].aksi == "Mengaktifkan" || history[i].aksi == "Menonaktifkan"){
                            if(history[i].status == "clicked"){
                                $("#list-alert-history").append(`
                                <button class="dropdown-item d-flex align-items-center btn-history" data-id=`+data.id+`>
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-black-500">`+ data.nama +`</div>
                                        <span class="font-weight-bold">`+ data.keterangan +`</span>
                                    </div>
                                </button>
                                `)
                            }else{

                                $("#list-alert-history").append(`
                                <button class="dropdown-item d-flex align-items-center btn-history unclicked" data-id=`+data.id+`>
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-black-500">`+ data.nama +`</div>
                                        <span class="font-weight-bold">`+ data.keterangan +`</span>
                                    </div>
                                </button>
                                `)
                            }
                        }

                    }

                })
            },
            error: function(err){
                console.log(err)
            }
        })
    }

    //KLIK HISTORY
    $("body").on("click",".btn-history", function(e){
        e.preventDefault()
        var id = $(this).attr("data-id");
        console.log(id);

        $.ajax({
            type: "get",
            url: "/history-clicked/"+id,
            success: function(response){
                AlertCount();
                AlertHistory();
            },
            error: function(err){
                console.log(err);
            }
        });
    });
});
