<script>

	function listTable(){
		$.ajax({
			type  : 'ajax',
			url   : '<?php echo site_url('ApprovalBS/listTable')?>',
			async : false,
			dataType : 'json',
			success : function(data){
				var html = '';
				var i;
				var no = 1;
				for(i=0; i<data.length; i++){
					html += '<tr id="userlist" class="userlist" data-id="'+data[i].pengajuan_id+'" style="cursor: pointer;">'+
							'<td class="tengah">'+no+'</td>'+
							'<td class="tengah">'+data[i].create_date+'</td>'+
							'<td class="tengah">'+data[i].no_document+'</td>'+
							'<td class="kiri">'+data[i].product_name+'</td>'+
							'<td class="tengah">'+data[i].qty+'</td>'+
							'<td class="kiri">'+data[i].reason+'</td>'+
							'<td class="tengah">'+data[i].stat+'</td>'+
							'<td class="tengah">'+data[i].approved_by+'</td>'+
							'<td class="tengah">'+data[i].update_at+'</td>'+
							'</tr>';
					no++;
				}
				$('#show_data').html(html);
			}
		});
	}

	function modalTambah()
	{
		$("#ModalPengajuan").load("<?php echo site_url('ApprovalBS/formAdd')?>",{
		},function(responseTxt, statusTxt, xhr){
			if(statusTxt == "success"){
				$('#activity-add').modal({backdrop: 'static', keyboard: false});
				$('#activity-add').modal('show');
				$('#activity-add').on('hidden.bs.modal', function () {
					$('#ModalPengajuan').html('');
				});
			}
			
			if(statusTxt == "error"){
				console.log("Error: " + xhr.status + ": " + xhr.statusText);
				return false;
			}
		});
	}
	
	function modalUbah(id)
	{
		$("#ModalPengajuan").load("<?php echo site_url('ApprovalBS/formEdit')?>",{
		},function(responseTxt, statusTxt, xhr){
			if(statusTxt == "success"){
				$('#approvalbs-edit').modal({backdrop: 'static', keyboard: false});
				$('#approvalbs-edit').modal('show');
				$('#approvalbs-edit').on('hidden.bs.modal', function () {
					$('#ModalPengajuan').html('');
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
				$('[name="absedit-no"]').val(data.no_document);
				$('[name="absedit-product"]').val(data.product_id);
				$('[name="absedit-qty"]').val(data.qty);
				$('[name="absedit-desc"]').val(data.reason);
				if(data.status_id != 4) {
					$('[id="btn-submit-abs"]').prop( "disabled", true );
				}
			},
			error: function (jqXHR, textStatus, errorThrown)
			{
				console.log('Something Wrong!');
			}
		});
	}
	
	function validatorTambah()
	{
		var form = {
				Product	: document.getElementById("absadd-product").value,
				Qty		: document.getElementById("absadd-qty").value,
				Desc	: document.getElementById("absadd-desc").value
			}
		
		if(form['Product'] == "") {
			swal("Maaf!", "Produk tidak boleh kosong!", "warning");
		} else if(form['Desc'] == "") {
			swal("Maaf!", "Alasan pemusnahan tidak boleh kosong!", "warning");
		} else if(form['Desc'] == "") {
			swal("Maaf!", "Alasan pemusnahan tidak boleh kosong!", "warning");
		} else {
			submit();
		}
	}
	
	function submit()
	{
		$.ajax({
			url : "<?php echo site_url('ApprovalBS/saveApprovalBS')?>",
			type: "POST",
			data: $('#frmApprovalAdd').serialize(),
			dataType: "JSON",
			beforeSend: function(){
				$('#btn-simpan-abs').html("<img src='<?php echo base_url();?>assets/image/core/loader.gif' style='height:20px;' /> Data sedang dikirim...");
			},
			success: function(data)
			{
				if(data.status) {
					swal(data.title, data.text, data.type);
					document.getElementById("btn-simpan-abs").setAttribute("disabled","disabled");
					$('#btn-simpan-abs').html("<i class='fa fa-save'></i> Simpan");
				} else {
					swal(data.title, data.text, data.type);
					$('#btn-simpan-abs').html("<i class='fa fa-save'></i> Simpan");
				}
			}
		});
	}

	function submitAgain()
	{
		$.ajax({
			url : "<?php echo site_url('Approve/setSubmit')?>",
			type: "POST",
			data: $('#frmActivityEdit').serialize(),
			dataType: "JSON",
			beforeSend: function(){
				$('#btn-submit-abs').html("<img src='<?php echo base_url();?>assets/image/core/loader.gif' style='height:20px;' /> Data sedang dikirim...");
			},
			success: function(data)
			{
				if(data.status) {
					swal(data.title, data.text, data.type);
					document.getElementById("btn-submit-abs").setAttribute("disabled","disabled");
					$('#btn-submit-abs').html("<i class='fa fa-save'></i> Simpan");
				} else {
					swal(data.title, data.text, data.type);
					$('#btn-submit-abs').html("<i class='fa fa-save'></i> Simpan");
				}
			}
		});
	}
	
	// function validatorUpdate()
	// {
	// 	var form = {
	// 			Tanggal		: document.getElementById("actedit-tgl").value,
	// 			Shift		: document.getElementById("actedit-shift").value,
	// 			Jenis		: document.getElementById("actedit-jenis").value,
	// 			Deskripsi	: document.getElementById("actedit-desc").value,
	// 			Status		: document.getElementById("actedit-status").value
	// 		}
		
	// 	if(form['Tanggal'] == "") {
	// 		swal("Maaf!", "Nama Klien tidak boleh kosong!", "warning");
	// 	} else if(form['Shift'] == "") {
	// 		swal("Maaf!", "Nama Tipe Klien tidak boleh kosong!", "warning");
	// 	} else if(form['Jenis'] == "") {
	// 		swal("Maaf!", "Nama Tipe Klien tidak boleh kosong!", "warning");
	// 	} else if(form['Deskripsi'] == "") {
	// 		swal("Maaf!", "Nama Tipe Klien tidak boleh kosong!", "warning");
	// 	} else if(form['Status'] == "") {
	// 		swal("Maaf!", "Nama Tipe Klien tidak boleh kosong!", "warning");
	// 	} else {
	// 		update();
	// 	}
	// }
	
	// function update()
	// {
	// 	$.ajax({
	// 		url : "<?php echo site_url('DailyActivity/updateDailyActivity')?>",
	// 		type: "POST",
	// 		data: $('#frmActivityEdit').serialize(),
	// 		dataType: "JSON",
	// 		beforeSend: function(){
	// 			$('#btn-ubah-activity').html("<img src='<?php echo base_url();?>assets/image/core/loader.gif' style='height:20px;' /> Data sedang dikirim...");
	// 		},
	// 		success: function(data)
	// 		{
	// 			if(data.status) {
	// 				swal(data.title, data.text, data.type);
	// 				document.getElementById("btn-ubah-activity").setAttribute("disabled","disabled");
	// 				$('#btn-ubah-activity').html("<i class='fa fa-save'></i> Ubah");
	// 			} else {
	// 				swal(data.title, data.text, data.type);
	// 				$('#btn-ubah-activity').html("<i class='fa fa-save'></i> Ubah");
	// 			}
	// 		}
	// 	});
	// }
	
	$(document).ready(function(){
		$.ajaxSetup({ cache: false });
		$("form").attr('autocomplete', 'off');
		listTable();
		
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
							"text": '<i class="fa fa-fw fa-plus-circle"></i> Tambah',
							"action": function ( e, dt, node, config ) {
								modalTambah();
							}
						}, {
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
		
		$('button#btn-simpan-abs').on('click', function () {
			validatorTambah();
		});

		$('button#btn-submit-abs').on('click', function () {
			submitAgain();
		});

		$('tr.userlist').on('click',function(){
			var id = $(this).attr('data-id');
			modalUbah(id)
		});
		
		$('button#btn-keluar-abs').on('click', function () {
			$("#btn-keluar-abs").attr('data-dismiss', 'modal');
			setTimeout(
				function() {
					$("#content").load("<?php echo site_url('ApprovalBS')?>");
				}, 500
			);
		});
	});

</script>