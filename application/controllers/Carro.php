 <?php
class Carro extends CI_Controller {

	function index() {
    $data4['categorias'] = $this->Categorias->catArrayLocal();
    $data4['carro'] = $this->cart->contents();
    $this->load->view('template/template-top',$data4);
    $this->load->view('template/bannerPago');
		$this->load->view('carro');
    $this->load->view('template/template-btm');
  }
  
  //validar que el producto exista en la base de datos
  function validarProducto($id){
    $this->db = $this->load->database('default',true);
    $this->db->where('pro_codprod', $id);
    $query = $this->db->get('sto_producto', 1);
    
    if($query->num_rows() > 0){
        return TRUE;//true
    }else{
        return FALSE;
    }
  }

  //tomar el precio segun la cantidad enviada
  function getPrecio($qty){
    $this->load->model('Rangos');
    $rango['rango']= $this->Rangos->rangos($this->input->post('cod'));

    $price = 908;
    
      if ($this->input->post('qty') <= $rango['rango']['0']['rf']) {
        $price = intval($rango['rango']['0']['precio']);
      }elseif ($this->input->post('qty') >= $rango['rango']['1']['ri'] and $this->input->post('qty') <= $rango['rango']['1']['rf']) {
        $price = intval($rango['rango']['1']['precio']);
      }elseif ($this->input->post('qty') >= $rango['rango']['2']['ri']) {
        $price = intval($rango['rango']['2']['precio']);
      }else {
          $price = 909;
      }
    return $price;
  }

  // agregar productos
	function agregar() {

    $desc = $this->input->post('name');
    $aRemplasar = array('/','(',')','*','#','%');
    $d = str_replace($aRemplasar,'-',$desc);
    $price = $this->getPrecio($this->input->post('qty'));
    
    if($this->validarProducto($this->input->post('cod'))===TRUE){
      $insert = array(
        'id' => $this->input->post('cod'),
        'qty' => $this->input->post('qty'),
        'price' => $price,
        'name' => $d
      );
      $this->cart->insert($insert);
           if(isset($_SERVER['HTTP_REFERER'])) { $previous = $_SERVER['HTTP_REFERER']; }
      redirect($previous);
       return TRUE;
    }else{
      return FALSE;
    }
   
  }

  // remover productos del carro
  function remove($rowid) {
    $this->cart->update(array(
      'rowid' => $rowid,
      'qty' => 0
    ));
      if(isset($_SERVER['HTTP_REFERER'])) { $previous = $_SERVER['HTTP_REFERER']; }
      redirect($previous);
  }

  // modificar productos del carro
  function mod(){
      $r = $this->input->post('rowid');
      $q = $this->input->post('qty');
      echo $r;
      echo $q;
      if($this->cart->update(array(
        'rowid' => $r,
        'qty' => $q
      ))){
        echo 'carro guarando en '.$r.' por ' .$q;
      }else{
        echo 'carro no guardado en '.$r.' por ' .$q;
      }

  }

  function mostrarCarro(){
    $data['carro'] = $this->cart->contents();
    $this->load->view('listas/listaCarro',$data);
    //var_dump($data);
  }
  
  //rango precios por producto
  function getRPpP(){
    $this->load->model('Rangos');
    $qty = $_POST[ 'qty' ];
    $cod = $_POST[ 'cod' ];
    $rango['rango']= $this->Rangos->rangos($cod);
  
    $price = 908;
      
      if ( $qty <= $rango['rango']['0']['rf']) {
        $price = intval($rango['rango']['0']['precio']);
      }elseif ( $qty >= $rango['rango']['1']['ri'] and  $qty <= $rango['rango']['1']['rf']) {
        $price = intval($rango['rango']['1']['precio']);
      }elseif ( $qty >= $rango['rango']['2']['ri']) {
        $price = intval($rango['rango']['2']['precio']);
      }else {
          $price = 909;
      }
      //var_dump ($price);
    echo ($price);
  }

  function getRango(){
    $this->load->model('Rangos');
    $cod = $_POST[ 'cod' ];
    $rango = json_encode($this->Rangos->rangos($cod)); 
    echo $rango;
  }

    public function modTodo(){
    $data = $_POST;
    var_dump($data);
  
/*       $r = $this->input->post('rowid');
      $q = $this->input->post('qty');
      echo $r;
      echo $q;
      $this->cart->update(array(
        'rowid' => $r,
        'qty' => $q
      ));
      if(isset($_SERVER['HTTP_REFERER'])) { $previous = $_SERVER['HTTP_REFERER']; }
      redirect($previous); */
  }
}

