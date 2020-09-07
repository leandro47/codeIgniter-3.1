<div class="container text-center">
    <br>
    <div class="row">
        <div class="col-12">
            <a href="<?php echo site_url('geral') ?>" class="btn btn-primary">Voltar</a>
        </div>
        <div class="col-12">
            <h3><?php echo $hotel['nome_hotel'];?></h3>
        </div>
        <div class="col-12">
            <p><?php echo $hotel['descricao'];?></p>
        </div>
        <div class="col-12 text-center">
            <img src="<?php echo base_url('assets/images/'). $hotel['imagem'] ?>" alt="">
        </div>
    </div>
</div>