<ul>
    <?php foreach ($filtros as $filtro => $v){?>
        <div role="tab" <?php echo "id='heading".str_replace(' ','',$filtro)."'" ?> >
            <a data-toggle="collapse" data-parent="#accordion" <?php echo "href='#collapse".str_replace(' ','',$filtro)."'" ?> aria-expanded="true" <?php echo "aria-controls='collapse".str_replace(' ','',$filtro)."'" ?>>
                <h3><?php	echo ucwords($filtro); ?></h3>
            </a>
        </div>

        <ul style="max-height: 933px; overflow: auto">
        
            <div <?php echo "id='collapse".str_replace(' ','',$filtro)."'" ?> class="collapse show" role="tabpanel" <?php echo "aria-labelledby='heading".str_replace(' ','',$filtro)."'" ?>>
                <?php for($i = 0; $i < count($v); $i++) {?>
                    <?php foreach ($v[$i] as $key => $value){
                        if ($value != '') { ?>
                            <li><a href="<?php echo site_url('index.php/Categoria/filtrar?f='.$value.'') ?>"><?php echo $value;?></a></li>
                        <?php }
                    }
                }?>
            </div>
        </ul>
    <?php } ?>
</ul>