<div class="modal fade" id="realisasi-edit">
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
						<form id="frmActivityProcess" class="form-content">
							<div class="row">
								<div class="col-sm-4">
									<div class="form-group">
										<label for="realisasi-no">No. Dokumen:</label>
										<input type="text" class="form-control" id="realisasi-no" name="realisasi-no" readonly>
									</div>
								</div>

								<div class="col-sm-4">
									<div class="form-group">
										<label for="realisasi-method">Metode Pemusnahan:</label>
										<select class="form-control" id="realisasi-method" name="realisasi-method">
											<option value = "">--- Pilih ---</option>
											<option value = "1" selected>Menggunakan Vendor</option>
											<option value = "2">Internal</option>
										</select>
									</div>
								</div>

								<div class="col-sm-4">
									<div class="form-group">
										<label for="realisasi-qty" id="labels">Nama Vendor:</label>
										<input type="text" class="form-control" id="realisasi-nama" name="realisasi-nama">
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-sm-3">
									<div class="form-group">
										<label for="realisasi-qty" id="photo1">Foto Sebelum Proses Muat:</label>
										<input type="file" class="form-control" id="realisasi-photo1" name="realisasi-photo1">
									</div>
								</div>
								
								<div class="col-sm-3">
									<div class="form-group">
										<label for="realisasi-desc" id="photo2">Foto Saat Proses Muat:</label>
										<input type="file" class="form-control" id="realisasi-photo2" name="realisasi-photo2">
									</div>
								</div>

								<div class="col-sm-3">
									<div class="form-group">
										<label for="realisasi-desc" id="photo3">Foto Setelah Barang Masuk Mobil:</label>
										<input type="file" class="form-control" id="realisasi-photo3" name="realisasi-photo3">
									</div>
								</div>

								<div id="sembunyi">
									<div class="col-sm-3">
										<div class="form-group">
											<label for="realisasi-desc" id="photo4">Foto Saat Pemusnahan:</label>
											<input type="file" class="form-control" id="realisasi-photo4" name="realisasi-photo4">
										</div>
									</div>
								</div>
							</div>
								
							<div class="row">
								<div class="col-sm-2">
									<div class="form-group">
										<label for="realisasi-qty">Total Qty:</label>
										<input type="number" class="form-control" id="realisasi-qty" name="realisasi-qty">
									</div>
								</div>
								
								<div class="col-sm-4">
								<div class="form-group">
										<label for="realisasi-desc">Remark:</label>
										<textarea class="form-control" id="realisasi-desc" name="realisasi-desc" rows="4"></textarea>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<div id="progress">
					<button type="submit" class="btn btn-success" id="btn-proses"><i class="fa fa-save"></i> Proses </button>
					<button type="button" class="btn btn-default" id="btn-keluar" data-dismiss="modal"><i class="fa fa-close"></i> Keluar </button>
				</div>
			</div>
		</div>
	</div>
</div>

<?php $this -> load -> view('realisasi/realisasi-js'); ?>