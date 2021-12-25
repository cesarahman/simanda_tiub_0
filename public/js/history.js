$(document).ready(function() {
    $.ajax({
        url: '/load/data-history',
        type: 'get',
        success: function(response){
            console.log(response)
        }
    })


    //DATATABLE JABATAN
	LoadTableHistory();
	function LoadTableHistory() {
		$('#datatable-history').load('/load/table-history', function() {
			$('#tbl-history').DataTable({
				processing: true,
				serverSide: true,
				ajax: {
					url: '/load/data-history',
					type: 'get'
				},
				columns: [
					{
						data: 'DT_RowIndex',
						name: 'DT_RowIndex',
						searchable: false
					},
					{
						data: 'nama',
						name: 'nama'
					},
					{
						data: 'aksi',
						name: 'aksi'
					},
					{
						data: 'keterangan',
						name: 'keterangan'
					},
					{
						data: 'created_at',
						name: 'created_at'
					},
				]
			});
		});
	}
})
