<?php
//defined('BASEPATH') OR exit('No direct script access allowed');

class Template extends CI_Controller {

	public function index()
	{
		//librerias
		$this->load->library('cart');
		$this->load->model('Listaproductos');


		$data1['productosL'] = $this->Listaproductos->listaProductos();
		$data4['categorias'] = $this->Categorias->catArrayLocal();
		$data4['carro'] = $this->cart->contents();
		//falta si $local no esta setiado volver a aleguir tienda o definir si va a exitir una por default

		$this->load->view('template/template-top',$data4);
		$this->load->view('template/carrusel');
		$this->load->view('template/bannerPago');
		$this->load->view('listas/listaProductos',$data1);
		// $this->load->view('listas/listaOfertas',$data2);
		// $this->load->view('listas/listaNovedades',$data3);
		$this->load->view('template/template-btm');
	}
}
