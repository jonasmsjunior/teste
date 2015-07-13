<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

class Solicitacao_certidao extends CI_Controller{
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
        redirect('index.php');
    }
    
    public function listapj(){
        if($this->uri->segment(3)){
            $uid = $this->uri->segment(3);
            $solicitacoes = $this->SolicitacaoCertidaoPJ->busca_uid($uid);
               
            $dados = array(
                'titulo'=> 'Lista de Solicitações',
                'solicitacoes' => $solicitacoes,
                'tela' => 'solicitacao/v_lista_solicitacoes_pj.php'
            );
            $this->load->view('v_estrutura_tabela',$dados);
        }
        else{
            redirect('index.php');
        }
    }

	
	
	public function listapf(){
            if($this->uri->segment(3)){
                $uid = $this->uri->segment(3);
                $solicitacoes = $this->SolicitacaoCertidaoPF->busca_uid($uid);
                //echo '<pre>';
                //print_r($solicitacoes);
                //echo '<pre>';
                $dados = array(
                    'titulo'=> 'Lista de Solicitações',
                    'solicitacoes' => $solicitacoes,
                    'tela' => 'solicitacao/v_lista_solicitacoes_pf.php'
                );
                $this->load->view('v_estrutura_tabela',$dados);
            }
            else{
            redirect('index.php');
            
            }
        }
        
        public function consulta(){
            if(isset($_POST['uid'])){
               // echo '<script>alert("oi");</script>';
                $uid = $_POST['uid'];
                if(substr($uid, 0, 2) == 'pf'){
                    $query = $this->db->get_where('solicitacao_certidao_pf', array('uid' => $uid));
                    if ($query->num_rows() > 0){
                        redirect('solicitacao_certidao/listapf/'.$uid);
                    }
                }else
                if(substr($uid, 0, 2) == 'pj'){
                    $query = $this->db->get_where('solicitacao_certidao_pj', array('uid' => $uid));
                    if ($query->num_rows() > 0){
                        redirect('solicitacao_certidao/listapj/'.$uid);
                    }
                }
                $this->session->set_flashdata('msg_falha','<label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i>Número do Documento Inválido</label><br>');
            }
            $dados = array(
                'titulo'=> 'Lista de Solicitações',
                'tela' => 'solicitacao/v_consulta.php'
                );
            $this->load->view('v_estrutura_tabela',$dados);
        }

        public function certidao_check($str)
	{
            if(isset($_POST['tipo_certidao'])){
                
                return TRUE;
            }
            $this->form_validation->set_message('certidao_check','Escolha pelo menos um Tipo de Certidão');
            return FALSE;
	}
        
        public function comarca_check($str)
	{
            if(isset($_POST['comarcas'])){
                
                return TRUE;
            }
            $this->form_validation->set_message('comarca_check','Escolha pelo menos uma Comarca');
            return FALSE;
	}
        
	public function pdf()
	{
		if($this->uri->segment(3) && $this->uri->segment(4)){
			$uid_solicitacao = $this->uri->segment(3);
                        $id_comarca = $this->uri->segment(4);
                        
                        if(substr($uid_solicitacao, 0, 2) == 'pf'){
                            $dados = array('solicitacao' => $this->SolicitacaoCertidaoPF->busca_uid_comarca($uid_solicitacao,$id_comarca));
                            $page = $this->load->view('solicitacao/v_certidao.php', $dados, true);
                        }else{
                            $dados = array('solicitacao' => $this->SolicitacaoCertidaoPJ->busca_uid_comarca($uid_solicitacao,$id_comarca));
                            $page = $this->load->view('solicitacao/v_certidao_pj.php', $dados, true);
                        }
			
                       
			$filename = "teste";
			// As PDF creation takes a bit of memory, we're saving the created file in /downloads/reports/
			$pdfFilePath = FCPATH."/downloads/reports/$filename.pdf";
			$data['page_title'] = 'Certidão'; // pass data to the view
			 
			if (file_exists($pdfFilePath) == FALSE)
			{
			    ini_set('memory_limit','32M'); // boost the memory limit if it's low <img src="https://davidsimpson.me/wp-includes/images/smilies/icon_wink.gif" alt=";)" class="wp-smiley">
			    $html = $page;
			     
			    $this->load->library('pdf');
			    $pdf = $this->pdf->load();
			    //$pdf->SetFooter('ATENÇÃO : Qualquer rasura ou emenda <u>INVALIDARÁ</u> este documento.'); // Add a footer for good measure <img src="https://davidsimpson.me/wp-includes/images/smilies/icon_wink.gif" alt=";)" class="wp-smiley">
			    $pdf->WriteHTML($html); // write the HTML into the PDF
			    $pdf->Output($pdfFilePath, 'I'); // save to file because we can
			}
		}
		else{
			$this->session->set_flashdata('msg_falha','<label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> Documento Inválido</label><br>');
			redirect('index.php');
		}
	}
    public function acompanhar()
    {
        if($this->uri->segment(3) && $this->uri->segment(4)){
            $uid_solicitacao = $this->uri->segment(3);
            $id_comcarca = $this->uri->segment(4);
            
            if(substr($uid_solicitacao, 0, 2) == 'pf'){
                
                $solicitacao = $this->SolicitacaoCertidaoPF->busca_uid_comarca($uid_solicitacao,$id_comcarca);
                $dados = array(
                    'titulo'=> 'Cadastro de Solicitação',
                    'tela'=>'solicitacao/v_solicitacao.php',
                    'solicitacao' => $solicitacao
                    );    
            }  else {
                $solicitacao = $this->SolicitacaoCertidaoPJ->busca_uid_comarca($uid_solicitacao,$id_comcarca);
                $dados = array(
                    'titulo'=> 'Cadastro de Solicitação',
                    'tela'=>'solicitacao/v_solicitacao_pj.php',
                    'solicitacao' => $solicitacao
                    );
            }
            
            $this->load->view('v_estrutura',$dados);
            }
        else{
            redirect('solicitacao_certidao');
        }	
    }
	public function solicitar()
	{
		/* validação do formulario */
		$this->form_validation->set_rules('nome','Nome','trim|required|min_length[5]|max_length[45]');
		$this->form_validation->set_rules('email','Email','trim|required|valid_email');
		$this->form_validation->set_rules('cpf','CPF','trim|required|numeric|min_length[11]|max_length[11]');
		$this->form_validation->set_rules('rg','RG','trim|required|min_length[4]|max_length[40]');
		$this->form_validation->set_rules('oe','Órgão Expedidor','trim|required|min_length[4]|max_length[40]');
		$this->form_validation->set_rules('nacionalidade','Nacionalidade','trim|required|min_length[4]|max_length[40]');
		$this->form_validation->set_rules('data_nasc','Data de Nascimento','trim|required|valid_date');
		$this->form_validation->set_rules('profissao','Profissão','trim|required|min_length[4]|max_length[40]');
		$this->form_validation->set_rules('filiacao_ma','Filiação Materna','trim|required|min_length[4]|max_length[40]');
		$this->form_validation->set_rules('filiacao_pa','Filiação Paterna','trim|min_length[4]|max_length[40]');
		$this->form_validation->set_rules('endereco','Endereço','trim|required|min_length[4]|max_length[250]');
		$this->form_validation->set_rules('enderec','Tipo Certidão','callback_certidao_check');
                $this->form_validation->set_rules('comarcas', 'Comarcas', 'callback_comarca_check');
				
		
		if($this->form_validation->run()){
			
			
			
			$dados_solicitacao = array(
                                                'uid' =>  uniqid("pf"),
						'nome' => $this->input->post('nome'),
						'cpf' => $this->input->post('cpf'), 
						'email' => $this->input->post('email'), 
						'rg' => $this->input->post('rg'), 
						'rg_orgao_expeditor' => $this->input->post('oe'), 
						'data_solicitacao' => (new \DateTime())->format('Y-m-d H:i:s'), 
						'profissao' => $this->input->post('profissao'), 
						'data_nascimento' => (new \DateTime($this->input->post('data_nasc')))->format('Y-m-d'), 
						'filiacao_materna' => $this->input->post('filiacao_ma'), 
						'filiacao_paterna' => $this->input->post('filiacao_pa'), 
						'nacionalidade' => $this->input->post('nacionalidade') , 
						'endereco' => $this->input->post('endereco') , 
						'estado_civil' => $this->input->post('estado_civil'), 
						'sexo' => $this->input->post('sexo')
					);
			
			if($this->SolicitacaoCertidaoPF->inserir($dados_solicitacao)){
				$this->session->set_flashdata('msg_sucesso','<label class="control-label" for="inputSuccess"><i class="fa fa-thumbs-up"></i> Sua solicitação foi criada com sucesso!</label><br>');
				foreach($this->input->post('tipo_certidao') as $key => $tipo){
                                    $data = array(
                                        'idtipo_solicitacao_certidao' => $tipo,
                                        'uidsolicitacao' => $dados_solicitacao['uid']
                                    );
                                    $this->db->insert('solicitacao_certidao_tipo_solicitacao_certidao', $data);
                                }
                                foreach ($this->input->post('comarcas') as $key => $comarca) {
					$dados_status_solicitacao = array(
                                                'uidsolicitacao' => $dados_solicitacao['uid'],
                                                'idstatus_solicitacao_certidao' => 1,
                                                'data' => (new \DateTime())->format('Y-m-d H:i:s'),
                                                'observacao' => 'Sua solicitação foi iniciada',
                                                'idcomarca' => $comarca
                                                );
					if($this->SolicitacaoCertidaoStatusSolicitacaoCertidao->inserir($dados_status_solicitacao)){
                                            $this->session->set_flashdata('msg_alerta','<label class="control-label" for="inputAlert"><i class="fa fa-exclamation"></i> Sua solicitação foi iniciada, acompanhe seu andamento pelo código '.$dados_solicitacao['uid'].', você pode consultar utilizando seu CPF e data da solicitação, anote esses dados para consultas posteriores e fique atento aos emails de notificação.</label><br>');
					}
					else{
                                            $this->session->set_flashdata('msg_falha','<label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> Falha ao solicitar para comarca de ! por favor verificar os dados</label><br>');
					}
				
				}
				redirect('solicitacao_certidao/listapf/'.$dados_solicitacao['uid']);
			}	
			else{
				$this->session->set_flashdata('msg_falha','<label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> Falha ao cadastrar sua solicitação! por favor verificar os dados</label><br>');
				$dados = array(
                                    'titulo'=> 'Cadastro de Solicitação',
                                    'tela'=>'solicitacao/v_cadastro_solicitacao.php'
                                  );
			}
			
			
		}
		else{
                        $comarcas_select = '';
                        if(isset($_POST['comarcas'])){
                            $comarcas_select =$this->input->post('comarcas');
                        }
			foreach ($this->db->get('comarca')->result_array() as $key => $value) {
				$comarcas[$value['id']] = $value['nome'];
			}
                        foreach ($this->db->get('tipo_solicitacao_certidao')->result_array() as $key => $value) {
				$tipos_solicitacao[$value['id']] = $value['descricao'];
			}
			$this->session->set_flashdata('msg_falha', validation_errors('<label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> ','</label><br>'));
			$dados = array(
                            'titulo'=> 'Cadastro de Solicitação',
                            'tela'=>'solicitacao/v_cadastro_solicitacao_pf.php',
                            'comarcas' => $comarcas,
                            'comarcas_select' => $comarcas_select,
                            'tipos'=> $tipos_solicitacao
                          );
		}
		$this->load->view('v_estrutura',$dados);
	}
    public function solicitarpj()
    {   
        $this->form_validation->set_rules('nome_fantasia','Nome Fantasia','trim|required|min_length[5]|max_length[45]');
	$this->form_validation->set_rules('email','Email','trim|required|valid_email');
	$this->form_validation->set_rules('cnpj','CNPJ','trim|required|numeric|min_length[14]|max_length[14]');
	$this->form_validation->set_rules('enderec','Tipo Certidão','callback_certidao_check');
        $this->form_validation->set_rules('comarcas', 'Comarcas', 'callback_comarca_check');
        
        if($this->form_validation->run()){
            $dados_solicitacao = array(
                'uid' =>  uniqid("pj"),
		'nome_fantasia' => $this->input->post('nome_fantasia'),
		'cnpj' => $this->input->post('cnpj'), 
                'data_solicitacao' => (new \DateTime())->format('Y-m-d H:i:s'),
		'email' => $this->input->post('email')
            );
            if($this->SolicitacaoCertidaoPJ->inserir($dados_solicitacao)){
                
                $this->session->set_flashdata('msg_sucesso','<label class="control-label" for="inputSuccess"><i class="fa fa-thumbs-up"></i> Sua solicitação foi criada com sucesso!</label><br>');
                foreach($this->input->post('tipo_certidao') as $key => $tipo){
                    $data = array(
                        'idtipo_solicitacao_certidao' => $tipo,
                        'uidsolicitacao' => $dados_solicitacao['uid']
                    );
                    $this->db->insert('solicitacao_certidao_tipo_solicitacao_certidao', $data);
                }
                foreach ($this->input->post('comarcas') as $key => $comarca) {
                    $dados_status_solicitacao = array(
                        'uidsolicitacao' => $dados_solicitacao['uid'],
                        'idstatus_solicitacao_certidao' => 1,
                        'data' => (new \DateTime())->format('Y-m-d H:i:s'),
                        'observacao' => 'Sua solicitação foi iniciada',
                        'idcomarca' => $comarca
                    );
                    if($this->SolicitacaoCertidaoStatusSolicitacaoCertidao->inserir($dados_status_solicitacao)){
                        $this->session->set_flashdata('msg_alerta','<label class="control-label" for="inputAlert"><i class="fa fa-exclamation"></i> Sua solicitação foi iniciada, acompanhe seu andamento pelo código '.$dados_solicitacao['uid'].', você pode consultar utilizando seu CPF e data da solicitação, anote esses dados para consultas posteriores e fique atento aos emails de notificação.</label><br>');
                    }
                    else{
                        $this->session->set_flashdata('msg_falha','<label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> Falha ao solicitar para comarca de ! por favor verificar os dados</label><br>');
                    }
                }
                redirect('solicitacao_certidao/listapj/'.$dados_solicitacao['uid']);
            }
            
        }
        else{
            $comarcas_select = '';
            if(isset($_POST['comarcas'])){
                $comarcas_select =$this->input->post('comarcas');
            }
            foreach ($this->db->get('comarca')->result_array() as $key => $value) {
                $comarcas[$value['id']] = $value['nome'];
            }
            foreach ($this->db->get('tipo_solicitacao_certidao')->result_array() as $key => $value) {
                $tipos_solicitacao[$value['id']] = $value['descricao'];
            }
            $this->session->set_flashdata('msg_falha', validation_errors('<label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> ','</label><br>'));
            $dados = array(
                'titulo'=> 'Cadastro de Solicitação',
                'tela'=>'solicitacao/v_cadastro_solicitacao_pj.php',
                'comarcas' => $comarcas,
                'comarcas_select' => $comarcas_select,
                'tipos'=> $tipos_solicitacao
            );
            $this->load->view('v_estrutura',$dados);
        }
    }
       
}