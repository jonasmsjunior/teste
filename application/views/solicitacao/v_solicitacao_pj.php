<?php
    $css_inicio = 'disabled';
    $css_analise = 'disabled';
    $css_conclusao = 'disabled';
    $solicitacao = $solicitacao[0];
    $data_inicio = (new \DateTime($solicitacao->data_solicitacao))->format('d-m-Y H:i:s').'<br>';
    $data_conclusao = (new \DateTime($solicitacao->data))->format('d-m-Y H:i:s').'<br>';
    //echo '<pre>';
    //print_r($solicitacao);
    //echo '</pre>';
    $atual = $solicitacao->status_atual;
        if($atual == 1){
            $css_inicio = "active";
            $inicio = $data_inicio.'A solicitação foi iniciada e aguarda para ser analisada.';
            $analise = '';
            $conclusao1 = '';
            $conclusao2 = '';
        }
        if($atual == 2){
           $css_inicio = "complete";
           $css_analise = "active";
           $data_analise = (new \DateTime($solicitacao->data))->format('d-m-Y H:i:s').'<br>';
           $analise = "$data_analise Solicitação esta sendo analisado por $solicitacao->nome_usuario."; 
           $inicio = $data_inicio."A solicitação foi iniciada.";
           $conclusao1 = '';
           $conclusao2 = '';
        }
        if($atual == 3){
            $css_conclusao = "active";
            $css_analise = "complete";
            $css_inicio = "complete";
            $inicio = $data_inicio."A solicitação foi iniciada.";
            $analise = "Solicitação foi analisada por $solicitacao->nome_usuario.";
            $conclusao1 = "$data_conclusao Solicitação aprovada.";
            $conclusao2 = "$data_conclusao Solicitação aprovada, para visualisar a certidão clique "
                    . "<a href='".base_url()."solicitacao_certidao/pdf/".$solicitacao->uid
                    ."/".$solicitacao->idcomarca."'>"
                    . "<span class='glyphicon glyphicon-print' aria-hidden='true'></span> aqui</a>.";
        }
        if($atual == 4){
            $css_conclusao = "active";
            $css_analise = "complete";
            $css_inicio = "complete";
            $analise = "$data_conclusao Solicitação foi analisada por $solicitacao->nome_usuario.";
            $conclusao1 = "$data_conclusao Solicitação recusada.";
            $conclusao2 = "$data_conclusao Solicitação recusada.<br> Justificativa: $solicitacao->observacao";
            $inicio = $data_inicio."A solicitação foi iniciada.";
        }
    
?>
<section class="info_service">
    <div class="container">
    	
    	<div class="panel panel-default">
			  <div class="panel-heading"><h3 class="panel-title">Acompanhamento de Solicitação da Certidão Negativa da Comarca de <?=$solicitacao->comarca;?></h3></div>
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
                              if($solicitacao->status_atual == 3){
                                  echo '<p class="alert alert-success text-center"><b>'.$conclusao2.'</b></p>';
                              }
                              if($solicitacao->status_atual == 4){
                                  echo '<p class="alert alert-danger text-center"><b>'.$conclusao2.'</b></p>';
                              }
                              ?>
                            </div>
			  
			  
					
		</div>
		
		<div class="panel panel-default">
			<div class="panel-heading">
			    <h3 class="panel-title">
			    	Dados da Certidão Negativa
			    	<?=$solicitacao->tipo;?>
			    </h3>
			</div>
			<div class="panel-body">
			    <p><label class="control-label">Nome Fantasia:</label> <?=$solicitacao->nome_fantasia?></p>
			    <p><label class="control-label">CNPJ:</label> <?=$solicitacao->cnpj?></p>
			</div>
		</div>
		
     </div>
</section>