<?php
    $css_inicio = 'disabled';
    $css_analise = 'disabled';
    $css_conclusao = 'disabled';
    //echo '<pre>';
    //print_r($status);
    //echo '</pre>';
    foreach ($status as $key => $atual) {
        if($atual->idstatus_solicitacao_certidao == 1){
            $css_inicio = "active";
            $data_inicio = (new \DateTime($atual->data))->format('d-m-Y H:i:s').'<br>';
            $inicio = $data_inicio.'A solicitação foi iniciada e aguarda para ser analisada.';
            $analise = '';
            $conclusao1 = '';
			 $conclusao2 = '';
        }
        if($atual->idstatus_solicitacao_certidao == 2){
           $css_inicio = "complete";
           $css_analise = "active";
           $data_analise = (new \DateTime($atual->data))->format('d-m-Y H:i:s').'<br>';
           $analise = "$data_analise Solicitação esta sendo analisado por $atual->nome."; 
           $inicio = $data_inicio."A solicitação foi iniciada.";
        }
        if($atual->idstatus_solicitacao_certidao == 3){
            $css_conclusao = "active";
            $css_analise = "complete";
            $data_conclusao = (new \DateTime($atual->data))->format('d-m-Y H:i:s').'<br>';
            $analise = "$data_conclusao Solicitação foi analisada por $atual->nome.";
            $conclusao1 = "$data_conclusao Solicitação aprovada.";
            $conclusao2 = "$data_conclusao Solicitação aprovada, para visualisar a certidão clique "
                    . "<a href='".base_url()."solicitacao_certidao/pdf/".$solicitacao[0]->idsolicitacao_certidao
                    ."/".$solicitacao[0]->idcomarca."'>"
                    . "<span class='glyphicon glyphicon-print' aria-hidden='true'></span> aqui</a>.";
        }
        if($atual->idstatus_solicitacao_certidao == 4){
            $css_conclusao = "active";
            $css_analise = "complete";
            $data_conclusao = (new \DateTime($atual->data))->format('d-m-Y H:i:s').'<br>';
            $analise = "$data_conclusao Solicitação foi analisada por $atual->nome.";
            $conclusao1 = "$data_conclusao Solicitação recusada.";
            $conclusao2 = "$data_conclusao Solicitação recusada.<br> Justificativa: $atual->observacao";
            
        }
        
    }
