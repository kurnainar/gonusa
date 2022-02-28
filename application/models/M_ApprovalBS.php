<?php

	Class M_ApprovalBS Extends CI_Model
	{
		var $table = "t_pengajuan";
		var $table2 = "t_pengajuan_log";
		
		public function autonumber()
		{
			$this->db->select('Right(no_document,3) as kode ',false);
            $this->db->order_by('no_document', 'desc');
            $this->db->limit(1);
            $query = $this->db->get($this->table);
            if($query->num_rows()<>0){
                $data = $query->row();
                $kode = intval($data->kode)+1;
            }else{
                $kode = 1;

            }
            $kodemax = str_pad($kode,3,"0",STR_PAD_LEFT);
            $tanggal = date('ym');
            $kodejadi  = "BS".$tanggal.$kodemax;
            return $kodejadi;
		}
		
		Public Function getListData()
		{
			$result = array();
			$this -> db -> from("v_pengajuan");
			$query = $this -> db -> get();
			
			// echo "<pre>";
			// echo $this -> db -> last_query();
			// echo "</pre>";
			
			return $query -> result_array();
		}

		Public Function getProduct()
		{
			$this -> db -> from("m_product");
			$query = $this -> db -> get();

			return $query->result_array();
		}
		
		Public Function saveApprovalBS($data)
		{
			$this -> db -> insert($this->table, $data);
			Return $this -> db -> insert_id();
		}

		Public Function saveApprovalBSLog($data)
		{
			$this -> db -> insert($this->table2, $data);
			Return $this -> db -> insert_id();
		}

		Public Function getProductbyID($id)
		{
			$this -> db -> from("m_product");
			$this -> db -> where('product_id',$id);
			$query = $this -> db -> get();

			return $query->result_array();
		}
		
		Public Function getApprovalBS($id)
		{
			$this -> db -> from($this->table);
			$this -> db -> where('pengajuan_id',$id);
			$query = $this -> db -> get();

			return $query->row();
		}
		
		Public Function updateDailyActivity($data, $where)
		{
			$this -> db -> update($this->table, $data, $where);
			return $this -> db -> affected_rows();
		}
	}

?>