<section class="info_service">
    <div class="container">
        <form method="post" class="form-horizontal" action="<?= base_url('solicitacao_certidao/consulta') ?>">
            <fieldset>
                <!-- Form Name -->
                <legend>Consulta de Certidão Negativa</legend>
                <!-- Text input-->
                <div class="control-group col-sm-12">
                    <label class="control-label" for="uid">Código Solicitação:</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-barcode"></i></span>
                        <input type="text" class="form-control" placeholder="Informe o código da solicitação a ser consultada" name="uid" value="<?=set_value('uid');?>" required="">
                    </div> 
                </div>
                 
                <!-- Button (Double) -->
                <div class="control-group col-sm-12">
                  <label class="control-label" for="solicitar"></label>
                  <div class="controls">
                    <input type="submit" id="solicitar" name="solicitar" class="btn btn-success" value="Consultar">
                    <button id="cancelar" name="cancelar" class="btn btn-danger">Cancelar</button>
                  </div>
                </div>

            </fieldset>
        </form>
    </div>
</section>
<section class="info_service"></section>