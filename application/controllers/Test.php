<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {

	public function index()
	{
		$this->load->view('test/testMenu');
	}

	public function testCat(){
		$this->load->model('Categorias');
		$this->load->model('CategoriasBkp');
		$data4['categorias'] = $this->CategoriasBkp->catArray();
		$data4['catWeb'] = $this->Categorias0->catArrayWeb();
		$data4['catLocal'] = $this->Categorias0->catArrayLocal();
		$this->load->view('test/testCat2',$data4);
	}

	public function testFotos(){
		$this->load->view('test/testfotos');
	}

	public function testFotosPorMarca(){
		$this->load->model('TestModel');
		$this->load->helper('url');
		$data['fotos'] = $this->TestModel->testFotosPorMarca();
		$this->load->view('test/testfotos',$data);
	}

	public function testFotosFaltante(){
		$this->load->model('TestModel');
		$this->load->helper('url');
		$data['fotos'] = $this->TestModel->testFotos();
		$this->load->view('test/testfotos',$data);
	}

	public function cambiarNombre(){
	$i = 0;
	$x = 0;
	$codigos = $this->getExel();
	$this->load->model('TestModel');
	$this->load->helper('url');
	$data = $this->TestModel->testFotosPorMarca();

	if ($handle = opendir('/home/pacifik/www/Durban2/img/torre/'))
	{
    while (false !== ($file = readdir($handle)))
    {
			
          if ($file != "." && $file != "..")
          {
			  	
			$codProve = substr($file, 0, 5);// codgio proveedor en imagen

			if(isset($codigos[$codProve])){
				$codigoBarra = $codigos[$codProve];
			}
			$codInterno = '0';
			foreach($data as $p){
				$y = 0;
				if($p['bar_codbarras'] === $codigoBarra ){
					if($codInterno === $p['pro_codprod'] ){
						$y++;
						rename("/home/pacifik/www/Durban2/img/torre/" . $file,
						      "/home/pacifik/www/Durban2/img/torre/" . $codInterno .'-'.$y.'.png');
						echo $x . 'archivo ' . $file . ' renombrado a ' . $codInterno .$y.'.png mach de ' . $p['bar_codbarras'] . ' con ' . $codigoBarra.'<br>';
						$x++;
					}else{
						$codInterno = $p['pro_codprod'];
						rename("/home/pacifik/www/Durban2/img/torre/" . $file,
							  "/home/pacifik/www/Durban2/img/torre/" . $codInterno .'.png');
						echo $x . 'archivo ' . $file . ' renombrado a ' . $codInterno .'.png mach de ' . $p['bar_codbarras'] . ' con ' . $codigoBarra.'<br>';
						$y = 0;
						$x++;
					}
					
/* 					var_dump($codInterno);
					if(rename("/home/pacifik/www/Durban2/img/torre/" . $file,
						      "/home/pacifik/www/Durban2/img/torre/" . $codInterno .'-'.$i.'png')){

					echo $x . 'archivo ' . $file . ' renombrado a ' . $codInterno .' mach de ' . $p['bar_codbarras'] . ' con ' . $codigoBarra.'<br>';
					}  */
				}
			}
			  $i++;
          }
    }
	var_dump($x);
    /*Close the handle*/
    closedir($handle);
}
	}

	public function getExel(){
	$array = ['codProve' => 'codBarra'];
	
	$archivo = fopen('/home/pacifik/Escritorio/CODIGOS PARA WEB TORRE.csv', "r");
		while(! feof($archivo)){
			$data = fgetcsv($archivo);
			if($data[0]=== '='){
				
			}else{
				//echo $data[0] . '<br>';
				$par = explode("=", $data[0]);
				$array[$par[0]] = $par[1];
			}
		}
		return $array;
	}


}//fin del modelo
