<ul class="nav navbar-nav ml-auto">
                        <li class="nav-item active dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                          <i class="fa fa-shopping-cart" aria-hidden="true"> Carro de compra </i>&nbsp;<span class="badge"><div style="color : #0275d8;"><?php echo $this->cart->total_items(); ?></div></span>
                        </a>
                          <ul class="dropdown-menu animated slideInRight scroll" style="margin-top : 5px;  position: static;" >
                            <div class="lista-carro" >
                              
    <div class="contenedor-producto-carro container">
    <?php
        if($this->cart->total_items() != 0){
            foreach ($carro as $p) {
    ?>

                <li class="col col-12">
                    <div class="producto-carro-info">
                        <div class="row">
                            <div class="nombre col col-12">
                                <?php echo $p['name']; ?>
                            </div>
                            <?php if ($this->config->item('precio')) { ?>
                            <div class="precio col col-6">
                                Precio <br>$ <?php echo number_format($p['price'],'0',',','.')?>
                            </div>
                            <?php } ?>
                            <div class="cantidad col col-6">
                                Cantidad  <?php echo $p['qty']; ?>
                                <a href="<?php echo site_url('index.php/Carro/remove/'.$p['rowid'].'') ?>"> <i class="fa fa-trash-o" aria-hidden="true"></i>X<span class="hidden-tablet"></span></a>
                            </div>
                        </div>
                    </div>
                </li>
            <?php
            } 
            ?>
            <li class="col-lg-12 col-md-12 col-sm-12" style="text-align : center">
                <div class="info-carro text-right">
                    <div class="info-carro-total">
                        <br>
                        <span>Total:</span>
                        <span>$ <?php echo number_format($this->cart->total(),'0',',','.'); ?></span>
                    </div>
                </div>
            </li>
            <li class="col-lg-12 col-md-12 col-sm-12" style="text-align : center">
                <div class="ir-a-carro">
                    <h4> <a href="<?php echo site_url('index.php/Carro');?>"><i class="fa fa-shopping-cart" aria-hidden="true"></i>Ir al carro de compra</a>
                </div>
            </li>
            <li class="col-lg-12 col-md-12 col-sm-12" style="text-align : center">
                <div>
                    <h4><i class="glyphicon glyphicon-ok"></i><?php echo anchor('Orden', 'Finalizar la compra') ?></h4>
                </div>
            </li> 
        <?php 
        }else{
        ?>
            <li>
                <h2>No hay productos en el carro<h2>
            </li>
        <?php 
        } 
        ?>
    </div>
                            </div>
                          </ul>
                        </li>
                </ul><!-- termina carro-->
<!--  -->
