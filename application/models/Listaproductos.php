<?php
class Listaproductos extends CI_Model {

        public function __construct()
        {
                parent::__construct();
                $this->db = $this->load->database('default',true);
        }

         public function rango(){
           $result_set = $this->db->query(
             "select
               round(pre_rangoinicial) as ri,
               case when pre_rangofinal is null then 999999 else round(pre_rangofinal) end as rf,
               round(((100-pre_maxdesctorecargo)/100)*pre_precio) as precio
               from sto_precios,
                    sto_prodsal            
             where
               pre_codlista ='1' and
               psl_saldo != '0' and
               pro_vigencia = 'S'
             order by ri");

           return $result_set -> result_array();
          }

        public function listaProductos(){
        	$result_set = $this->db->query(
        	"select
    				pro_codprod,
    				pro_desc,
    				round(psl_saldo) as saldo,
            min(round(((100-pre_maxdesctorecargo)/100)*pre_precio)) as precio_bajo,
          	max(round(((100-pre_maxdesctorecargo)/100)*pre_precio)) as precio_alto
    			from
    				sto_precios r ,
    				sto_producto p ,
    				sto_prodsal
    			where
        		r.pre_codprod = p.pro_codprod and
        		p.pro_codprod = psl_codprod and
        		pre_codlista='1' and
        		psl_saldo != '0' and
            pro_codtipo = '5' and
            psl_codbodega = '1' and
            pro_vigencia = 'S' and
        		(
			    pro_codprod = '02016085' or
			    pro_codprod = '02016147' or
			    pro_codprod = '07003050' or
			    pro_codprod = '07003050' or
			    pro_codprod = '04008103' or
			    pro_codprod = '02034015'
			)
      group by pro_codprod,pro_desc,saldo
			order by pro_codprod asc");
			return $result_set->result_array();
        }


//LISTADO POR CATEGORIAS
        public function listaPorCat($limite,$offset,$grupo,$subGrupo,$filtro=FALSE){
          //validacion de subgrupo
          if($subGrupo === 0){
            $catQuery = "g.aap_texto SIMILAR TO '" . $grupo ."'";
          }else{
            $catQuery = "sg.aap_texto SIMILAR TO '" . $subGrupo . "'";
          }
          //validacion de filtro
          if($filtro===FALSE){
            $f='';
          }else{
            $f="and
              (m.aap_texto  = '". $filtro ."' or
              sg1.aap_texto = '". $filtro ."' or
              sg2.aap_texto = '". $filtro ."'
              )";
          }

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
            pro_vigencia = 'S' and
            ".$catQuery." 
            ". $f ."
            group by pro_codprod,pro_desc,saldo

          order by pro_desc limit ".$limite." offset ".$offset." "
        );

			    return $result_set->result_array();

        }

//CONTAR ROWS PARA PAGINACION
        public function record_count($grupo,$subGrupo,$filtro=FALSE){
          if($subGrupo === 0){
            $catQuery = "g.aap_texto SIMILAR TO '" . $grupo ."'";
          }else{
            $catQuery = "sg.aap_texto SIMILAR TO '" . $subGrupo . "'";
          }
          //validacion de filtro
          if($filtro===FALSE){
            $f='';
          }else{
            $f="and
              (m.aap_texto  = '". $filtro ."' or
              sg1.aap_texto = '". $filtro ."' or
              sg2.aap_texto = '". $filtro ."'
              )";
          }
          
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
              pro_vigencia = 'S' and
              ".$catQuery." 
              ". $f ."
          ");
          return $result_set->result_array();
          }




//obtener filtros por categoria y subcategoria
          public function filtros($grupo,$subGrupo,$filtro=false){

            if($subGrupo === 0){
              $catQuery = "g.aap_texto SIMILAR TO '" . $grupo ."' and ";
            }else{
              $catQuery = "sg.aap_texto SIMILAR TO '" . $subGrupo . "' and" ;
            }
                  //TODO segundo filtro
                  if($filtro===FALSE){
                    $f='';
                  }else{
                    $f="and
                      (
                      (m.aap_texto  = '". $filtro ."' and
                      m.aap_texto <> '')
                      or
                      (sg1.aap_texto = '". $filtro ."' and
                      sg1.aap_texto <> '' )
                      or
                      (sg2.aap_texto = '". $filtro ."' and
                      sg1.aap_texto <> '')
                      )";
                  }

                  $paramatros = array(
                    'Marca' => 'm.aap_texto',
                    'Filtro por clase' => 'sg1.aap_texto',
                    'Filtro por característica' => 'sg2.aap_texto');
                  $resultado = [];
                  foreach ($paramatros as $pam => $v) {
                    //$k = array_keys($f);
                    $result_set = $this->db->query(
                    "select distinct
                    ".$v."
                    from sto_producto
                      left join sto_prodsal on pro_codprod = psl_codprod and psl_codbodega = '1'
                      left join sto_prodadic m on m.aap_codprod = pro_codprod and m.aap_codanalisis = '1'
                      left join sto_prodadic g on g.aap_codprod = pro_codprod and g.aap_codanalisis = '11'
                      left join sto_prodadic sg on sg.aap_codprod = pro_codprod and sg.aap_codanalisis = '12'
                      left join sto_prodadic sg1 on sg1.aap_codprod = pro_codprod and sg1.aap_codanalisis = '13'
                      left join sto_prodadic sg2 on sg2.aap_codprod = pro_codprod and sg2.aap_codanalisis = '14'
                      left join sto_precios pre on pre.pre_codprod = pro_codprod and pre_codlista = '1' and pre_correlativo = '1'
                    where
                      (psl_saldo > 1 and pro_vigencia = 'S')
                    and
                    pro_codtipo = '5'
                    and
                    ".$catQuery." 
                    ".$v." <> ''
                    ". $f ."
                    order by ".$v." ");
                    $resultado[$pam] = $result_set->result_array();
                  }
                  return $resultado;
                }

}
