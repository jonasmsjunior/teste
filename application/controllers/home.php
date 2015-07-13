<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller{
	public function __construct()
    {
    	parent::__construct();			
    }
	public function index()
	{   
    	$dados = array(
          'titulo'=> 'SISCOCE - Sistema de controle de certidão',
          'tela'=>'home/v_home.php'
        );
        $this->load->view('v_estrutura',$dados);
	}
       
}