
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Producto extends CI_Controller {

	public function index()
	{
		//modelos
		$this->load->library('cart');
		$this->load->model('Unproducto');
		//traer producto seleccionado
		$codigo = $_GET['codigo'];
		$producto['producto'] = $this->Unproducto->producto($codigo);

		//funciones
		$rango['rango']= $this->Unproducto->rangos($codigo);
		$data2 = $producto + $rango;
		//view
		$data1['categorias'] = $this->Categorias->catArrayLocal();
		$data1['carro'] = $this->cart->contents();

		$this->load->view('template/template-top',$data1);
		$this->load->view('template/bannerPago');
		$this->load->view('detalleProducto',$data2);
		$this->load->view('template/template-btm');
	}

	public function getRango($cod){
	
	
	
	echo $rango;
	}

}
