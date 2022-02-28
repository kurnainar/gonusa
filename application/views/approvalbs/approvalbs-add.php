<div class="modal fade" id="activity-add">
	<div class="modal-dialog modal-lg" style="width:70%;">
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
						<form id="frmApprovalAdd">
							<div class="row">
								<div class="col-sm-2">
									<div class="form-group">
										<label for="absadd-no">No. Dokumen:</label>
										<input type="text" class="form-control" id="absadd-no" name="absadd-no" value="<?php echo $autonumber; ?>" readonly>
									</div>
								</div>

								<div class="col-sm-4">
									<div class="form-group">
										<label for="absadd-product">Produk:</label>
										<select class="form-control" id="absadd-product" name="absadd-product">
											<option value = "">--- Pilih ---</option>
											<?php foreach($product as $data => $rows) : ?>
											<option value = "<?php echo $rows['product_id']; ?>"><?php echo $rows['product_name']; ?></option>
											<?php endforeach; ?>
										</select>
									</div>
								</div>
								
								<div class="col-sm-2">
									<div class="form-group">
										<label for="absadd-qty">Qty:</label>
										<input type="number" class="form-control" id="absadd-qty" name="absadd-qty">
									</div>
								</div>
								
								<div class="col-sm-4">
								<div class="form-group">
										<label for="absadd-desc">Alasan Pemusnahan:</label>
										<textarea class="form-control" id="absadd-desc" name="absadd-desc" rows="4"></textarea>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<div id="progress">
					<button type="button" class="btn btn-success" id="btn-simpan-abs"><i class="fa fa-save"></i> Simpan </button>
					<button type="button" class="btn btn-default" id="btn-keluar-abs"><i class="fa fa-close"></i> Keluar </button>
				</div>
			</div>
		</div>
	</div>
</div>

<?php $this -> load -> view('approvalbs/approvalbs-js'); ?>