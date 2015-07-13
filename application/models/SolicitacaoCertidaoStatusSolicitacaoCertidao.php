<?php
class SolicitacaoCertidaoStatusSolicitacaoCertidao extends CI_Model{
    public function __construct() {
        parent::__construct();
    }
    public function lista(){
        return $this->db->get('solicitacao_certidao_status_solicitacao_certidao');
    }
    public function inserir($dados=NULL){
        if($dados!=NULL){
            if($this->db->insert('solicitacao_certidao_status_solicitacao_certidao',$dados)){
            	return TRUE;
            }
        }
		return FALSE;
    }
    public function busca_id($uid=NULL, $comarca=NULL){
        if($uid!=NULL and $comarca!=NULL){
            //$this->db->select('*');
            $this->db->select('`usuario`.`nome`');
            $this->db->select('`solicitacao_certidao_status_solicitacao_certidao`.`idusuario`');
            $this->db->select('`comarca`.`nome` as `comarca`');
            $this->db->select('`idstatus_solicitacao_certidao`');
            $this->db->select('`data`');
            $this->db->select('`observacao`');
            
            $this->db->from('`solicitacao_certidao_status_solicitacao_certidao`');
            $this->db->join('`usuario`', '`solicitacao_certidao_status_solicitacao_certidao`.`idusuario` = `usuario`.`id`', 'left');
            $this->db->join('`comarca`', '`comarca`.`id` = `solicitacao_certidao_status_solicitacao_certidao`.`idcomarca`');
            $this->db->where(array('`uidsolicitacao`'=>$uid, '`comarca`.`id`' => $comarca));
            $this->db->order_by('`idstatus_solicitacao_certidao`');
            return $this->db->get()->result();
        }else{
            return FALSE;
        }
    }
    public function altera($dados=NULL,$condicao=NULL){
        if($dados!=NULL and $condicao!=NULL){
            if($this->db->update('solicitacao_certidao_status_solicitacao_certidao',$dados,$condicao)){
            }
            else{
               
            }
        }
    }
    public function excluir($condicao=NULL){
       
        if($condicao!=NULL){
            
                if($this->db->delete('solicitacao_certidao_status_solicitacao_certidao',$condicao)){
                    
                }
                else{
                }
            
            }
            
    }
}