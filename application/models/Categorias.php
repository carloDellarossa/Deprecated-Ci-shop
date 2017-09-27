<?php
class Categorias extends CI_Model {

	public function __construct()
	{				
					parent::__construct();
					$this->db = $this->load->database('default',true);
					$this->load->helper('file');
	}

	public function catArrayWeb()
	{	
		$cat2 = file_get_contents('http://192.168.60.10/utfamilias/menu/menu_serializado.txt');	
		$cat2 = $this->input->post('asdasd');
		$cat2 = base64_decode($cat2);
		$cat2 = unserialize($cat2);
		return $cat2;
	}

	public function catArrayLocal()
	{	
		$cat = file_get_contents('./archivos/menu_serializado.txt');
		$cat = base64_decode($cat);
		$cat = unserialize($cat);
		return $cat;
	}
}