?>
<section class="info_service">
    <div class="container">
    	
    	<div class="panel panel-default">
			  <div class="panel-heading"><h3 class="panel-title">Acompanhamento de Solicitação da Certidão Negativa da Comarca de <?=$atual->comarca;?></h3></div>
			  <div class="panel-body">
			  	<div class="container">
                                        <div class="row bs-wizard" style="border-bottom:0;">

                                            <div class="col-xs-3 bs-wizard-step <?=$css_inicio?>">
                                              <div class="text-center bs-wizard-stepnum">Iniciado</div>
                                              <div class="progress"><div class="progress-bar"></div></div>
                                              <a href="#" class="bs-wizard-dot"></a>
                                              <div class="bs-wizard-info text-center"><?=$inicio?></div>
                                            </div>

                                            <div class="col-xs-5 bs-wizard-step <?=$css_analise?>"><!-- complete -->
                                              <div class="text-center bs-wizard-stepnum">Em Análise</div>
                                              <div class="progress"><div class="progress-bar"></div></div>
                                              <a href="#" class="bs-wizard-dot"></a>
                                              <div class="bs-wizard-info text-center"><?=$analise?></div>
                                            </div>

                                            <div class="col-xs-3 bs-wizard-step <?=$css_conclusao?>"><!-- complete -->
                                              <div class="text-center bs-wizard-stepnum">Concluido</div>
                                              <div class="progress"><div class="progress-bar"></div></div>
                                              <a href="#" class="bs-wizard-dot"></a>
                                              <div class="bs-wizard-info text-center"><?=$conclusao1?></div>
                                            </div>
                                        </div>
                                </div>
                              <?php 
                              if($atual->idstatus_solicitacao_certidao == 3){
                                  echo '<p class="alert alert-success text-center"><b>'.$conclusao2.'</b></p>';
                              }
                              if($atual->idstatus_solicitacao_certidao == 4){
                                  echo '<p class="alert alert-danger text-center"><b>'.$conclusao2.'</b></p>';
                              }
                              ?>
                            </div>
			  
			  
					
		</div>
		<?php
		if($atual->idstatus_solicitacao_certidao == 2){
		?>
		<div class="panel panel-default">
			<div class="panel-heading">
			    <h3 class="panel-title">
			    	Análise da Certidão Negativa
			    </h3>
			</div>
			<div class="panel-body">
				<?php
			    	$id_solicitacao = $id_solicitacao = $this->uri->segment(3);
                	$id_comarca = $this->uri->segment(4);			    	
			    ?>
				<form name="analise" action="index.php" method="post">
					<div class="control-group col-sm-12">
	                    <label class="control-label" for="nome">Justificativa:</label>
	                    <div class="input-group">
	                        <span class="input-group-addon"><i class="fa fa-exclamation"></i></span>
	                        <textarea class="form-control" name="observacao"></textarea>
	                    </div> 
	                </div>
	                
                 <div class="control-group col-sm-12"><br></div>
                 
					<div class="control-group col-sm-12">
	                    <div class="input-group">
							<button class="btn btn-success" type="button" onclick="submit_controlado('<?=base_url("admin/liberar/$id_solicitacao/$id_comarca")?>','analise')" > liberar<img alt="liberar"  src="<?=base_url('includes/tabela/icones/liberar.png')?>"></button>
							<button class="btn btn-danger" type="button" onclick="submit_controlado('<?=base_url("admin/recusar/$id_solicitacao/$id_comarca")?>','analise')" > recusar<img alt="Recusar"  src="<?=base_url('includes/tabela/icones/recusar.png')?>"></button>
	                    </div> 
	                </div>
				</form>
				
			</div>
		</div>
		<?php
		}
		?>
		<div class="panel panel-default">
			<div class="panel-heading">
			    <h3 class="panel-title">
			    	Dados da Certidão Negativa
			    	<?php
                                    if($solicitacao[0]->idtipo_solicitacao_certidao == 1){
                                        echo " Cível";
                                    }
                                    elseif ($solicitacao[0]->idtipo_solicitacao_certidao == 2) {
                                        echo " Criminal";
                                    }
                                    elseif ($solicitacao[0]->idtipo_solicitacao_certidao == 3) {
                                        echo " Cível e Criminal";
                                    }
			    	?>
			    </h3>
			</div>
			<div class="panel-body">
			    <p><label class="control-label">Nome:</label> <?=$solicitacao[0]->nome?></p>
			    <p><label class="control-label">CPF:</label> <?=$solicitacao[0]->cpf?></p>
			    <p><label class="control-label">RG:</label> <?=$solicitacao[0]->rg?> <?=$solicitacao[0]->rg_orgao_expeditor?></p>
			    <p><label class="control-label">Data da Solicitação:</label> <?=(new \DateTime($solicitacao[0]->data_solicitacao))->format('d-m-Y H:i:s')?></p>
			    <p><label class="control-label">Nacionalidade:</label> <?=$solicitacao[0]->nacionalidade?></p>
			    <p><label class="control-label">Estado Civil:</label> <?=$solicitacao[0]->estado_civil?></p>
			    <p><label class="control-label">Data de Nascimento:</label> <?=(new \DateTime($solicitacao[0]->data_nascimento))->format('d-m-Y')?></p>
			    <p><label class="control-label">Nome da Mãe:</label> <?=$solicitacao[0]->filiacao_materna?></p>
			    <p><label class="control-label">Nome do Pai:</label> <?=$solicitacao[0]->filiacao_paterna?></p>
			    <p><label class="control-label">Email:</label> <?=$solicitacao[0]->email?></p>
			    <p><label class="control-label">Endereço:</label> <?=$solicitacao[0]->endereco?></p>
			    <p><label class="control-label">Profissão:</label> <?=$solicitacao[0]->profissao?></p>
			</div>
		</div>
		
     </div>
</section>