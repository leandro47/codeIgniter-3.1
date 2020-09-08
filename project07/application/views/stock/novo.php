<?php
    defined('BASEPATH') OR exit('URL inválida.');
?>
<div class="container pt-5 pb-5">
    <div class="row">
        <div class="col-sm-6 offset-3 col-12">
            <div class="card p-4">
                <h3>Novo produto</h3>
                <hr>

                <form action="<?php echo site_url('gestao/novogravar'); ?>" method="post">
                    <div class="form-group">
                        <label>Designacao:</label>
                        <input type="text" 
                            name="text_designacao"
                            class="form-control"
                            placeholder="Designação"
                            required>                        
                    </div>

                    <?php if(isset($mensagem)): ?>
                        <div class="alert alert-danger text-center">
                            <?php echo $mensagem ?>
                        </div>
                    <?php endif; ?>

                    <div class="text-center">
                        <a href="<?php echo site_url('gestao/home'); ?>" class="btn btn-primary">Cancelar</a>
                        <button type="submit" class="btn btn-primary">Gravar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>