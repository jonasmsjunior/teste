<?php
class MY_Controller extends CI_Controller {
 
 	public function __construct()
       {
            parent::__construct();
			
			$logado = $this->session->userdata("usr_id");
			
			if ($logado == null) {
				$this->session->set_flashdata('msg_falha','<label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> Para acessar essa área primeiro efetue o login.</label><br>');
	            
				redirect(base_url('/login'));
			}				
       }
}