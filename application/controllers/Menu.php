<?php
class Menu extends CI_Controller {

    public function ipCheck($ip){
        $vIp = array (
            '192.168.60',
            '192.168.200',
            '192.168.10'
        );
        
        foreach($vIp as $i){
            if (strpos($ip, $i) === FALSE) {
                return FALSE;
            }else{
                return TRUE;
            }
        }
    }
    
    public function getMenu(){
        $file = 'http://192.168.60.10/utfamilias/menu/menu_serializado.txt';
        $file_headers = @get_headers($file); 
        $menu = file_get_contents($file);	
        //if($this->ipCheck($_SERVER['REMOTE_ADDR']) === TRUE){
            if(!$file_headers || $file_headers[0] == 'HTTP/1.1 404 Not Found'){
                $data['mnsj'] = '<h6> No se pudo conectar al servidor, Categorias no cargadas</h6>';
            }elseif(file_put_contents(realpath(FCPATH.'archivos/menu_serializado.txt'),$menu)){
                $data['mnsj'] = '<h6> Categorias cargadas! <br>
                Desde: '.$_SERVER['REMOTE_ADDR'].'</h6><br>';
                $info['ip'] = $_SERVER['REMOTE_ADDR'];
                $info['fecha'] = getdate();
                file_put_contents(realpath(FCPATH.'archivos/log.txt'),print_r($info, TRUE),FILE_APPEND);
            }else{
                $data['mnsj'] = '<h6> Error al cargar el archivo , Categorias no cargadas</h6>';
            }   
        /* }else{
            $data['mnsj'] = '<h6>Su ip no es valida </h6>'; 
        } */
        $this->load->view('menu/ok', $data);    
    }


}