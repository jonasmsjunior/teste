<section class="info_service">
    <div class="container">
        <form method="post" class="form-horizontal" action="<?= base_url('solicitacao_certidao/solicitar') ?>">
            <fieldset>
                <!-- Form Name -->
                <legend>Solicitação de Certidão Negativa Pessoa Física</legend>

                <!-- Text input-->
                <div class="control-group col-sm-12">
                    <label class="control-label" for="nome">Nome:</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        <input type="text" class="form-control" placeholder="Informe seu nome completo" name="nome" value="<?=set_value('nome');?>" required="">
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
                    <label class="control-label" for="cpf">CPF:</label> (somente os números)
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-circle"></i></span>
                        <input type="number" class="form-control" placeholder="Informe seu CPF" name="cpf" value="<?=set_value('cpf');?>" required="">
                    </div> 
                </div>
                
                <div class="control-group col-sm-8">
                    <label class="control-label" for="rg">RG:</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-circle-o"></i></span>
                        <input type="text" class="form-control" placeholder="Informe seu RG" name="rg" value="<?=set_value('rg');?>" required="">
                    </div> 
                </div>
                
                <div class="control-group col-sm-4">
                    <label class="control-label" for="oe">Órgão Expedidor:</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-circle-o"></i></span>
                        <input type="text" class="form-control" placeholder="Informe o Órgão Expedidor do RG" name="oe" value="<?=set_value('oe');?>" required="">
                    </div> 
                </div>
                
                
                <div class="control-group col-sm-12">
                    <label class="control-label" for="nacionalidade">Nacionalidade:</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-globe"></i></span>
                        <input type="text" class="form-control" placeholder="Informe sua nacionalidade" name="nacionalidade" value="<?=set_value('nacionalidade');?>" required="">
                    </div> 
                </div>
                
                
                <div class="control-group col-sm-6">
                    <label class="control-label" for="estado_civil">Estado Civil:</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-male"></i><i class="fa fa-female"></i></span>
                        <select class="form-control" name="estado_civil">
                        	<option value="casado" <?=set_select('estado_civil', 'casado', TRUE); ?>>Casado(a)</option>
                        	<option value="solteiro" <?=set_select('estado_civil', 'solteiro'); ?>>Solteiro(a)</option>
                        	<option value="viuvo" <?=set_select('estado_civil', 'viuvo'); ?>>Viúvo(a)</option>
                        	<option value="divorciado" <?=set_select('estado_civil', 'divorciado'); ?>>Divorciado(a)</option>
                        </select>
                    </div> 
                </div>
                
                <div class="control-group col-sm-6">
                    <label class="control-label" for="data_nasc">Data de Nascimento:</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-square"></i></span>
                        <input type="date" class="form-control" placeholder="Informe sua data de nascimento" name="data_nasc" value="<?=set_value('data_nasc');?>" required="">
                    </div> 
                </div>
                 
                 <div class="control-group col-sm-12">
                    <label class="control-label" for="profissao">Profissão</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        <input type="text" class="form-control" placeholder="Informe sua profissão" name="profissao" value="<?=set_value('profissao');?>" required="">
                    </div> 
                </div>
                 
                <div class="control-group col-sm-12">
                    <label class="control-label" for="filiacao_ma">Filiação Materna:</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-female"></i></span>
                        <input type="text" class="form-control" placeholder="Informe o nome completo da sua mãe" name="filiacao_ma" value="<?=set_value('filiacao_ma');?>" required="">
                    </div> 
                </div>
                
                <div class="control-group col-sm-12">
                    <label class="control-label" for="filiacao_pa">Filiação Paterna:</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-male"></i></span>
                        <input type="text" class="form-control" placeholder="Informe o nome completo do seu pai" name="filiacao_pa" value="<?=set_value('filiacao_pa');?>">
                    </div> 
                </div>
                
                
                <div class="control-group col-sm-12">
                    <label class="control-label" for="filiacao_pa">Endereço:</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-home"></i></span>
                        <input type="text" class="form-control" placeholder="Informe seu endereço completo incluindo cidade e estado" name="endereco" value="<?=set_value('endereco');?>"  required="">
                    </div> 
                </div>
                
                <div class="control-group col-sm-8">
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
                
                
                
                 <div class="control-group col-sm-4">
                    <label class="control-label" for="tipo_certidao">Sexo:</label>
                    <div class="input-group">
                        <span class="input-group-addon">
                        	 Masculino
                        	<input type="radio" class="form-checklist"  name="sexo" value="1" checked="">
                        </span>
                        
                        <span class="input-group-addon">
                        	 Feminino
                        	<input type="radio" class="form-checklist"  name="sexo" value="2" <?=set_checkbox('sexo', '2'); ?>>
                        </span>
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

