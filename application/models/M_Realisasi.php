<?php

    Class M_Realisasi extends CI_Model
    {
        var $t_pemusnahan = 't_pemusnahan';
        var $t_pengajuan = 't_pengajuan';
        var $v_realisasi = 'v_realisasi';
        
        Public Function getListData()
        {
            $result = array();
			$this -> db -> from($this -> v_realisasi);
			$query = $this -> db -> get();
			
			echo "<pre>";
			echo $this -> db -> last_query();
			echo "</pre>";
			
			return $query -> result_array();
        }

        Public Function saveRealisasi($data)
		{
			$this -> db -> insert($this->t_pemusnahan, $data);
			Return $this -> db -> insert_id();
		}

        Public Function setFlagPemusnahan($data, $where)
		{
			$this -> db -> update($this->t_pengajuan, $data, $where);
			return $this -> db -> affected_rows();
		}
    }
    