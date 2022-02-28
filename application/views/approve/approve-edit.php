<div class="modal fade" id="approvalbs-edit">
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
						<form id="frmActivityEdit">
							<div class="row">
								<div class="col-sm-2">
									<div class="form-group">
										<label for="absedit-no">No. Dokumen:</label>
										<input type="text" class="form-control" id="absedit-no" name="absedit-no" readonly>
									</div>
								</div>

								<div class="col-sm-4">
									<div class="form-group">
										<label for="absedit-product">Produk:</label>
										<select class="form-control" id="absedit-product" name="absedit-product">
											<option value = "">--- Pilih ---</option>
											<?php foreach($product as $data => $rows) : ?>
											<option value = "<?php echo $rows['product_id']; ?>"><?php echo $rows['product_name']; ?></option>
											<?php endforeach; ?>
										</select>
									</div>
								</div>
								
								<div class="col-sm-2">
									<div class="form-group">
										<label for="absedit-qty">Qty:</label>
										<input type="number" class="form-control" id="absedit-qty" name="absedit-qty">
									</div>
								</div>
								
								<div class="col-sm-4">
								<div class="form-group">
										<label for="absedit-desc">Alasan Pemusnahan:</label>
										<textarea class="form-control" id="absedit-desc" name="absedit-desc" rows="4"></textarea>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<div id="progress">
				<button type="button" class="btn btn-success" id="btn-approve"><i class="fa fa-save"></i> Setujui </button>
					<?php
						if($this -> session -> userdata('Group') == 3 || $this -> session -> userdata('Group') == 4 || $this -> session -> userdata('Group') == 5) {
					?>
					<button type="button" class="btn btn-warning" id="btn-revise"><i class="fa fa-save"></i> Revisi </button>
					<button type="button" class="btn btn-danger" id="btn-reject"><i class="fa fa-save"></i> Tolak </button>
					<?php
						}
					?>
					
					
					<button type="button" class="btn btn-default" id="btn-keluar" data-dismiss="modal"><i class="fa fa-close"></i> Keluar </button>
				</div>
			</div>
		</div>
	</div>
</div>

<?php $this -> load -> view('approve/approve-js'); ?>