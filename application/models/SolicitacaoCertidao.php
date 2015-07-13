<?php
class SolicitacaoCertidao extends CI_Model{
    public function __construct() {
        parent::__construct();
    }
    public function lista(){
        return $this->db->get('solicitacao_certidao');
    }
    public function busca_cpf($cpf=NULL){
        $this->db->select('*, max(`solicitacao_certidao_status_solicitacao_certidao`.`idstatus_solicitacao_certidao`) as `status_atual`');
        $this->db->from('`solicitacao_certidao_status_solicitacao_certidao`');
        $this->db->join('`solicitacao_certidao`', '`solicitacao_certidao`.`idsolicitacao_certidao` = `solicitacao_certidao_status_solicitacao_certidao`.`idsolicitacao_certidao`');
        $this->db->join('`tipo_solicitacao_certidao`','`tipo_solicitacao_certidao`.`idtipo_solicitacao_certidao` = `solicitacao_certidao`.`idtipo_solicitacao_certidao`');
        $this->db->join('`comarca`', '`comarca`.`idcomarca` = `solicitacao_certidao_status_solicitacao_certidao`.`idcomarca`');
        
        $this->db->group_by('`comarca`.`idcomarca`');
        $this->db->group_by('`solicitacao_certidao`.`idsolicitacao_certidao`');
        if($cpf != NULL){
            $this->db->where('`solicitacao_certidao`.`cpf`',$cpf);
            return $this->db->get()->result();
        }
        return $this->db->get()->result();
    }
    public function inserir($dados=NULL){
        if($dados!=NULL){
            if($this->db->insert('solicitacao_certidao',$dados)){
            	return TRUE;
            }
        }
		return FALSE;
    }
     public function busca_certidao_completa($id=NULL,$comarca=NULL){
         if($id!=NULL && $comarca!= NULL){
            $this->db->select('`comarca`.`nome` as `comarca`');
            $this->db->select('`comarca`.`idcomarca` as `idcomarca`');
            $this->db->select('`comarca`.`telefone` as `telefone`');
            $this->db->select('`usuario`.`nome` as `servidor`');
            $this->db->select('`comarca_usuario`.`lotacao` as `lotacao`');
            $this->db->select('`comarca_usuario`.`funcao` as `funcao`');
            $this->db->select('`tipo_solicitacao_certidao`.`descricao` as `tipo_solicitacao`');
            $this->db->select('`solicitacao_certidao`.*');
            $this->db->select('`solicitacao_certidao_status_solicitacao_certidao`.`idstatus_solicitacao_certidao` as `status_atual`');
            $this->db->select('`solicitacao_certidao_status_solicitacao_certidao`.`data` as `status_data`');
            
            $this->db->from('`solicitacao_certidao_status_solicitacao_certidao`');
            $this->db->join('`solicitacao_certidao`', '`solicitacao_certidao`.`idsolicitacao_certidao` = `solicitacao_certidao_status_solicitacao_certidao`.`idsolicitacao_certidao`');
            $this->db->join('`tipo_solicitacao_certidao`','`tipo_solicitacao_certidao`.`idtipo_solicitacao_certidao` = `solicitacao_certidao`.`idtipo_solicitacao_certidao`');
            $this->db->join('`usuario`', '`solicitacao_certidao_status_solicitacao_certidao`.`usuario_idusuario` = `usuario`.`idusuario`');
            $this->db->join('`comarca`', '`comarca`.`idcomarca` = `solicitacao_certidao_status_solicitacao_certidao`.`idcomarca`');
            $this->db->join(
                    '`comarca_usuario`', 
                    '`comarca_usuario`.`idusuario` = `usuario`.`idusuario` and `comarca_usuario`.`idcomarca` = `comarca`.`idcomarca`'
                    );
            $this->db->where(
                    array('`solicitacao_certidao_status_solicitacao_certidao`.`idsolicitacao_certidao`'=>$id, 
                          '`comarca`.`idcomarca`' => $comarca,
                          '`solicitacao_certidao_status_solicitacao_certidao`.`idstatus_solicitacao_certidao`' => 3
                        ));
            $this->db->group_by('`comarca`.`idcomarca`');  
            return $this->db->get()->result();
         }else{
            return FALSE;
        }
     }
    public function busca_id($id=NULL){
        if($id!=NULL){
            
            $this->db->select('*, max(`solicitacao_certidao_status_solicitacao_certidao`.`idstatus_solicitacao_certidao`) as `status_atual`');
            $this->db->from('`solicitacao_certidao_status_solicitacao_certidao`');
            $this->db->join('`solicitacao_certidao`', '`solicitacao_certidao`.`idsolicitacao_certidao` = `solicitacao_certidao_status_solicitacao_certidao`.`idsolicitacao_certidao`');
            $this->db->join('`tipo_solicitacao_certidao`','`tipo_solicitacao_certidao`.`idtipo_solicitacao_certidao` = `solicitacao_certidao`.`idtipo_solicitacao_certidao`');
            $this->db->join('`comarca`', '`comarca`.`idcomarca` = `solicitacao_certidao_status_solicitacao_certidao`.`idcomarca`');
            $this->db->where('`solicitacao_certidao_status_solicitacao_certidao`.`idsolicitacao_certidao` =',$id);
            $this->db->group_by('`comarca`.`idcomarca`');
            
            return $this->db->get()->result();
        }else{
            return FALSE;
        }
    }
    
