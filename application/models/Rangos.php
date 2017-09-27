<?php
class Rangos extends CI_Model {

        public function __construct()
        {
                parent::__construct();
                $this->db = $this->load->database('default',true);

        }
//LISTA RANGO DE PRECIO DE UN PRODUCTO EN ESPESIFICO
        public function rangos($cod){
          $result_set = $this->db->query(
            "select
              round(pre_rangoinicial) as ri,
              case when pre_rangofinal is null then 999999 else round(pre_rangofinal) end as rf,
              round(((100-pre_maxdesctorecargo)/100)*pre_precio) as precio
              from sto_precios
            where
              pre_codprod = '".$cod."'
            and
              pre_codlista ='1'
            order by ri");

          return $result_set -> result_array();
         }

        }