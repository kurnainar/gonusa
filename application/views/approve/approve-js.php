<script>

	function listTable(){
		$.ajax({
			type  : 'ajax',
			url   : '<?php echo site_url('Approve/listTable')?>',
			async : false,
			dataType : 'json',
			success : function(data){
				var html = '';
				var i;
				var no = 1;
				for(i=0; i<data.length; i++){
					html += '<tr id="apprvlist" class="apprvlist" data-id="'+data[i].pengajuan_id+'" style="cursor: pointer;">'+
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
		$("#ModalPersetujuan").load("<?php echo site_url('Approve/formEdit')?>",{
		},function(responseTxt, statusTxt, xhr){
			if(statusTxt == "success"){
				$('#approvalbs-edit').modal({backdrop: 'static', keyboard: false});
				$('#approvalbs-edit').modal('show');
				$('#approvalbs-edit').on('hidden.bs.modal', function () {
					$('#ModalPersetujuan').html('');
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
			},
			error: function (jqXHR, textStatus, errorThrown)
			{
				console.log('Something Wrong!');
			}
		});
	}
	
	function approve()
	{
		$.ajax({
			url : "<?php echo site_url('Approve/setApprove')?>",
			type: "POST",
			data: $('#frmActivityEdit').serialize(),
			dataType: "JSON",
			beforeSend: function(){
				$('#btn-approve').html("<img src='<?php echo base_url();?>assets/image/core/loader.gif' style='height:20px;' /> Data sedang dikirim...");
			},
			success: function(data)
			{
				if(data.status) {
					swal(data.title, data.text, data.type);
					document.getElementById("btn-approve").setAttribute("disabled","disabled");
					document.getElementById("btn-revise").setAttribute("disabled","disabled");
					document.getElementById("btn-reject").setAttribute("disabled","disabled");
					$('#btn-approve').html("<i class='fa fa-save'></i> Setujui");
				} else {
					swal(data.title, data.text, data.type);
					$('#btn-approve').html("<i class='fa fa-save'></i> Setujui");
				}
			}
		});
	}

	function reject()
	{
		$.ajax({
			url : "<?php echo site_url('Approve/setReject')?>",
			type: "POST",
			data: $('#frmActivityEdit').serialize(),
			dataType: "JSON",
			beforeSend: function(){
				$('#btn-reject').html("<img src='<?php echo base_url();?>assets/image/core/loader.gif' style='height:20px;' /> Data sedang dikirim...");
			},
			success: function(data)
			{
				if(data.status) {
					swal(data.title, data.text, data.type);
					document.getElementById("btn-approve").setAttribute("disabled","disabled");
					document.getElementById("btn-revise").setAttribute("disabled","disabled");
					document.getElementById("btn-reject").setAttribute("disabled","disabled");
					$('#btn-reject').html("<i class='fa fa-save'></i> Tolak");
				} else {
					swal(data.title, data.text, data.type);
					$('#btn-reject').html("<i class='fa fa-save'></i> Tolak");
				}
			}
		});
	}

	function revise()
	{
		$.ajax({
			url : "<?php echo site_url('Approve/setRevise')?>",
			type: "POST",
			data: $('#frmActivityEdit').serialize(),
			dataType: "JSON",
			beforeSend: function(){
				$('#btn-revise').html("<img src='<?php echo base_url();?>assets/image/core/loader.gif' style='height:20px;' /> Data sedang dikirim...");
			},
			success: function(data)
			{
				if(data.status) {
					swal(data.title, data.text, data.type);
					document.getElementById("btn-approve").setAttribute("disabled","disabled");
					document.getElementById("btn-revise").setAttribute("disabled","disabled");
					document.getElementById("btn-reject").setAttribute("disabled","disabled");
					$('#btn-revise').html("<i class='fa fa-save'></i> Revisi");
				} else {
					swal(data.title, data.text, data.type);
					$('#btn-revise').html("<i class='fa fa-save'></i> Revisi");
				}
			}
		});
	}
	
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
		
		$('button#btn-approve').on('click', function () {
			approve();
		});

		$('button#btn-revise').on('click', function () {
			revise();
		});

		$('button#btn-reject').on('click', function () {
			reject();
		});

		$('tr.apprvlist').on('click',function(){
			var id = $(this).attr('data-id');
			modalUbah(id)
		});
		
		$('button#btn-keluar').on('click', function () {
			$("#btn-keluar").attr('data-dismiss', 'modal');
			setTimeout(
				function() {
					$("#content").load("<?php echo site_url('Approve')?>");
				}, 500
			);
		});
	});

</script>