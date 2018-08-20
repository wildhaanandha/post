<?php
class kategori extends CI_Controller{

	function __construct() {
		parent:: __construct();
		$this->load->model('model_kategori');
	}

	function index()
	{
		$data['record']= $this->model_kategori->tampilkan_data();
		$this->load->view('kategori/lihat_data',$data);
	}

	function post()
	{
		if(isset($_POST['submit'])){
			//echo "proses kategori";
			$this->model_kategori->post();
			redirect('kategori');
		}
		else{
			$this->load->view('kategori/form_input');
		}
	}

	function edit()
	{
		if(isset($_POST['submit'])){
			//echo "proses kategori";
			$this->model_kategori->edit();
			redirect('kategori');
		}
		else{
			$id= $this->uri->segment(3);
		//	echo $id;
		//	die;
			$data['record']= $this->model_kategori->get_one($id)->row_array();
			$this->load->view('kategori/form_edit',$data);
		}
	}

	function delete()
	{
		$id= $this->uri->segment(3);
		$this->model_kategori->delete($id);
		redirect('kategori');
	}
}