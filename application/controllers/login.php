<?php   
    defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller{


	public function __construct()
    {
    	parent::__construct();	
		$this->load->helper('url');
        $this->load->helper('array');
        $this->load->helper('form');
        $this->load->library('form_validation');
		
		$this->load->model('Usuario', '', TRUE);
		$this->load->model('UsuarioComarca', '', TRUE);
    }
	public function index()
	{
		if($this->session->userdata("usr_id") != NULL){
			redirect(base_url('admin'));
		}
                $dados = array(
                    'titulo'=> 'Lista de Solicitações',
                    'tela' => 'login/v_login.php'
                );
                $this->load->view('v_estrutura_tabela',$dados);
		
	}
	
	public function logar(){
        $this->form_validation->set_rules('matricula','Número de Matrícula','trim|required');
		$this->form_validation->set_rules('senha','Senha','trim|required');    
		if($this->form_validation->run()){    
			$usuario = $this->input->post("matricula");
			$senha = md5($this->input->post("senha"));
			$query = $this->Usuario->buscar(array('numero_matricula'=>$usuario,'senha'=>$senha));
	        if ($query->num_rows() > 0) {
	         	$result = $query->result();
	           	$query2 = $this->UsuarioComarca->buscar(array('idusuario'=>$result[0]->id,'status'=>1));
	                        
	                       if ($query2->num_rows() > 0){
	                        	
	                            $this->session->set_userdata('usr_id',$result[0]->id);
	                            $this->session->set_userdata('usr_name',$result[0]->nome);
	                            $this->session->set_userdata('usr_foto',$result[0]->foto);
								$this->session->set_userdata('usr_comarcas',$query2->result());
	                            redirect(base_url('admin'));
	                        }
	                        else {
	                            //$dados['erro'] = "Seu usuario não tem permissão para acessar esse sistema";
								 $this->session->set_flashdata('msg_falha','<label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> Seu usuario não tem permissão para acessar esse sistema</label><br>');
	                            $dados = array(
				                    'titulo'=> 'Lista de Solicitações',
				                    'tela' => 'login/v_login.php'
				                );
				                $this->load->view('v_estrutura_tabela',$dados);
	                        }
			} else {
				$this->session->set_flashdata('msg_falha','<label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> Usuário/Senha incorretos</label><br>');
	            $dados = array(
	                    'titulo'=> 'Lista de Solicitações',
	                    'tela' => 'login/v_login.php'
	                );
	                $this->load->view('v_estrutura_tabela',$dados);
			}
		}
		else {
			$this->session->set_flashdata('msg_falha', validation_errors('<label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> ','</label><br>'));
			$dados = array(
	                    'titulo'=> 'Lista de Solicitações',
	                    'tela' => 'login/v_login.php'
	                );
	                $this->load->view('v_estrutura_tabela',$dados);
		}
	}
	/*
	 * Aqui eu destruo a variável logado na sessão e redireciono para a url base. Como esta variável não existe mais, o usuário
	 * será direcionado novamente para a tela de login.
	 */
	public function logout(){
		$this->session->unset_userdata("usr_id");
		$this->session->unset_userdata("usr_name");
		$this->session->unset_userdata("usr_foto");
		$this->session->unset_userdata("usr_comarcas");
		redirect(base_url());
		
	}
	
}