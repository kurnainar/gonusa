<div class="modal fade" id="product-add">
	<div class="modal-dialog modal-lg" style="width:75%;">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">
					<span class="glyphicon glyphicon-plus-sign"></span>
					&nbsp;Tambah
				</h4>
			</div>
			<div class="modal-body">
				<div class="panel panel-default">
					<div class="panel-body">
						<form id="frmProductAdd">
							<div class="row">
								<div class="col-sm-10">
									<div class="form-group">
										<label for="proudadd-nama">Nama Produk/Barang:</label>
										<input type="text" class="form-control" id="proudadd-nama" name="proudadd-nama" maxlength="50">
										<small>*Info: Maksimal 50 Karakter</small>
									</div>
								</div>
								
								<div class="col-sm-2">
									<div class="form-group">
										<label for="proudadd-qty">Stok:</label>
										<input type="text" class="form-control" id="proudadd-qty" name="proudadd-qty">
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<div id="progress">
					<button type="button" class="btn btn-success" id="btn-simpan-prod"><i class="fa fa-save"></i> Simpan </button>
					<button type="button" class="btn btn-default" id="btn-keluar-prod"><i class="fa fa-close"></i> Keluar </button>
				</div>
			</div>
		</div>
	</div>
</div>

<?php $this -> load -> view('product/product-js'); ?>