<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Trabajo extends CI_Controller {

	public function index()
	{
		   $data4['categorias'] = $this->Categorias->catArrayLocal();
		   $data4['carro'] = $this->cart->contents();
		$this->load->view('template/template-top',$data4);
		$this->load->view('template/bannerPago');

		$this->load->view('contenido/trabajo');

		$this->load->view('template/template-btm');


	}
}
