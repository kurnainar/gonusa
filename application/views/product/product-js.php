<script>
    
    function listTable(){
		$.ajax({
			type  : 'ajax',
			url   : '<?php echo site_url('Product/listTable')?>',
			async : false,
			dataType : 'json',
			success : function(data){
				var html = '';
				var i;
				var no = 1;
				for(i=0; i<data.length; i++){
					html += '<tr id="userlist" class="userlist" data-id="'+data[i].product_id+'" style="cursor: pointer;">'+
							'<td class="tengah">'+no+'</td>'+
							'<td class="kiri">'+data[i].product_name+'</td>'+
							'<td class="tengah">'+data[i].stock+'</td>'+
							'</tr>';
					no++;
				}
				$('#show_data').html(html);
			}
		});
	}

    function modalTambah()
	{
		$("#ModalProduct").load("<?php echo site_url('Product/formAdd')?>",{
		},function(responseTxt, statusTxt, xhr){
			if(statusTxt == "success"){
				$('#product-add').modal({backdrop: 'static', keyboard: false});
				$('#product-add').modal('show');
				$('#product-add').on('hidden.bs.modal', function () {
					$('#ModalProduct').html('');
				});
			}
			
			if(statusTxt == "error"){
				console.log("Error: " + xhr.status + ": " + xhr.statusText);
				return false;
			}
		});
	}

    function validatorTambah()
	{
		var form = {
				product	: document.getElementById("proudadd-nama").value,
				qty		: document.getElementById("proudadd-qty").value
			}
			
        if(form['product'] == "") {
            swal("Maaf!", "Nama produk tidak boleh kosong!", "warning");
        } else if(form['qty'] == "") {
            swal("Maaf!", "Stok tidak boleh kosong!", "warning");
        } else {
            submit();
        }
	}

    function submit()
	{
		$.ajax({
			url : "<?php echo site_url('Product/saveProduct')?>",
			type: "POST",
			data: $('#frmProductAdd').serialize(),
			dataType: "JSON",
			beforeSend: function(){
				$('#btn-simpan-prod').html("<img src='<?php echo base_url();?>assets/image/core/loader.gif' style='height:20px;' /> Data sedang dikirim...");
			},
			success: function(data)
			{
				if(data.status) {
					swal(data.title, data.text, data.type);
					document.getElementById("btn-simpan-prod").setAttribute("disabled","disabled");
					$('#btn-simpan-prod').html("<i class='fa fa-save'></i> Simpan");
				} else {
					swal(data.title, data.text, data.type);
					$('#btn-simpan-prod').html("<i class='fa fa-save'></i> Simpan");
				}
			}
		});
	}

    function modalUbah(id)
	{
		$("#ModalProduct").load("<?php echo site_url('Product/formEdit')?>",{
		},function(responseTxt, statusTxt, xhr){
			if(statusTxt == "success"){
				$('#product-edit').modal({backdrop: 'static', keyboard: false});
				$('#product-edit').modal('show');
				$('#product-edit').on('hidden.bs.modal', function () {
					$('#ModalProduct').html('');
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
			url : "<?php echo site_url('Product/getProduct')?>/" + id,
			type: "GET",
			dataType: "JSON",
			success: function(data)
			{
				$('[name="prodedit-id"]').val(data.product_id);
				$('[name="prodedit-nama"]').val(data.product_name);
				$('[name="prodedit-qty"]').val(data.stock);
			},
			error: function (jqXHR, textStatus, errorThrown)
			{
				console.log('Something Wrong!');
			}
		});
	}

    function validatorUpdate()
	{
		var form = {
				product	: document.getElementById("prodedit-nama").value,
				qty		: document.getElementById("prodedit-qty").value
			}
			
        if(form['product'] == "") {
            swal("Maaf!", "Nama produk tidak boleh kosong!", "warning");
        } else if(form['qty'] == "") {
            swal("Maaf!", "Stok tidak boleh kosong!", "warning");
        } else {
            update();
        }
	}
	
	function update()
	{
		$.ajax({
			url : "<?php echo site_url('Product/updateProduct')?>",
			type: "POST",
			data: $('#frmProductEdit').serialize(),
			dataType: "JSON",
			beforeSend: function(){
				$('#btn-ubah-prod').html("<img src='<?php echo base_url();?>assets/image/core/loader.gif' style='height:20px;' /> Data sedang dikirim...");
			},
			success: function(data)
			{
				if(data.status) {
					swal(data.title, data.text, data.type);
					document.getElementById("btn-ubah-prod").setAttribute("disabled","disabled");
					document.getElementById("btn-hapus-prod").setAttribute("disabled","disabled");
					$('#btn-ubah-prod').html("<i class='fa fa-save'></i> Simpan");
				} else {
					swal(data.title, data.text, data.type);
					$('#btn-ubah-prod').html("<i class='fa fa-save'></i> Simpan");
				}
			}
		});
	}
	
	function hapus()
	{
		$.ajax({
			url : "<?php echo site_url('User/deleteUser')?>",
			type: "POST",
			data: $('#frmUserEdit').serialize(),
			dataType: "JSON",
			beforeSend: function(){
				$('#btn-hapus-user').html("<img src='<?php echo base_url();?>assets/image/core/loader.gif' style='height:20px;' /> Data sedang dikirim...");
			},
			success: function(data)
			{
				if(data.status) {
					swal(data.title, data.text, data.type);
					document.getElementById("btn-ubah-user").setAttribute("disabled","disabled");
					document.getElementById("btn-hapus-user").setAttribute("disabled","disabled");
					$('#btn-hapus-user').html("<i class='fa fa-save'></i> Simpan");
				} else {
					swal(data.title, data.text, data.type);
					$('#btn-hapus-user').html("<i class='fa fa-save'></i> Simpan");
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
			// bFilter: false,
			stateSave: true,
			orderCellsTop: true,
			fixedHeader: true,
			retrieve: true,
			"buttons": [{
							"text": '<i class="fa fa-fw fa-plus-circle"></i> Tambah',
							"action": function ( e, dt, node, config ) {
								modalTambah();
							}
						}, {
							"text": '<i class="fa fa-fw fa-eraser"></i> Reset',
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
		
		$('tr.userlist').on('click',function(){
			var id = $(this).attr('data-id');
			modalUbah(id)
		});
		
		$('button#btn-keluar-prod').on('click', function () {
			$("#btn-keluar-prod").attr('data-dismiss', 'modal');
			setTimeout(
				function() {
					$("#content").load("<?php echo site_url('Product')?>");
				}, 500
			);
		});
		
		$('button#btn-simpan-prod').on('click', function () {
			validatorTambah();
		});
		
		$('button#btn-ubah-prod').on('click', function () {
			validatorUpdate();
		});
		
		$('button#btn-hapus-prod').on('click', function () {
			hapus();
		});
	});

</script>