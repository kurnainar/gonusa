<?php

    Class Realisasi Extends CI_Controller
    {
        Public Function __Construct()
        {
            Parent::__Construct();
			$this -> load -> model(array('M_Realisasi'));
			if($this -> session -> userdata('LoginStat') != true) {
				redirect(base_url("user/login"));
			}
        }

        Public Function Index()
        {
            $this -> load -> view('realisasi/realisasi-list');
        }

        Public Function listTable()
		{
			$Data = $this -> M_Realisasi -> getListData();
			echo json_encode($Data);
		}

        Public Function formEdit()
		{
			$this -> load -> view('realisasi/realisasi-edit');
		}

        Public Function setProcess()
        {
            $result = array('status' => false);

            $dateNow = date('YmdHis');
            $target_dir = 'assets/image/upload/';
            $datas = [
                'no_document'   => $this->input->post('realisasi-no'),
                'method'        => $this->input->post('realisasi-method'),
                'nama'          => $this->input->post('realisasi-nama'),
                'total_qty'     => $this->input->post('realisasi-qty'),
                'remarks'       => $this->input->post('realisasi-desc')
            ];

            $Flag = array(
                'flag_pemusnahan' => 1
            );

            // FOTO 1
            if ( isset($_FILES['realisasi-photo1']) && $_FILES['realisasi-photo1']['name'] != '' ) {
                $temp_name = $_FILES['realisasi-photo1']['name'];
                $ext = explode('.', $temp_name);
                $end = strtolower(end($ext));
                $timestamp = mt_rand(1, time());
                $randomDate = date("d M Y", $timestamp);
                $filename1 = md5($randomDate).'.'.$end;
    
                if ( !file_exists($target_dir) ) {
                    mkdir($target_dir, 0777, true);
                }
    
                move_uploaded_file($_FILES['realisasi-photo1']['tmp_name'], $target_dir.$filename1);
                $datas['photo_1'] = $filename1;
            }

            // FOTO 2
            if ( isset($_FILES['realisasi-photo2']) && $_FILES['realisasi-photo2']['name'] != '' ) {
                $temp_name = $_FILES['realisasi-photo2']['name'];
                $ext = explode('.', $temp_name);
                $end = strtolower(end($ext));
                $timestamp = mt_rand(1, time());
                $randomDate = date("d M Y", $timestamp);
                $filename2 = md5($randomDate).'.'.$end;
    
                if ( !file_exists($target_dir) ) {
                    mkdir($target_dir, 0777, true);
                }
    
                move_uploaded_file($_FILES['realisasi-photo2']['tmp_name'], $target_dir.$filename2);
                $datas['photo_2'] = $filename2;
            }

            // FOTO 3
            if ( isset($_FILES['realisasi-photo3']) && $_FILES['realisasi-photo3']['name'] != '' ) {
                $temp_name = $_FILES['realisasi-photo3']['name'];
                $ext = explode('.', $temp_name);
                $end = strtolower(end($ext));
                $timestamp = mt_rand(1, time());
                $randomDate = date("d M Y", $timestamp);
                $filename3 = md5($randomDate).'.'.$end;
    
                if ( !file_exists($target_dir) ) {
                    mkdir($target_dir, 0777, true);
                }
    
                move_uploaded_file($_FILES['realisasi-photo3']['tmp_name'], $target_dir.$filename3);
                $datas['photo_3'] = $filename3;
            }

            // FOTO 4
            if ( isset($_FILES['realisasi-photo4']) && $_FILES['realisasi-photo4']['name'] != '' ) {
                $temp_name = $_FILES['realisasi-photo4']['name'];
                $ext = explode('.', $temp_name);
                $end = strtolower(end($ext));
                $timestamp = mt_rand(1, time());
                $randomDate = date("d M Y", $timestamp);
                $filename4 = md5($randomDate).'.'.$end;
    
                if ( !file_exists($target_dir) ) {
                    mkdir($target_dir, 0777, true);
                }
    
                move_uploaded_file($_FILES['realisasi-photo4']['tmp_name'], $target_dir.$filename4);
                $datas['photo_4'] = $filename4;
            }

            if( array('status' => true) ) {
                if($this -> M_Realisasi -> saveRealisasi($datas)) {
                    $this-> M_Realisasi -> setFlagPemusnahan($Flag, array('no_document' => $this->input->post('realisasi-no')));
                    $result = array('status' => true, 'title' => 'Selamat!', 'text' => 'Berhasil Diproses', 'type' => 'success');
                }
			} else {
				$result = array('status' => false, 'title' => 'Maaf!', 'text' => 'Gagal Diproses', 'type' => 'warning');
			}

            echo json_encode($result);
        }
    }