<?php

class Filtros extends CI_Model {

        public function __construct()
        {
                parent::__construct();
                $this->db = $this->load->database('default',true);
        }
//TODO migrar el codigo, de productos para aka 
        public function filtros($grupo,$subGrupo =false){
                if($subGrupo == FALSE){
                  $objtivo = 'g.aap_texto';
                  $cat = $grupo ;
                }else{
                  $objtivo = 'sg.aap_texto';
                  $cat = $subGrupo;
                }
                $filtros = array(
                  'marca' => 'm.aap_texto as marca',
                  'subgrupo1' => 'sg1.aap_texto as subgrupo1',
                  'subgrupo2' => 'sg2.aap_texto as subgrupo2');
                $resultado = [];
                foreach ($filtros as $f => $v) {
                  $k = array_keys($f);
                  $result_set = $this->db->query(
                  "select distinct
                  ".$f."
                  from sto_producto
                    left join sto_prodsal on pro_codprod = psl_codprod and psl_codbodega = '1'
                    left join sto_prodadic m on m.aap_codprod = pro_codprod and m.aap_codanalisis = '1'
                    left join sto_prodadic g on g.aap_codprod = pro_codprod and g.aap_codanalisis = '11'
                    left join sto_prodadic sg on sg.aap_codprod = pro_codprod and sg.aap_codanalisis = '12'
                    left join sto_prodadic sg1 on sg1.aap_codprod = pro_codprod and sg1.aap_codanalisis = '13'
                    left join sto_prodadic sg2 on sg2.aap_codprod = pro_codprod and sg2.aap_codanalisis = '14'
                    left join sto_precios pre on pre.pre_codprod = pro_codprod and pre_codlista = '10' and pre_correlativo = '1'
                  where
                    (psl_saldo > 1 and pro_vigencia = 'S')
                  and
                  ".$objtivo." SIMILAR TO '". $cat ."' 
                  order by ".$objtivo." ");
                  $resultado[$k] = $result_set->result_array();
                }
                return $resultado;
              }
}
