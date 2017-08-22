<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Album extends CI_Controller 
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('album_model','album');
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
		$list = $this->album->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $album)
                {
			$no++;
			$row = array();
			$row[] = $album->id;
			$row[] = $album->idAlbum;
			$row[] = $album->namaAlbum;
			$row[] = $album->deskripsiAlbum;
			

			//add html for action
			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_album('."'".$album->id."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
				  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_album('."'".$album->id."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->album->count_all(),
						"recordsFiltered" => $this->album->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_edit($id)
	{
		$data = $this->album->get_by_id($id);
		//$data->dob = ($data->dob == '0000-00-00') ? '' : $data->dob; // if 0000-00-00 set tu empty for datepicker compatibility
		echo json_encode($data);
	}

	public function ajax_add()
	{
		$this->_validate();
		$data = array(
				'idAlbum' => $this->input->post('idAlbum'),
				'namaAlbum' => $this->input->post('namaAlbum'),
				'deskripsiAlbum' => $this->input->post('deskripsiAlbum'),
				
			);
		$insert = $this->album->save($data);
		echo json_encode(array("status" => TRUE));
	} 

	public function ajax_update()
	{
		$this->_validate();
		$data = array(
				'idAlbum' => $this->input->post('idAlbum'),
				'namaAlbum' => $this->input->post('namaAlbum'),
				'deskripsiAlbum' => $this->input->post('deskripsiAlbum'),
				
			);
		$this->album->update(array('id' => $this->input->post('id')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($id)
	{
		$this->album->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}


	private function _validate()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if($this->input->post('idAlbum') == '')
		{
			$data['inputerror'][] = 'idAlbum';
			$data['error_string'][] = 'Id Album is required';
			$data['status'] = FALSE;
		}

		if($this->input->post('namaAlbum') == '')
		{
			$data['inputerror'][] = 'namaAlbum';
			$data['error_string'][] = 'Nama Album is required';
			$data['status'] = FALSE;
		}

		if($this->input->post('deskripsiAlbum') == '')
		{
			$data['inputerror'][] = 'deskripsiAlbum';
			$data['error_string'][] = 'Deskripsi Album is required';
			$data['status'] = FALSE;
		}

		if($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}
	}

}
