<div class="modal fade" id="product-edit">
	<div class="modal-dialog modal-lg" style="width:95%;">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">
					<span class="glyphicon glyphicon-plus-sign"></span>
					&nbsp;Ubah
				</h4>
			</div>
			<div class="modal-body">
				<div class="panel panel-default">
					<div class="panel-body">
						<form id="frmProductEdit">
							<input type="hidden" id="prodedit-id" name="prodedit-id">
							<div class="row">
                                <div class="col-sm-10">
									<div class="form-group">
										<label for="prodedit-nama">Nama Produk/Barang:</label>
										<input type="text" class="form-control" id="prodedit-nama" name="prodedit-nama" maxlength="50">
										<small>*Info: Maksimal 50 Karakter</small>
									</div>
								</div>
								
								<div class="col-sm-2">
									<div class="form-group">
										<label for="prodedit-qty">Stok:</label>
										<input type="text" class="form-control" id="prodedit-qty" name="prodedit-qty">
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<div id="progress">
					<button type="button" class="btn btn-success" id="btn-ubah-prod"><i class="fa fa-save"></i> Ubah </button>
					<button type="button" class="btn btn-danger" id="btn-hapus-prod"><i class="fa fa-trash"></i> Hapus </button>
					<button type="button" class="btn btn-default" id="btn-keluar-prod"><i class="fa fa-close"></i> Keluar </button>
				</div>
			</div>
		</div>
	</div>
</div>

<?php $this -> load -> view('product/product-js'); ?>