<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Song extends CI_Controller 
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('song_model','song');
	}

	public function index()
	{
		$this->load->helper('url');
		$this->load->view('login_view');
	}

	public function loadHome()
	{
		$this->load->helper('url');
		$this->load->view('home');
	}

	public function loadAlbum()
	{
		$this->load->helper('url');
		$this->load->view('album_view');
	}

	public function loadLagu()
	{
		$this->load->helper('url');
		$this->load->view('song_view');
	}

	public function ajax_list()
	{
		$list = $this->song->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $song)
                {
			$no++;
			$row = array();
			$row[] = $song->id;
			$row[] = $song->idLagu;
			$row[] = $song->namaLagu;
			$row[] = $song->namaAlbum;
			

			//add html for action
			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_lagu('."'".$song->id."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
				  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_lagu('."'".$song->id."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->song->count_all(),
						"recordsFiltered" => $this->song->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_edit($id)
	{
		$data = $this->song->get_by_id($id);
		//$data->dob = ($data->dob == '0000-00-00') ? '' : $data->dob; // if 0000-00-00 set tu empty for datepicker compatibility
		echo json_encode($data);
	}

	public function ajax_add()
	{
		$this->_validate();
		$data = array(
				'idLagu' => $this->input->post('idLagu'),
				'namaLagu' => $this->input->post('namaLagu'),
				'namaAlbum' => $this->input->post('namaAlbum'),
				
			);
		$insert = $this->song->save($data);
		echo json_encode(array("status" => TRUE));
	} 

	public function ajax_update()
	{
		$this->_validate();
		$data = array(
				'idLagu' => $this->input->post('idLagu'),
				'namaLagu' => $this->input->post('namaLagu'),
				'namaAlbum' => $this->input->post('namaAlbum'),
				
			);
		$this->song->update(array('id' => $this->input->post('id')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($id)
	{
		$this->song->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}


	private function _validate()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if($this->input->post('idLagu') == '')
		{
			$data['inputerror'][] = 'idLagu';
			$data['error_string'][] = 'Id Lagu is required';
			$data['status'] = FALSE;
		}

		if($this->input->post('namaLagu') == '')
		{
			$data['inputerror'][] = 'namaLagu';
			$data['error_string'][] = 'Nama Lagu is required';
			$data['status'] = FALSE;
		}

		if($this->input->post('namaAlbum') == '')
		{
			$data['inputerror'][] = 'namaAlbum';
			$data['error_string'][] = 'Nama Album is required';
			$data['status'] = FALSE;
		}

		if($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}
	}

}
