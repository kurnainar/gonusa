<?php

	Class Approve Extends CI_Controller
	{
		Public Function __Construct()
		{
			Parent::__Construct();
			$this -> load -> model(array('M_ApprovalBS','M_Approve','M_Combo'));
			if($this -> session -> userdata('LoginStat') != true) {
				redirect(base_url("user/login"));
			}
		}
		
		Public Function Index()
		{
			$this -> load -> view('approve/approve-list');
		}
		
		Public Function listTable()
		{
			$Data = $this -> M_Approve -> getListData();
			echo json_encode($Data);
		}
        
        Public Function formEdit()
		{
			$Datas = [
				'product'	=> $this -> M_ApprovalBS -> getProduct()
			];
			$this -> load -> view('approve/approve-edit', $Datas);
		}
		
		Public Function getApproval($id)
		{
			$Data = $this -> M_Approve -> getApproval($id);
			echo json_encode($Data);
		}

        Public Function setApprove()
		{
			$result = array('status' => false);
			
			$id = array('no_document' => $this -> input -> post('absedit-no'));
            $document = $this -> M_Approve -> getPengajuan($this -> input -> post('absedit-no'));

           if(empty($document->approval1_status)) {
                $Data = array(
                    'approval1_id' => $this -> session -> userdata('Username'),
                    'approval1_status' => 1,
                    'approval1_date' => date('Y-m-d H:i:s'),
                    'status_id' => 2,
                    'update_at'	=> date('Y-m-d H:i:s')
                );
            }

            if(!empty($document->approval1_status)) {
                $Data = array(
                    'approval2_id' => $this -> session -> userdata('Username'),
                    'approval2_status' => 1,
                    'approval2_date' => date('Y-m-d H:i:s'),
                    'status_id' => 2,
                    'update_at'	=> date('Y-m-d H:i:s')
                );
            }

            if(!empty($document->approval2_status)) {
                $Data = array(
                    'approval3_id' => $this -> session -> userdata('Username'),
                    'approval3_status' => 1,
                    'approval3_date' => date('Y-m-d H:i:s'),
                    'status_id' => 2,
                    'update_at'	=> date('Y-m-d H:i:s')
                );
            }

            $DataLog = array(
                        'no_document'	=> $this -> input -> post('absedit-no'),
                        'status_id'		=> 2,
                        'approved_by'	=> $this -> session -> userdata('Username'),
                        'create_date'	=> date('Y-m-d H:i:s'),
                    );
			
			if( array('status' => true) ) {
				// $this -> M_Approve -> setApprove($Data, $id);
                if($this -> M_Approve -> setApprove($Data, $id)) {
                    $this -> M_ApprovalBS -> saveApprovalBSLog($DataLog);
                }
				$result = array('status' => true, 'title' => 'Selamat!', 'text' => 'Berhasil Menyetujui', 'type' => 'success');
			} else {
				$result = array('status' => false, 'title' => 'Maaf!', 'text' => 'Gagal Menyetujui', 'type' => 'warning');
			}
			
			echo json_encode($result);
		}

        Public Function setReject()
		{
			$result = array('status' => false);
			
			$id = array('no_document' => $this -> input -> post('absedit-no'));
            $document = $this -> M_Approve -> getPengajuan($this -> input -> post('absedit-no'));

           if(empty($document->approval1_status)) {
                $Data = array(
                    'approval1_id' => $this -> session -> userdata('Username'),
                    'approval1_status' => 1,
                    'approval1_date' => date('Y-m-d H:i:s'),
                    'status_id' => 3,
                    'update_at'	=> date('Y-m-d H:i:s')
                );
            }

            if(!empty($document->approval1_status)) {
                $Data = array(
                    'approval2_id' => $this -> session -> userdata('Username'),
                    'approval2_status' => 1,
                    'approval2_date' => date('Y-m-d H:i:s'),
                    'status_id' => 3,
                    'update_at'	=> date('Y-m-d H:i:s')
                );
            }

            $DataLog = array(
                        'no_document'	=> $this -> input -> post('absedit-no'),
                        'status_id'		=> 3,
                        'approved_by'	=> $this -> session -> userdata('Username'),
                        'create_date'	=> date('Y-m-d H:i:s'),
                    );
			
			if( array('status' => true) ) {
				// $this -> M_Approve -> setApprove($Data, $id);
                if($this -> M_Approve -> setApprove($Data, $id)) {
                    $this -> M_ApprovalBS -> saveApprovalBSLog($DataLog);
                }
				$result = array('status' => true, 'title' => 'Selamat!', 'text' => 'Berhasil Menolak', 'type' => 'success');
			} else {
				$result = array('status' => false, 'title' => 'Maaf!', 'text' => 'Gagal Menolak', 'type' => 'warning');
			}
			
			echo json_encode($result);
		}

        Public Function setRevise()
		{
			$result = array('status' => false);
			
			$id = array('no_document' => $this -> input -> post('absedit-no'));
            $document = $this -> M_Approve -> getPengajuan($this -> input -> post('absedit-no'));

           if(empty($document->approval1_status)) {
                $Data = array(
                    'status_id' => 4,
                    'update_at'	=> date('Y-m-d H:i:s')
                );
            }

            if(!empty($document->approval1_status)) {
                $Data = array(
                    'status_id' => 4,
                    'update_at'	=> date('Y-m-d H:i:s')
                );
            }

            $DataLog = array(
                        'no_document'	=> $this -> input -> post('absedit-no'),
                        'status_id'		=> 4,
                        'approved_by'	=> $this -> session -> userdata('Username'),
                        'create_date'	=> date('Y-m-d H:i:s'),
                    );
			
			if( array('status' => true) ) {
				// $this -> M_Approve -> setApprove($Data, $id);
                if($this -> M_Approve -> setApprove($Data, $id)) {
                    $this -> M_ApprovalBS -> saveApprovalBSLog($DataLog);
                }
				$result = array('status' => true, 'title' => 'Selamat!', 'text' => 'Berhasil Meminta Revisi', 'type' => 'success');
			} else {
				$result = array('status' => false, 'title' => 'Maaf!', 'text' => 'Gagal Meminta Revisi', 'type' => 'warning');
			}
			
			echo json_encode($result);
		}

        Public Function setSubmit()
		{
			$result = array('status' => false);
			
			$id = array('no_document' => $this -> input -> post('absedit-no'));
            $document = $this -> M_Approve -> getPengajuan($this -> input -> post('absedit-no'));

           if(empty($document->approval1_status)) {
                $Data = array(
                    'status_id' => 1,
                    'update_at'	=> date('Y-m-d H:i:s')
                );
            }

            if(!empty($document->approval1_status)) {
                $Data = array(
                    'status_id' => 1,
                    'update_at'	=> date('Y-m-d H:i:s')
                );
            }

            $DataLog = array(
                        'no_document'	=> $this -> input -> post('absedit-no'),
                        'status_id'		=> 1,
                        'approved_by'	=> $this -> session -> userdata('Username'),
                        'create_date'	=> date('Y-m-d H:i:s'),
                    );
			
			if( array('status' => true) ) {
				// $this -> M_Approve -> setApprove($Data, $id);
                if($this -> M_Approve -> setApprove($Data, $id)) {
                    $this -> M_ApprovalBS -> saveApprovalBSLog($DataLog);
                }
				$result = array('status' => true, 'title' => 'Selamat!', 'text' => 'Berhasil Direvisi', 'type' => 'success');
			} else {
				$result = array('status' => false, 'title' => 'Maaf!', 'text' => 'Gagal Direvisi', 'type' => 'warning');
			}
			
			echo json_encode($result);
		}
    }