    public function busca_comarcas($comarcas=NULL){
        if($comarcas!=NULL){
        	$sql =   "select l1.*,l3.idcomarca,l3.idstatus_solicitacao_certidao as status_atual,l3.data, tipo_solicitacao_certidao.descricao,l3.usuario_idusuario, comarca.nome
					  from solicitacao_certidao as l1
					  inner join
					        (select idsolicitacao_certidao,idcomarca, max(idstatus_solicitacao_certidao) as status_atual
					        from solicitacao_certidao_status_solicitacao_certidao group by idsolicitacao_certidao,idcomarca) as l2
					        on l1.idsolicitacao_certidao = l2.idsolicitacao_certidao
					  inner join solicitacao_certidao_status_solicitacao_certidao as l3
							on l3.idsolicitacao_certidao = l2.idsolicitacao_certidao and l3.idstatus_solicitacao_certidao = l2.status_atual and l3.idcomarca = l2.idcomarca
					  inner join tipo_solicitacao_certidao 
					        on l1.idtipo_solicitacao_certidao = tipo_solicitacao_certidao.idtipo_solicitacao_certidao   
					  inner join comarca
					        on l3.idcomarca = comarca.idcomarca  
					        where l3.idcomarca in ?";	
            $query = $this->db->query($sql, array($comarcas));
            return $query->result();
			
        }else{
            return FALSE;
        }
    }
    
    public function busca_id_comarca($id=NULL,$comarca=NULL){
        if($id!=NULL && $comarca!= NULL){
            
            $this->db->select('*, max(`solicitacao_certidao_status_solicitacao_certidao`.`idstatus_solicitacao_certidao`) as `status_atual`');
            $this->db->from('`solicitacao_certidao_status_solicitacao_certidao`');
            $this->db->join('`solicitacao_certidao`', '`solicitacao_certidao`.`idsolicitacao_certidao` = `solicitacao_certidao_status_solicitacao_certidao`.`idsolicitacao_certidao`');
            $this->db->join('`tipo_solicitacao_certidao`','`tipo_solicitacao_certidao`.`idtipo_solicitacao_certidao` = `solicitacao_certidao`.`idtipo_solicitacao_certidao`');
            $this->db->join('`comarca`', '`comarca`.`idcomarca` = `solicitacao_certidao_status_solicitacao_certidao`.`idcomarca`');
            //$this->db->where('`solicitacao_certidao_status_solicitacao_certidao`.`idsolicitacao_certidao` =',$id);
            $this->db->where(array('`solicitacao_certidao_status_solicitacao_certidao`.`idsolicitacao_certidao`'=>$id, '`comarca`.`idcomarca`' => $comarca));
            $this->db->group_by('`comarca`.`idcomarca`');
            
            return $this->db->get()->result();
        }else{
            return FALSE;
        }
    }
    public function altera($dados=NULL,$condicao=NULL){
        if($dados!=NULL and $condicao!=NULL){
            if($this->db->update('solicitacao_certidao',$dados,$condicao)){
            }
            else{
               
            }
        }
    }
    public function excluir($condicao=NULL){
       
        if($condicao!=NULL){
            
                if($this->db->delete('solicitacao_certidao',$condicao)){
                    
                }
                else{
                }
            
            }
            
    }
}