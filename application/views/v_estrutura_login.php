 <!DOCTYPE html>
<html class="no-js" lang="pt-br"> <!--<![endif]-->
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>SISCOCE</title>
    <meta name="description" content="">

    <!-- CSS FILES -->
    <link rel="stylesheet" href="<?= base_url('includes/template') ?>/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="<?= base_url('includes/template') ?>/css/style.css">

    <link rel="stylesheet" href="<?= base_url('includes/template') ?>/css/fractionslider.css"/>
    <link rel="stylesheet" href="<?= base_url('includes/template') ?>/css/style-fraction.css"/>
    <link rel="stylesheet" href="<?= base_url('includes/template') ?>/css/animate.css"/>

    <link rel="stylesheet" type="text/css" href="<?= base_url('includes/template') ?>/css/style.css" media="screen" data-name="skins">
    <link rel="stylesheet" href="<?= base_url('includes/template') ?>/css/layout/wide.css" data-name="layout">
    <link rel="stylesheet" type="text/css" href="<?= base_url('includes/template') ?>/css/switcher.css" media="screen" />
    
    
  	<script LANGUAGE="JavaScript">
	function submit_controlado(destino, nome_form)
	{
		//alert(destino+'-'+nome_form);
		
		//alert(document.forms[nome_form].action);
		document.forms[nome_form].action=destino;
		//alert(document.getElementsByName(nome_form).action);
		document.forms[nome_form].submit();
		//document.getElementById(nome_form).submit();
		//alert('ok');
	}
	</script>
	

</head>
<body>
<!--Start Header-->
<header id="header">
    <!-- Start info-bar -->
    <div id="info-bar">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 top-info hidden-xs">
                    <span><i class="fa fa-phone"></i>Telefone: (63) 3218-4388</span>
                    <span><i class="fa fa-envelope"></i>Email: mail@example.com</span>
                </div>
                <div class="col-sm-4 top-info hidden-xs">
                  

                </div>
            </div>
        </div>
    </div>
    <!--/#info-bar -->

    <div id="logo-bar">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-3">
                    <div id="logo">
                        <h1><a href="<?= base_url()?>"><img width="200" src="<?= base_url('includes')?>/imagens/siscoce.png"/></a></h1>
                    </div>
                </div>

                <div class="col-md-9 col-sm-9">
                <!-- Navigation
                ================================================== -->
                    <div class="navbar navbar-default navbar-static-top" role="navigation">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="navbar-collapse collapse">
                            <ul class="nav navbar-nav">
                                <li class="active"><a href="<?=base_url('admin')?>">Home</a>
                                    
                                </li>

                               

                                <li><a href="#">Perfil</a>
                                    <ul class="dropdown-menu">
                                        <li><a href="<?=base_url('login/logout')?>">Sair</a></li>
                                        
                                    </ul>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!--/.container -->
    </div>
    <!--/#logo-bar -->
</header>
<!--End Header-->
<section class="wrapper">
    <section class="info_service">
        <div class="container">
        	<?php $this->load->view('includes/v_mensagens');?>
            <?php  if(isset($tela)) $this->load->view($tela);?>
        </div>  
    </section>
</section>

    
<!--start wrapper-->
<section class="wrapper">

</section>

<section class="footer_bottom">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <p class="copyright">Copyright © 2015 <a href='tjto.jus.br'>Tribunal de Justiça do Tocantins</a>. Todos os direitos reservados.</p>
				<p class="copyright">Desenvolvido por: Diretoria de Tecnologia da Informação | Comunicação</p>
				<p class="copyright">Palácio da Justiça Rio Tocantins, Praça dos Girassóis, s/nº Centro - Palmas - Tocantins / Cep: 77015-007 | Fone: (063) 3218-4300</p>
            </div>

            <div class="col-sm-3 ">
              
            </div>
            
             <div class="col-sm-3 ">
              <img src="<?= base_url('includes') ?>/imagens/brasaotocantins_.png" width="120" />
            </div>
        </div>
    </div>
</section>

<script type="text/javascript" src="<?= base_url('includes/template') ?>/js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="<?= base_url('includes/template') ?>/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?= base_url('includes/template') ?>/js/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="<?= base_url('includes/template') ?>/js/retina-1.1.0.min.js"></script>
<script type="text/javascript" src="<?= base_url('includes/template') ?>/js/jquery.cookie.js"></script> <!-- jQuery cookie -->
<script type="text/javascript" src="<?= base_url('includes/template') ?>/js/styleswitch.js"></script> <!-- Style Colors Switcher -->
<script type="text/javascript" src="<?= base_url('includes/template') ?>/js/jquery.fractionslider.js" charset="utf-8"></script>
<script type="text/javascript" src="<?= base_url('includes/template') ?>/js/jquery.smartmenus.min.js"></script>
<script type="text/javascript" src="<?= base_url('includes/template') ?>/js/jquery.smartmenus.bootstrap.min.js"></script>
<script type="text/javascript" src="<?= base_url('includes/template') ?>/js/jquery.jcarousel.js"></script>
<script type="text/javascript" src="<?= base_url('includes/template') ?>/js/jflickrfeed.js"></script>
<script type="text/javascript" src="<?= base_url('includes/template') ?>/js/jquery.magnific-popup.min.js"></script>
<script type="text/javascript" src="<?= base_url('includes/template') ?>/js/jquery.isotope.min.js"></script>
<script type="text/javascript" src="<?= base_url('includes/template') ?>/js/swipe.js"></script>
<script type="text/javascript" src="<?= base_url('includes/template') ?>/js/jquery-scrolltofixed-min.js"></script>
<script src="js/main.js"></script>


<script src="<?= base_url();?>includes/tabela/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?= base_url();?>includes/tabela/plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="<?= base_url();?>includes/tabela/plugins/datatables/dataTables.bootstrap.min.js" type="text/javascript"></script>
<script src="<?= base_url();?>includes/tabela/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src='<?= base_url();?>includes/tabela/plugins/fastclick/fastclick.min.js'></script>
<script src="<?= base_url();?>includes/tabela/dist/js/app.min.js" type="text/javascript"></script>
<script src="<?= base_url();?>includes/tabela/dist/js/demo.js" type="text/javascript"></script>
    <!-- page script -->
    <script type="text/javascript">
      $(function () {
        $("#example1").dataTable();
        $('#example2').dataTable({
          "bPaginate": true,
          "bLengthChange": false,
          "bFilter": false,
          "bSort": true,
          "bInfo": true,
          "bAutoWidth": false
        });
      });
    </script>

</body>
</html>