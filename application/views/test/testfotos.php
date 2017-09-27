
 <!DOCTYPE html>
  <html lang="en">
    <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    </head>
    <body>
      <div class="container-fluid">
        <div clas="text-center">
        <h4> Menu de Tests</h4>
        </div>
        <div class="row">
            <div clas="col-12">
                <ul>
                    <li><a href="<?php echo site_url('Test/testFotosPorMarca');?>"><h3>Test por Marca.(modificar en model por ahora)</h3></a></li>
                    <li><a href="<?php echo site_url('Test/testFotosFaltante');?>"><h3>Test de Fotos faltantes.</h3></a></li>
                </ul>
            </div>
        </div>
      </div> 
      <?php if(isset($fotos)){ ?>
      
      <table class="table">
        <thead>
          <tr>
            <th>N</th>
            <th>Marca</th>
            <th>Descripcion</th>
            <th>Codigo</th>
            <th>Barra</th>
            <th>Factor</th>
            <th>Medida</th>
            <th>Saldo</th>
          </tr>
        </thead>
        <tbody>
       <?php
       	$i = 0 ;
        $conFoto = 0 ;
          // Convert array to an array of string lengths
      // $lengths = array_map('strlen', $data);

      //   // Show min and max string length
      // echo "The shortest is " . min($lengths) .
      //     ". The longest is " . max($lengths);
      	foreach ($fotos as $f){

      	$file = 'http://www.libreriagiorgio.cl/lg/imagenes/codigos/' .$f['pro_codprod']. '.jpg';
      	$file_headers = @get_headers($file);
/*       	if(!$file_headers || $file_headers[0] == 'HTTP/1.1 404 Not Found') {*/
          $i++; ?> 
      
          <tr>
            <td><?php echo $i?></td>
            <td><?php echo $f['marca']?></td>
            <td><?php echo $f['pro_desc']?></td>
            <td><?php echo $f['pro_codprod']?></td>
            <td><?php echo $f['bar_codbarras']?></td>
            <td><?php echo $f['bar_factor']?></td>
            <td><?php echo $f['bar_unmed']?></td>
            <td><?php echo number_format($f['psl_saldo'])?></td>
          </tr>
        <?php
/*        } else {
          
       } */
        ?>


      <?php } ?>
      </tbody>
      </table>

<!--  <div><h1> Cantidad de productos con fotos : <?php echo $conFoto ?> ESTIMADOS <h1></div> -->

       <?php }?>

      <!-- Optional JavaScript -->
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>



    </body>
  </html>
