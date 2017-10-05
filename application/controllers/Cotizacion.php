<?php
class Cotizacion extends CI_Controller {

	function index() {
		//librerias

		$this->load->library('email');
		//models
		$data4['categorias'] = $this->Categorias->catArrayLocal();
		$data4['carro'] = $this->cart->contents();
		$this->load->view('template/template-top',$data4);
	

		$this->load->view('cotisacion');

		$this->load->view('template/template-btm');

		// resumen de la orden

	}

  function agregar (){
    $carro = $this->cart->contents();
    $datos = $this->input->post(NULL,TRUE);
    $cot = array_merge($datos , $carro);
    //$this->Cot->crear($cot);
    // echo "<pre>";
    // echo print_r($cot);
    // echo "<scrit> alert ('cot creada'); </script>";
    redirect('Cot');
  }

	function email(){

$this->load->library('email');

$this->email->initialize(array(
  'protocol' => 'smtp',
  'smtp_host' => 'durban.cl',
  'smtp_user' => 'ventaweb@durban.cl',
  'smtp_pass' => ':ventaweb:',
  'smtp_port' => 25,
  'crlf' => "\r\n",
  'newline' => "\r\n"
));

$to_email = $this->input->post('email');
$n = $this->input->post('nombre');
$r = $this->input->post('rut');

$cont = $this->cart->contents();
$mensage = $n + $r;
$orden = array();
if ($cart = $this->cart->contents()){
	foreach ($cart as $item){
		$producto =  array(
		'codigo' => $item['id'],
		'cantidad' => $item['qty'],
		'precio' => $item['price'],
		'nombre' => $item['name']
		);
		array_push($orden , $producto);
	}
}

// $data = "\n";
// foreach ($orden as $p=>$c){
//     $data .= $p.'-------'.$c;
//     $data.= "\n";
// }

$this->email->from('ventaweb@durban.cl', 'carlo');
$this->email->to($to_email);
$this->email->cc('soporte4@pacifik.cl');
$this->email->bcc('');
$this->email->subject('Email Test');
$this->email->message('Cotisacion registrada '. $mensage.'' .print_r($orden, true). '');

if ($this->email->send()){
	redirect('');
}else{
	echo $this->email->print_debugger();
}

	}
}
