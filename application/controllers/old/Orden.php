
 <?php
class Orden extends CI_Controller {

	function index() {


		//librerias
		$this->load->library('cart');
		//models

		//falta si $local no esta setiado volver a aleguir tienda o definir si va a exitir una por default


    $this->load->model('Categorias');
    $data4['categorias'] = $this->Categorias->catArrayLocal();
    $this->load->view('template/template-top',$data4);
    $this->load->view('template/bannerPago');

		// resumen de la orden
		$this->load->view('orden');

    $this->load->view('template/template-btm');


	}
}
