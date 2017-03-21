<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<main class="row main">
    <div class="medium-12 columns">
        <?php foreach($noticia as $n):?>
                <div class="row clearfix">
                    <div class="medium-12 columns titulo">
                        <a href="noticia/<?= $n['cd_noticia'];?>" class="row"><h2 class="left"><?= $n['nm_noticia'];?></h2><a/>
                        <?php if($sessao):?>
                        <a href="#" class="right">editar</a>
                        <?php endif;?>
                    </div>
                </div>
                <div class="row">
                    <div class="medium-12 columns">
                        <p class="categoria"><?= $n['nm_categoria'];?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="medium-6 columns medium-centered">
                        <?php if($n['ds_imagem'] != ""):?>
                        <img src=<?php base_url()?>uploads/<?= $n['ds_imagem'];?>></p>
                        <?php endif;?>
                    </div>
                </div>
                <div class="row">
                    <div class="medium-12 columns">
                        <?php $partes = explode(" ", $n['dt_noticia']);?>
                        <p>Postado em <?= $partes[0];?> às <?= $partes[1];?></p>
                    </div>
                </div>
            <hr>
        <?php endforeach;?>
    </div>
</main> 