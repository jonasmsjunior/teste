 <!DOCTYPE html>
 <?php
 	include('includes/qr/qrlib.php');
	QRcode::png(base_url('solicitacao_certidao/pdf').'/'.$solicitacao[0]->idsolicitacao_certidao.'/'.$solicitacao[0]->idcomarca,
                    'includes/imagens/qr/'.$solicitacao[0]->idsolicitacao_certidao.'_'.$solicitacao[0]->idcomarca.'.png');
 ?>
<html class="no-js" lang="pt-br"> <!--<![endif]-->
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title>SISCOCE</title>
    <meta name="description" content="">

    <!-- CSS FILES -->
    <link rel="stylesheet" href="<?= base_url('includes/template') ?>/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="<?= base_url('includes/template') ?>/css/style.css">
    <style>
    
    	h1 p{
    		margin:0;
    		padding:0;
    		line-height:100%;
    		font-weight:bold; 
    		font-size:20px;
    	}
    	section hr{
    		margin:0;
    		padding:0;
    	}
    	section h2{
    		margin:0;
    		padding:0;
    		font-weight:bold;
    		font-size:18px;
    		border-top: solid 1px #858585;
    		border-bottom: solid 1px #858585;
    		margin: 10px 0px 20px 0px;
    	}
    	u{
    		font-weight:bold;
    	}
    	.solic{
    		font-style: italic;
    		font-weight: bold;
    	}
    	.solic p{
    		margin:0;
    		padding:0;
    		
    	}
    	.rod{
    		
    		border-top: solid 1px #858585;
    		border-bottom: solid 1px #858585;
    		font-style: italic;
    		font-size: 10px;
    	}
    	.rod p{
    		margin:0;
    		padding:0;
    		
    	}
    </style>

</head>
<body>
<!--Start Header-->
<header id="header">
    <!-- Start info-bar -->
    <div id="info-bar">
        <div class="container">
            <div style="text-align: right;">                
                  Prazo de validade: <b style="font-weight: bold;">60 dias</b>
            </div>
        </div>
    </div>
    <!--/#info-bar -->
    
    <div id="logo-bar">
        <div class="container">
            <div class="row">
                
                    <div style="text-align: center;">
                        <img src="<?= base_url('includes') ?>/imagens/brasaotocantins.png" width="120" />
                        <p>Estado do Tocantins</p>
                        <p>PODER JUDICIÁRIO</p>
                        <h1>
	                        <p>REPÚBLICA FEDERATIVA DO BRASIL</p>
				<p>PODER JUDICIÁRIO DO TOCANTINS</p>
                                <p style="text-transform: uppercase">COMARCA DE <?=$solicitacao[0]->comarca?></p>
				<p>CARTÓRIO ÚNICO DA DISTRIBUIÇÃO</p>
			</h1>
			<p>Tel, <?=$solicitacao[0]->telefone?> (Distribuição)</p>
			<p>C.N.P.J do Tribunal de Justiça do Tocantins- 25.053.190/0001-36</p>
                    </div>
            </div>
        </div>
        <!--/.container -->
    </div>
    
    <!--/#logo-bar -->
</header>
<!--End Header-->

<!--start wrapper-->
<section style="text-align: center;">
	
	<h2>CERTIDÃO NEGATIVA</h2>
	
	<p>
		<?=$solicitacao[0]->servidor?>, <?=$solicitacao[0]->funcao?> do Cartório Distribuidor da
		Comarca de <?=$solicitacao[0]->comarca?>, certifica, assina e dá fé, a requerimento da parte interessada, que revendo os
		registros de 
                <u>
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
                </u> 
                deste Cartório (sistemas processuais "SPROC e EPROC"
		da Comarca de Palmas - TO) verificou-se que <u>NADA CONSTA</u> em face de:
	</p>
	<br>
	<section class="solic">
		<p>Nome: <?=$solicitacao[0]->nome?></p>
		<p>Nacionalidade: <?=$solicitacao[0]->nacionalidade?> Estado Civil: Casada</p>
		<p>CPF: <?=$solicitacao[0]->cpf?> RG: <?=$solicitacao[0]->rg?> Órgão Expedidor: <?=$solicitacao[0]->rg_orgao_expeditor?></p>
		<p>Profissão: <?=$solicitacao[0]->profissao?> Data Nascimento: <?=(new \DateTime($solicitacao[0]->data_nascimento))->format('d/m/Y')?></p>
		<p>Filiação: <?=$solicitacao[0]->filiacao_materna?> 
                        <?php
                            if($solicitacao[0]->filiacao_paterna != NULL){
                                echo ' e '.$solicitacao[0]->filiacao_paterna;
                            }
                        ?>
                </p>
		<p>Endereço: <?=$solicitacao[0]->endereco?></p>
	</section>
	<br>
	<p>Comarca de <?=$solicitacao[0]->comarca?>  estado do Tocantins, 
            <?php
                setlocale(LC_ALL, "pt_BR", "pt_BR.iso-8859-1", "pt_BR.utf-8", "portuguese");
                date_default_timezone_set('America/Sao_Paulo');
                $data = new \DateTime($solicitacao[0]->status_data);
                echo  utf8_encode(strftime("%A, %d de %B de %Y",strtotime($data->format('Y-m-d'))));
            ?>.
        </p>
	
</section>
<section class="rod">
	<p>CERTIDÃO CONFORME PROVIMENTO 002/2011 DA CGJUS-TO</p>
	<img src="<?=base_url().'includes/imagens/qr/'.$solicitacao[0]->idsolicitacao_certidao.'_'.$solicitacao[0]->idcomarca.'.png';?>" />
        <p style="text-align: center">Expedida em <?=$data->format('d/m/Y H:i:s')?></p>
</section>
<p>ATENÇÃO : Qualquer rasura ou emenda <u>INVALIDARÁ</u> este documento.</p>



</body>
</html>