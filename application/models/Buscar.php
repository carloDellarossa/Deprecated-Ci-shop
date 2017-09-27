<?php
class Buscar extends CI_Model {

        public function __construct()
        {
                parent::__construct();
                $this->db = $this->load->database('default',true);
        }

        public function buscar($buscar,$limite,$offset){
            $aBuscar = rtrim($buscar,'s'); 
            $result_set = $this->db->query(
            "select
            pro_codprod,
            pro_desc,
            round(psl_saldo) as saldo,
            min(round(((100-pre_maxdesctorecargo)/100)*pre_precio)) as precio_bajo,
            max(round(((100-pre_maxdesctorecargo)/100)*pre_precio)) as precio_alto
            from
            sto_producto p
            left join sto_prodadic m on m.aap_codprod = pro_codprod and m.aap_codanalisis = '1'
            left join sto_prodadic g on g.aap_codprod = pro_codprod and g.aap_codanalisis = '11'
            left join sto_prodadic sg on sg.aap_codprod = pro_codprod and sg.aap_codanalisis = '12'
            left join sto_prodadic sg1 on sg1.aap_codprod = pro_codprod and sg1.aap_codanalisis = '13'
            left join sto_prodadic sg2 on sg2.aap_codprod = pro_codprod and sg2.aap_codanalisis = '14'	 ,
            sto_precios r ,
            sto_prodsal
            where
            r.pre_codprod = p.pro_codprod and
            p.pro_codprod = psl_codprod and
            pre_codlista='1' and
            psl_saldo != '0' and
            pro_codtipo = '5' and
            psl_codbodega = '1' and
            (      
            pro_codprod ~* '".$aBuscar."'
            or pro_desc ~* '".$aBuscar."'
            or pro_glosa ~* '".$aBuscar."'
            or m.aap_texto ~* '".$aBuscar."'
            or sg1.aap_texto ~* '".$aBuscar."'
            or sg2.aap_texto ~* '".$aBuscar."'
            )
            group by pro_codprod,pro_desc,saldo
                
            order by pro_desc limit ".$limite." offset ".$offset." "
            );
          return $result_set->result_array();
          }


//CONTAR ROWS PARA PAGINACION
        public function record_count($buscar){
            $aBuscar = rtrim($buscar,'s'); 
          $result_set = $this->db->query(
            
            "select
            COUNT(DISTINCT pro_codprod)
            from
            sto_producto p
            left join sto_prodadic m on m.aap_codprod = pro_codprod and m.aap_codanalisis = '1'
            left join sto_prodadic g on g.aap_codprod = pro_codprod and g.aap_codanalisis = '11'
            left join sto_prodadic sg on sg.aap_codprod = pro_codprod and sg.aap_codanalisis = '12'
            left join sto_prodadic sg1 on sg1.aap_codprod = pro_codprod and sg1.aap_codanalisis = '13'
            left join sto_prodadic sg2 on sg2.aap_codprod = pro_codprod and sg2.aap_codanalisis = '14'	 ,
            sto_precios r ,
            sto_prodsal
            where
            r.pre_codprod = p.pro_codprod and
            p.pro_codprod = psl_codprod and
            pre_codlista='1' and
            psl_saldo != '0' and
            pro_codtipo = '5' and
            psl_codbodega = '1' and
            (      
                pro_codprod ~* '".$aBuscar."'
                or pro_desc ~* '".$aBuscar."'
                or pro_glosa ~* '".$aBuscar."'
                or m.aap_texto ~* '".$aBuscar."'
                or sg1.aap_texto ~* '".$aBuscar."'
                or sg2.aap_texto ~* '".$aBuscar."'
            )
          ");
          return $result_set->result_array();
          }



}
