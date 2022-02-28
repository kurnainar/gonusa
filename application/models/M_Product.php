<?php

    Class M_Product Extends CI_Model
    {
        var $table = "m_product";

        Public Function getListData()
		{
			$result = array();
			$this -> db -> from("m_product");
			$query = $this -> db -> get();
			
			// echo "<pre>";
			// echo $this -> db -> last_query();
			// echo "</pre>";
			
			return $query -> result_array();
		}

        Public Function saveProduct($data)
		{
			$this -> db -> insert($this->table, $data);
			Return $this -> db -> insert_id();
		}

        Public Function getProduct($id)
		{
			$this -> db -> from($this->table);
			$this -> db -> where('product_id',$id);
			$query = $this -> db -> get();

			return $query->row();
		}

        Public Function updateProduct($data, $where)
		{
			$this -> db -> update($this->table, $data, $where);
			return $this -> db -> affected_rows();
		}
		
		Public Function deleteProduct($where)
		{
			$this -> db -> where('product_id', $where);
			$this -> db -> delete($this->table);
			return $this -> db -> affected_rows();
		}
    }