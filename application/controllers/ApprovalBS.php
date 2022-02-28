<?php

	Class ApprovalBS Extends CI_Controller
	{
		Public Function __Construct()
		{
			Parent::__Construct();
			$this -> load -> model(array('M_ApprovalBS','M_Combo'));
			if($this -> session -> userdata('LoginStat') != true) {
				redirect(base_url("user/login"));
			}
		}
		
		Public Function Index()
		{
			$this -> load -> view('approvalbs/approvalbs-list');
		}
		
		Public Function listTable()
		{
			$Data = $this -> M_ApprovalBS -> getListData();
			echo json_encode($Data);
		}

		public function auto_number()
		{        
			$row = $this -> M_Autonumber -> id_terakhir();
			$config['id'] = $row -> no_document;
			$config['awalan'] = 'ABS';
			$config['digit'] = 4;
			$this-> auto_number -> config($config);
			echo $this -> auto_number -> generate_id();
		}
		
		Public Function formAdd()
		{
			$Datas = [
				'autonumber'=> $this -> M_ApprovalBS -> autonumber(),
				'product'	=> $this -> M_ApprovalBS -> getProduct()
			];

			$this -> load -> view('approvalbs/approvalbs-add', $Datas);
		}
		
		Public Function saveApprovalBS()
		{
			$result = array('status' => false);
			
			$product_id = $this -> input -> post('absadd-product');
			$qty = $this -> input -> post('absadd-qty');
			$product = $this -> M_ApprovalBS -> getProductbyID($product_id);

			if($qty > $product[0]['stock']) {
				$result = array('status' => false, 'title' => 'Maaf!', 'text' => 'Stok tidak cukup', 'type' => 'warning');
			} else {
				$Data = array(
							'no_document'	=> $this -> input -> post('absadd-no'),
							'qty'			=> $this -> input -> post('absadd-qty'),
							'product_id'	=> $this -> input -> post('absadd-product'),
							'status_id'		=> 1,
							'reason'		=> $this -> input -> post('absadd-desc')
						);

				$DataLog = array(
							'no_document'	=> $this -> input -> post('absadd-no'),
							'status_id'		=> 1,
							'create_date'	=> date('Y-m-d H:i:s'),
						);
						
				if( array('status' => true) ) {
					if($this -> M_ApprovalBS -> saveApprovalBS($Data)) {
						$this -> M_ApprovalBS -> saveApprovalBSLog($DataLog);
					}
					$result = array('status' => true, 'title' => 'Selamat!', 'text' => 'Approval BS Berhasil Ditambahkan', 'type' => 'success');
				} else {
					$result = array('status' => false, 'title' => 'Maaf!', 'text' => 'Approval BS Gagal Ditambahkan', 'type' => 'warning');
				}
			}
			
			echo json_encode($result);
		}

		Public Function formEdit()
		{
			$Datas = [
				'product'	=> $this -> M_ApprovalBS -> getProduct()
			];

			$this -> load -> view('approvalbs/approvalbs-edit', $Datas);
		}
	}

?>