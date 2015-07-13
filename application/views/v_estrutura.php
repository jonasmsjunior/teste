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

               <div class="col-md-6 col-sm-6">
                </div>
                
                <div class="col-md-3 col-sm-3">
                    <div id="logo">
                        <h1><a href="<?= base_url()?>"><img src="<?= base_url('includes')?>/imagens/logo.png"/></a></h1>
                    </div>
                </div>
            </div>
        </div>
        <!--/.container -->
    </div>
    <!--/#logo-bar -->
</header>
<!--End Header-->

<!--start wrapper-->
<section class="wrapper">
<?php $this->load->view('includes/v_mensagens');?>
<?php if(isset($tela)) $this->load->view($tela);?>
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
              <img src="<?= base_url('includes') ?>/imagens/brasaotocantins_.png"/>
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

<script>
    $(window).load(function(){
        $('.slider').fractionSlider({
            'fullWidth': 			true,
            'controls': 			true,
            'responsive': 			true,
            'dimensions': 			"1920,450",
            'timeout' :             5000,
            'increase': 			true,
            'pauseOnHover': 		true,
            'slideEndAnimation': 	false,
            'autoChange':           true
        });
    });
</script>

    <!-- WARNING: Wow.js doesn't work in IE 9 or less -->
    <!--[if gte IE 9 | !IE ]><!-->
        
       
        
        
        <script type="text/javascript" src="<?= base_url('includes/template') ?>/js/wow.min.js"></script>
        <script>
            // WOW Animation
            new WOW().init();
        </script>
    <![endif]-->

</body>
</html>