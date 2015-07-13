<section class="info_service">
    <div class="container">
        <form method="post" class="form-horizontal" action="<?= base_url('solicitacao_certidao/solicitarpj') ?>">
            <fieldset>
                <!-- Form Name -->
                <legend>Solicitação de Certidão Negativa Pessoa Jurídica</legend>

                <!-- Text input-->
                <div class="control-group col-sm-12">
                    <label class="control-label" for="nome_fantasia">Nome Fantasia:</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        <input type="text" class="form-control" placeholder="Informe o nome completo" name="nome_fantasia" value="<?=set_value('nome_fantasia');?>" required="">
                    </div> 
                </div>
                 
                <div class="control-group col-sm-12">
                    <label class="control-label" for="email">Email:</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                        <input type="email" class="form-control" placeholder="Informe um email valido" name="email" value="<?=set_value('email');?>" required="">
                    </div> 
                </div>
                
                <div class="control-group col-sm-12">
                    <label class="control-label" for="cnpj">CNPJ:</label> (somente os números)
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-circle"></i></span>
                        <input type="number" class="form-control" placeholder="Informe o CNPJ" name="cnpj" value="<?=set_value('cnpj');?>" required="">
                    </div> 
                </div>
                
               
                <div class="control-group col-sm-12">
                    <label class="control-label" for="tipo_certidao">Tipo de Certidão:</label>
                    <div class="input-group">
                        <?php
                            foreach ($tipos as $id=>$tipo_solicitacao){
                        ?>
                        <span class="input-group-addon">
                        	 <?=$tipo_solicitacao?>
                        	<input type="checkbox" class="form-checklist"  name="tipo_certidao[]" value="<?=$id?>">
                        </span>
                        <?php
                            }
                        ?>
                    </div> 
                </div>
                
                <div class="control-group col-sm-12">
                    <label class="control-label">
                    	Comarcas:
                    </label> (para selecionar mais de uma comarca segure Ctrl e clique nas comarcas)
                    <div class="input-group">
                    	<span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                    	
	                        
			<?=form_dropdown('comarcas[]', $comarcas, $comarcas_select,'multiple="multiple" class = "form-control"');?>
						
                    </div> 
                </div>
                
                <!-- Button (Double) -->
                <div class="control-group col-sm-12">
                  <label class="control-label" for="solicitar"></label>
                  <div class="controls">
                    <input type="submit" id="solicitar" name="solicitar" class="btn btn-success" value="Solicitar">
                    <button id="cancelar" name="cancelar" class="btn btn-danger">Cancelar</button>
                  </div>
                </div>

            </fieldset>
        </form>
    </div>
</section>
<section class="info_service"></section>

