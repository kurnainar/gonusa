<?php

	Class M_User Extends CI_Model
	{
		var $table = "m_user";
		
		Public Function getListData()
		{
			$result = array();
			$this -> db -> from("v_userlist");
			
			if($this -> session -> userdata('Group') == 6) {
				$this -> db -> where_not_in("UserGroupId", 1);
			}
			$query = $this -> db -> get();
			
			// echo "<pre>";
			// echo $this -> db -> last_query();
			// echo "</pre>";
			
			return $query -> result_array();
		}
		
		Public Function getAvailable($user)
		{
			$result = array();
			$this -> db -> select("a.UserId, a.Username");
			$this -> db -> from("m_user a");
			$this -> db -> where("a.Username", $user);
			$query = $this -> db -> get();
			
			if($query -> num_rows() > 0)
			{
				foreach($query -> result_array() as $rows)
				{
					$result[$rows['UserId']] = $rows;
				}
			}
			
			return $result;
		}
		
		Public Function saveUser($data)
		{
			$this -> db -> insert($this->table, $data);
			Return $this -> db -> insert_id();
		}
		
		Public Function getUser($id)
		{
			$this -> db -> from("m_user");
			$this -> db -> where('UserId',$id);
			$query = $this -> db -> get();

			return $query->row();
		}
		
		Public Function updateUser($data, $where)
		{
			$this -> db -> update($this->table, $data, $where);
			return $this -> db -> affected_rows();
		}
		
		Public Function deleteUser($where)
		{
			$this -> db -> where('UserId', $where);
			$this -> db -> delete($this->table);
			return $this -> db -> affected_rows();
		}
		
		Public Function cekAvailable($username)
		{
			$this -> db -> select("*");
			$this -> db -> from("m_user a");
			$this -> db -> where('Username', $username);
			$query = $this -> db -> get();

			return $query->row();
		}
		
		Public Function saveActivityLogin($data)
		{
			if($this -> db -> insert("t_user_activity",$data)) {
				$this -> db -> set('LoginStatus', 1);
				$this -> db -> set('LastLogin', date('Y-m-d H:i:s'));
				$this -> db -> where('Username', $data['Username']);
				$this -> db -> update($this->table);
			}
			Return $this->db->insert_id();
		}
		
		Public Function changePassword($data, $where)
		{
			$this -> db -> update($this->table, $data, $where);
			return $this -> db -> affected_rows();
		}
		
		Public Function saveActivityLogout($data)
		{
			if($this -> db -> insert("t_user_activity",$data)) {
				$this -> db -> set('LoginStatus', 0);
				$this -> db -> set('LastLogout', date('Y-m-d H:i:s'));
				$this -> db -> where('Username', $data['Username']);
				$this -> db -> update($this->table);
			}
			Return $this->db->insert_id();
		}
	}

?>