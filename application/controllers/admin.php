<?php   
    defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller{


    public function __construct()
    {
    	parent::__construct();	
		$this->load->helper('url');
        $this->load->helper('array');
        $this->load->helper('form');
        $this->load->library('form_validation');
	$this->load->model('SolicitacaoCertidaoPF', '', TRUE);
        $this->load->model('SolicitacaoCertidaoPJ', '', TRUE);	
	$this->load->model('SolicitacaoCertidaoStatusSolicitacaoCertidao', '', TRUE);	
    }
    public function index()
    {   
        $comarcas = array();
        foreach ($this->session->userdata("usr_comarcas") as $key => $value) {
            $comarcas[] = $value->idcomarca;
        }
        
    	$dados = array(
          'titulo'=> 'SISCOCE - Sistema de controle de certidão',
          'tela'=>'solicitacao/v_lista_solicitacoes_adm.php',
          'solicitacoes'=> $this->SolicitacaoCertidaoPF->busca_comarcas($comarcas)  
        );
        $this->load->view('v_estrutura_login',$dados);
    }
	
	public function solicitacao()
	{
            if($this->uri->segment(3) && $this->uri->segment(4)){
                $uid_solicitacao = $this->uri->segment(3);
                $id_comcarca = $this->uri->segment(4);

                if(substr($uid_solicitacao, 0, 2) == 'pf'){

                    $solicitacao = $this->SolicitacaoCertidaoPF->busca_uid_comarca($uid_solicitacao,$id_comcarca);
                    $dados = array(
                        'titulo'=> 'Cadastro de Solicitação',
                        'tela'=>'solicitacao/v_solicitacao_adm.php',
                        'solicitacao' => $solicitacao,
                        'status' => $this->SolicitacaoCertidaoStatusSolicitacaoCertidao->busca_id($uid_solicitacao,$id_comcarca)
                        );    
                }  else {
                    $solicitacao = $this->SolicitacaoCertidaoPJ->busca_uid_comarca($uid_solicitacao,$id_comcarca);
                    $dados = array(
                        'titulo'=> 'Cadastro de Solicitação',
                        'tela'=>'solicitacao/v_solicitacao_adm_pj.php',
                        'solicitacao' => $solicitacao,
                        'status' => $this->SolicitacaoCertidaoStatusSolicitacaoCertidao->busca_id($uid_solicitacao,$id_comcarca)
                        );
                }

                $this->load->view('v_estrutura_login',$dados);
            }
           
            else{
                redirect('admin');
            }
		
	}

	public function analisar()
	{
            if($this->uri->segment(3) and $this->uri->segment(4)){
                $uid = $this->uri->segment(3);
                $idcomarca = $this->uri->segment(4);
                if(substr($uid, 0, 2) == 'pf'){
                    $query = $this->db->get_where('solicitacao_certidao_pf', array('uid' => $uid));
                    if ($query->num_rows() > 0){
                        $this->analise($uid,$idcomarca);
                        redirect('admin/solicitacao/'.$uid.'/'.$idcomarca);
                    }
                }elseif(substr($uid, 0, 2) == 'pj'){
                    $query = $this->db->get_where('solicitacao_certidao_pj', array('uid' => $uid));
                    if ($query->num_rows() > 0){
                        $this->analise($uid,$idcomarca);
                        redirect('admin/solicitacao/'.$uid.'/'.$idcomarca);
                    }
                }
                $this->session->set_flashdata('msg_falha','<label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i>Número do Documento Inválido</label><br>');
            }	
            else{
                $this->session->set_flashdata('msg_falha','<label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> Acesso incorreto</label><br>');
                redirect('admin');
            }
		
	}
	
        public function analise($uid,$idcomarca){
            $solicitacoes = $this->SolicitacaoCertidaoStatusSolicitacaoCertidao->busca_id($uid,$idcomarca);
            if($solicitacoes){
		$ultimo_status = array(0,0,0);
		foreach ($solicitacoes as $key => $solicitacao) {
                    if($ultimo_status[0] < $solicitacao->idstatus_solicitacao_certidao){
			$ultimo_status[0] = $solicitacao->idstatus_solicitacao_certidao;
			$ultimo_status[1] = $solicitacao->idusuario;
			$ultimo_status[2] = $solicitacao->data;
                    }					
		}
                
		if(!($ultimo_status[1] == $this->session->userdata("usr_id") || $ultimo_status[1] == NULL || $ultimo_status[1] == '')){
                    if($ultimo_status[0] != 2)
                    {
                        $this->session->set_flashdata('msg_falha','<label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> Essa certidão já foi emitida, somente o usuario que emitiu pode fazer a reanalise</label><br>');
                        redirect('admin');
                    }
                    $data_status = new DateTime($ultimo_status[2]);
                    $data_status->add(new DateInterval( "P1D" ));
                    $data_atual = new DateTime();
                    if($data_status > $data_atual)
                    {
                        $this->session->set_flashdata('msg_falha','<label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i>Outro usuário esta analisando essa solicitação</label><br>');
                        redirect('admin');
                    }
		}
		
                foreach ($solicitacoes as $key => $solicitacao) {
                    if($solicitacao->idstatus_solicitacao_certidao > 1){
                        $solicitacoes = $this->SolicitacaoCertidaoStatusSolicitacaoCertidao->excluir(
			array(
                            'uidsolicitacao' => $uid,
                            'idcomarca' => $idcomarca,
                            'idstatus_solicitacao_certidao' => $solicitacao->idstatus_solicitacao_certidao
                            )
			);
                    }
                }
		
                $this->SolicitacaoCertidaoStatusSolicitacaoCertidao->inserir(
		array(
                    'data' => (new \DateTime())->format('Y-m-d H:i:s'), 
                    'idcomarca' => $idcomarca, 
                    'idstatus_solicitacao_certidao' => 2, 
                    'observacao' => '', 
                    'idusuario' => $this->session->userdata("usr_id"), 
                    'uidsolicitacao' => $uid
                    )
		);
		
            }
            else{
                $this->session->set_flashdata('msg_falha','<label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> Solicitação/comarca inválida</label><br>');
                redirect('admin');
            }
		
        }

        public function liberar()
	{
		$observacao = "Certidão liberada com Sucesso";
		if(isset($_POST['observacao'])){
			$observacao = $_POST['observacao'];
		}
		if($this->uri->segment(3) and $this->uri->segment(4)){
			$idsolicitacao =  $this->uri->segment(3);
			$idcomarca = $this->uri->segment(4);
			$solicitacoes = $this->SolicitacaoCertidaoStatusSolicitacaoCertidao->busca_id($idsolicitacao,$idcomarca);
			if($solicitacoes){
				$ultimo_status = array(0,0,0);
				foreach ($solicitacoes as $key => $solicitacao) {
					if($ultimo_status[0] < $solicitacao->idstatus_solicitacao_certidao){
						$ultimo_status[0] = $solicitacao->idstatus_solicitacao_certidao;
						$ultimo_status[1] = $solicitacao->idusuario;
						$ultimo_status[2] = $solicitacao->data;
					}					
				}
				if($ultimo_status[0] == 2 and ($ultimo_status[1] == $this->session->userdata("usr_id") || $ultimo_status[1] == NULL || $ultimo_status[1] == '')){
					$insere = $this->SolicitacaoCertidaoStatusSolicitacaoCertidao->inserir(
						array(
							'data' => (new \DateTime())->format('Y-m-d H:i:s'), 
							'idcomarca' => $idcomarca, 
							'idstatus_solicitacao_certidao' => 3, 
							'observacao' => $observacao, 
							'idusuario' => $this->session->userdata("usr_id"), 
							'uidsolicitacao' => $idsolicitacao
						)
					);
					if($insere){
						$this->session->set_flashdata('msg_sucesso','<label class="control-label" for="inputSuccess"><i class="fa fa-thumbs-up"></i> Solicitação foi liberada com sucesso!</label><br>');
						redirect("admin/solicitacao/$idsolicitacao/$idcomarca");
					}
					else{
						$this->session->set_flashdata('msg_falha','<label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i>Erro ao liberar certidão, confira os dados.</label><br>');
						redirect('admin');						
					}
					
				}
				else{
					$this->session->set_flashdata('msg_falha','<label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i>Outro usuário esta analisando essa solicitação</label><br>');
						redirect('admin');
				}
			}
		}
		else{
			$this->session->set_flashdata('msg_falha','<label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> Acesso incorreto</label><br>');
			redirect('admin');
		}
		$this->load->view('v_estrutura_login',$dados);
	}
	
	public function recusar()
	{
		$observacao = "Foi encontrado processos vinculados aos dados informados.";
		if(isset($_POST['observacao'])){
			$observacao = $_POST['observacao'];
		}
		if($this->uri->segment(3) and $this->uri->segment(4)){
			$idsolicitacao =  $this->uri->segment(3);
			$idcomarca = $this->uri->segment(4);
			$solicitacoes = $this->SolicitacaoCertidaoStatusSolicitacaoCertidao->busca_id($idsolicitacao,$idcomarca);
			if($solicitacoes){
				$ultimo_status = array(0,0,0);
				foreach ($solicitacoes as $key => $solicitacao) {
					if($ultimo_status[0] < $solicitacao->idstatus_solicitacao_certidao){
						$ultimo_status[0] = $solicitacao->idstatus_solicitacao_certidao;
						$ultimo_status[1] = $solicitacao->idusuario;
						$ultimo_status[2] = $solicitacao->data;
					}					
				}
				if($ultimo_status[0] == 2 and ($ultimo_status[1] == $this->session->userdata("usr_id") || $ultimo_status[1] == NULL || $ultimo_status[1] == '')){
					$insere = $this->SolicitacaoCertidaoStatusSolicitacaoCertidao->inserir(
						array(
							'data' => (new \DateTime())->format('Y-m-d H:i:s'), 
							'idcomarca' => $idcomarca, 
							'idstatus_solicitacao_certidao' => 4, 
							'observacao' => $observacao, 
							'idusuario' => $this->session->userdata("usr_id"), 
							'uidsolicitacao' => $idsolicitacao
						)
					);
					if($insere){
						$this->session->set_flashdata('msg_sucesso','<label class="control-label" for="inputSuccess"><i class="fa fa-thumbs-up"></i> Solicitação foi recusada com sucesso!</label><br>');
						redirect("admin/solicitacao/$idsolicitacao/$idcomarca");
					}
					else{
						$this->session->set_flashdata('msg_falha','<label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i>Erro ao recusar certidão, confira os dados.</label><br>');
						redirect('admin');						
					}
					
				}
				else{
					$this->session->set_flashdata('msg_falha','<label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i>Outro usuário esta analisando essa solicitação</label><br>');
						redirect('admin');
				}
			}
		}
		else{
			$this->session->set_flashdata('msg_falha','<label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> Acesso incorreto</label><br>');
			redirect('admin');
		}
		$this->load->view('v_estrutura_login',$dados);
	}
	
}