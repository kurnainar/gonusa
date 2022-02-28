<?php

    Class M_Approve Extends CI_Model
    {
        var $t_pengajuan = 't_pengajuan';
        var $v_list = 'v_approvallist';
        var $v_persetujuan1 = 'v_approve_1';
        var $v_persetujuan2 = 'v_approve_2';
        var $v_persetujuan3 = 'v_approve_3';

        Public Function getListData()
		{
			$result = array();
			
            if($this -> session -> userdata('Group') == 3) {
                $this -> db -> from($this->v_persetujuan1);
            } elseif($this -> session -> userdata('Group') == 5) {
                $this -> db -> from($this->v_persetujuan2);
            } elseif($this -> session -> userdata('Group') == 6) {
                $this -> db -> from($this->v_persetujuan3);
            } else {
                $this -> db -> from($this->v_list);
            }

            $query = $this -> db -> get();
			
			return $query -> result_array();
		}

        Public Function getApproval($id)
		{
			$this -> db -> from($this->t_pengajuan);
			$this -> db -> where('pengajuan_id',$id);
			$query = $this -> db -> get();

			return $query->row();
		}

        Public Function getPengajuan($id)
		{
			$this -> db -> from($this->t_pengajuan);
			$this -> db -> where('no_document',$id);
			$query = $this -> db -> get();

			return $query->row();
		}

        Public Function setApprove($data, $where)
		{
			$this -> db -> update($this->t_pengajuan, $data, $where);
			return $this -> db -> affected_rows();
		}
    }