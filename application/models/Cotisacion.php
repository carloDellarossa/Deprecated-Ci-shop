<?php

class Cotisacion extends CI_Model {

        public function __construct()
        {
                parent::__construct();
                $this->db = $this->load->database('default',true);
        }

        // public function crear($cot){
        //     $this->db->insert('web_cot', $cot);
        // }

        public function mostrar(){
            $this->db->order_by('fecha',ASC);
            $result_set  = $this->db->get();
            return $result_set->result_array();
        }

        public function crear($cot){
            $this->db->insert('web_cot', $cot);
        }

        public function eliminar($cot){
          foreach ($cot as $c) {
            $this->db->where('id', $id);
            $this->db->delete('web_cot');
          }
        }



// cot_cotnum integer NOT NULL,
// cot_fecha timestamp without time zone NOT NULL,
// cot_run character varying(11),
// cot_giro character varying(25),
// cot_telefono integer,
// cot_direccion character varying(50),
// cot_correo character varying(50),
// cot_productos character varying[],
// CONSTRAINT web_cot_pkey PRIMARY KEY (cot_cotnum, cot_fecha)


// crea CRUD
}
