<?php

    Class Product Extends CI_Controller
    {
        public function __construct()
        {
            parent::__construct();
            $this -> load -> model(array('M_Product'));
        }

        Public Function Index()
		{
			if($this -> session -> userdata('LoginStat')) {
				$this -> load -> view('product/product-list');
			}
		}

        Public Function listTable()
		{
			if($this -> session -> userdata('LoginStat')) {
				$Data = $this -> M_Product -> getListData();
				echo json_encode($Data);
			}
		}

        Public Function formAdd()
		{
			if($this -> session -> userdata('LoginStat')) {
				$this -> load -> view('product/product-add');
			}
		}

        Public Function saveProduct()
		{
			if($this -> session -> userdata('LoginStat')) {
				$result = array('status' => false);
				
				$Data = array(
							'product_name'	=> ucwords($this -> input -> post('proudadd-nama')),
							'stock'		=> $this -> input -> post('proudadd-qty')
						);
						
                if( array('status' => true) ) {
                    $this -> M_Product -> saveProduct($Data);
                    $result = array('status' => true, 'title' => 'Selamat!', 'text' => 'Produk Berhasil Ditambahkan', 'type' => 'success');
                } else {
                    $result = array('status' => false, 'title' => 'Maaf!', 'text' => 'Produk Gagal Ditambahkan', 'type' => 'warning');
                }
				
				echo json_encode($result);
			}
		}

        Public Function formEdit()
		{
			if($this -> session -> userdata('LoginStat')) {
				$this -> load -> view('product/product-edit');
			}
		}

        Public Function getProduct($id)
		{
			if($this -> session -> userdata('LoginStat')) {
				$Data = $this -> M_Product -> getProduct($id);
				echo json_encode($Data);
			}
		}

        Public Function updateProduct()
		{
			if($this -> session -> userdata('LoginStat')) {
				$result = array('status' => false);
				
				$id = array('product_id' => $this -> input -> post('prodedit-id'));
				
				$Data = array(
                            'product_name'	=> ucwords($this -> input -> post('prodedit-nama')),
                            'stock'		=> $this -> input -> post('prodedit-qty')
                        );
				
				if( array('status' => true) ) {
					$this -> M_Product -> updateProduct($Data, $id);
					$result = array('status' => true, 'title' => 'Selamat!', 'text' => 'Produk Berhasil Diubah', 'type' => 'success');
				} else {
					$result = array('status' => false, 'title' => 'Maaf!', 'text' => 'Produk Gagal Diubah', 'type' => 'warning');
				}
				
				echo json_encode($result);
			}
		}
		
		Public Function deleteProduct()
		{
			if($this -> session -> userdata('LoginStat')) {
				$result = array('status' => false);
				
				$id = $this -> input -> post('prodedit-id');
				
				if( array('status' => true) ) {
					$this -> M_Product -> deleteProduct($id);
					$result = array('status' => true, 'title' => 'Selamat!', 'text' => 'Product Berhasil Dihapus', 'type' => 'success');
				} else {
					$result = array('status' => false, 'title' => 'Maaf!', 'text' => 'Product Gagal Dihapus', 'type' => 'warning');
				}
				
				echo json_encode($result);
			}
		}
    }