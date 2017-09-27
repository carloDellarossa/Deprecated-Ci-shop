<?php
class TestModel extends CI_Model {

        public function __construct()
        {
                parent::__construct();
                $this->db = $this->load->database('default',true);
                $local = "1";
        }

        public function testDesc(){
          $result_set = $this->db->query(
          "select
          pro_codprod,
          pro_desc
          from 
          sto_producto
          ");
          return $result_set->result_array();
   
        }
        public function testFotos(){
            $result_set = $this->db->query(
            "select
              DISTINCT pro_codprod,
              pro_desc,
              bar_codbarras,
              bar_factor,
              bar_unmed,
              psl_saldo,
              m.aap_texto as marca
            from sto_producto
              left join sto_prodsal on pro_codprod = psl_codprod and psl_codbodega = '1'
              left join sto_prodadic m on m.aap_codprod = pro_codprod and m.aap_codanalisis = '1'
              left join sto_prodcodbar bar on bar.bar_codprod = pro_codprod
            where
              pro_vigencia = 'S' and
          		psl_saldo > '1' and
  			      pro_codtipo = '5' and
          		psl_codbodega = '1' and
--MARCA
(
m.aap_texto not like 'CALIGRAFIX' AND
m.aap_texto not like 'SPYRA' AND
m.aap_texto not like 'PENTEL' AND
m.aap_texto not like 'FACTIS' AND
m.aap_texto not like 'MAPED' AND
m.aap_texto not like 'ARTEL' AND
m.aap_texto not like 'SYRA' AND
m.aap_texto not like 'HALLEY' AND
m.aap_texto not like 'TOOKEY' AND
m.aap_texto not like 'TORRE' AND
m.aap_texto not like 'COLON' AND
m.aap_texto not like 'AUCA' AND
m.aap_texto not like 'BUHO' AND
m.aap_texto not like 'LOCTITE' AND
m.aap_texto not like '3M' AND
m.aap_texto not like 'PRITT' AND
m.aap_texto not like 'AGOREX' AND
m.aap_texto not like 'FABER' AND
m.aap_texto not like 'FABER CASTELL' AND
m.aap_texto not like 'FABER-CASTELL' AND
m.aap_texto not like 'HENKEL' AND
m.aap_texto not like 'TOOKY' AND
m.aap_texto not like 'JM' AND
m.aap_texto not like 'SOCOMISCH' AND
m.aap_texto not like 'ATLANTIK' AND
m.aap_texto not like 'RHEIN'
)
AND -- DESC
(
pro_desc not similar to 'SPYRA' AND
pro_desc not similar to 'CALIGRAFIX' AND
pro_desc not similar to 'PENTEL' AND
pro_desc not similar to 'FACTIS' AND
pro_desc not similar to 'MAPED' AND
pro_desc not similar to 'ARTEL' AND
pro_desc not similar to 'SYRA' AND
pro_desc not similar to 'HALLEY' AND
pro_desc not similar to 'TOOKEY' AND
pro_desc not similar to 'TORRE' AND
pro_desc not similar to 'COLON' AND
pro_desc not similar to 'AUCA' AND
pro_desc not similar to 'BUHO' AND
pro_desc not similar to 'LOCTITE' AND
pro_desc not similar to '3M' AND
pro_desc not similar to 'PRITT' AND
pro_desc not similar to 'AGOREX' AND
pro_desc not similar to 'FABER' AND
pro_desc not similar to 'FABER CASTELL' AND
pro_desc not similar to 'FABER-CASTELL' AND
pro_desc not similar to 'HENKEL' AND
pro_desc not similar to 'TOOKY' AND
pro_desc not similar to 'SOCOMISCH' AND
pro_desc not similar to 'ATLANTIK' AND
pro_desc not similar to 'RHEIN'
)
order by marca
");
          return $result_set->result_array();
          }


        public function testFotosPorMarca(){
            $result_set = $this->db->query(
            "select
              DISTINCT pro_codprod,
              pro_desc,
              bar_codbarras,
              bar_factor,
              bar_unmed,
              psl_saldo,
              m.aap_texto as marca
            from sto_producto
              left join sto_prodsal on pro_codprod = psl_codprod and psl_codbodega = '1'
              left join sto_prodadic m on m.aap_codprod = pro_codprod and m.aap_codanalisis = '1'
              left join sto_prodcodbar bar on bar.bar_codprod = pro_codprod
            where
              pro_vigencia = 'S' and
          		psl_saldo > '1' and
  			      pro_codtipo = '5' and
          		psl_codbodega = '1' and
              m.aap_texto like 'TORRE'
              order by pro_desc
            ");
          return $result_set->result_array();
        }


      }
