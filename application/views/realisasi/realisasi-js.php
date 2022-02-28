<script>

	function listTable(){
		$.ajax({
			type  : 'ajax',
			url   : '<?php echo site_url('Realisasi/listTable')?>',
			async : false,
			dataType : 'json',
			success : function(data){
				var html = '';
				var i;
				var no = 1;
				for(i=0; i<data.length; i++){
					html += '<tr id="apprvlist" data-toggle="tooltip" title="Klik baris untuk proses." class="apprvlist" data-id="'+data[i].pengajuan_id+'" style="cursor: pointer;">'+
							'<td class="tengah">'+no+'</td>'+
							'<td class="tengah">'+data[i].create_date+'</td>'+
							'<td class="tengah">'+data[i].no_document+'</td>'+
							'<td class="kiri">'+data[i].product_name+'</td>'+
							'<td class="tengah">'+data[i].qty+'</td>'+
							'<td class="kiri">'+data[i].reason+'</td>'+
							'</tr>';
					no++;
				}
				$('#show_data').html(html);
			}
		});
	}

	function modalUbah(id)
	{
		$("#ModalRealisasi").load("<?php echo site_url('Realisasi/formEdit')?>",{
		},function(responseTxt, statusTxt, xhr){
			if(statusTxt == "success"){
				$('#realisasi-edit').modal({backdrop: 'static', keyboard: false});
				$('#realisasi-edit').modal('show');
				$('#realisasi-edit').on('hidden.bs.modal', function () {
					$('#ModalRealisasi').html('');
				});
			}
			
			getData(id);
			
			if(statusTxt == "error"){
				console.log("Error: " + xhr.status + ": " + xhr.statusText);
				return false;
			}
		});
	}
	
	function getData(id)
	{
		$.ajax({
			url : "<?php echo site_url('Approve/getApproval')?>/" + id,
			type: "GET",
			dataType: "JSON",
			success: function(data)
			{
				$('[name="realisasi-no"]').val(data.no_document);
			},
			error: function (jqXHR, textStatus, errorThrown)
			{
				console.log('Something Wrong!');
			}
		});
	}
	
	$(document).ready(function(){
		// $.ajaxSetup({ cache: false });
		$("form").attr('autocomplete', 'off');
		listTable();
		$('[data-toggle="tooltip"]').tooltip(); 
		
		var table = $('#data-list').DataTable({
			dom: 'Bfrtip',
			stateSave: true,
			orderCellsTop: true,
			fixedHeader: true,
			retrieve: true,
			processing: true,
			columnDefs: [
				{
					"targets": [ 0 ],
					"orderable": false,
				},
			],
			"buttons": [{
							"text": '<i class="fa fa-fw fa-eraser"></i> Bersihkan Pencarian',
							"action": function ( e, dt, node, config ) {
								$('#data-list').DataTable().search( '' ).columns().search( '' ).draw();
							}
						}],
			"oLanguage": {
				"sSearch": "Cari:",
				"oPaginate": {
					"sFirst": "Halaman Pertama",
					"sPrevious": "Sebelumnya",
					"sNext": "Selanjutnya",
					"sLast": "Halaman Terakhir"
				},
				"sInfo": "Menampilkan halaman _PAGE_ dari _TOTAL_ total data",
				"sInfoFiltered": "(difilter dari _MAX_ total data)",
				"sZeroRecords": "Tidak ditemukan - maaf",
				"sInfoEmpty": "Tidak ada data tersedia"
			}
			
		});
		
		$('tr.apprvlist').on('click',function(){
			var id = $(this).attr('data-id');
			modalUbah(id)
		});

		$('select#realisasi-method').on('change', function (e) {
			var optionSelected = $("option:selected", this);
			var valueSelected = this.value;
			// console.log(valueSelected);
			if(valueSelected == 1) {
				$("#sembunyi").show();
				$('#labels').html("Nama Vendor:");
				$('#photo1').html("Foto Sebelum Proses Muat:");
				$('#photo2').html("Foto Saat Proses Muat:");
				$('#photo3').html("Foto Setelah Barang Masuk Mobil:");
				$('#photo4').html("Foto Saat Pemusnahan:");
			} else {
				$('#labels').html("Lokasi:");
				$('#photo1').html("Foto Sebelum Pemusnahan:");
				$('#photo2').html("Foto Saat Pemusnahan:");
				$('#photo3').html("Foto Setelah Pemusnahan:");
				$("#sembunyi").hide();
			}
			
		});

		$("button#btn-proses").click(function (event) {
			event.preventDefault();
			var form = $('#frmActivityProcess')[0];
			var data = new FormData(form);
			// console.log(data);

			$.ajax({
				type: "POST",
				enctype: 'multipart/form-data',
				url: "<?php echo site_url('Realisasi/setProcess')?>",
				data: data,
				processData: false,
				contentType: false,
				cache: false,
				success: function (data) {
					swal("Selamat!", "Berhasil Diproses", "success");
					document.getElementById("btn-proses").setAttribute("disabled","disabled");
					$('#btn-proses').html("<i class='fa fa-save'></i> Proses");
				},
				error: function (e) {
					swal("Maaf!", "Gagal Diproses", "warning");
					$('#btn-proses').html("<i class='fa fa-save'></i> Proses");
				}
			});
		});
		
		$('button#btn-keluar').on('click', function () {
			$("#btn-keluar").attr('data-dismiss', 'modal');
			setTimeout(
				function() {
					$("#content").load("<?php echo site_url('Realisasi')?>");
				}, 500
			);
		});
	});

</script>