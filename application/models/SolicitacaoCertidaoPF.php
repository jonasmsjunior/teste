<?php
class SolicitacaoCertidaoPF extends CI_Model{
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
            if($this->db->insert('solicitacao_certidao_pf',$dados)){
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
    public function busca_uid($uid=NULL){
        if($uid!=NULL){
            $sql =   "select l1.*,l3.idcomarca,l3.idstatus_solicitacao_certidao as status_atual,l3.data, group_concat(l5.descricao) as tipo ,l3.idusuario, l6.nome
					  from solicitacao_certidao_pf as l1
					  inner join
					        (select uidsolicitacao,idcomarca, max(idstatus_solicitacao_certidao) as status_atual
							from solicitacao_certidao_status_solicitacao_certidao 
							group by uidsolicitacao,idcomarca) as l2
					        on l1.uid = l2.uidsolicitacao
                            
					  inner join solicitacao_certidao_status_solicitacao_certidao as l3
							on l3.uidsolicitacao = l2.uidsolicitacao
                            and l3.idstatus_solicitacao_certidao = l2.status_atual 
                            and l3.idcomarca = l2.idcomarca
                       
					  inner join solicitacao_certidao_tipo_solicitacao_certidao as l4
							on l4.uidsolicitacao = l1.uid
                            
					  inner join tipo_solicitacao_certidao as l5
					        on l4.idtipo_solicitacao_certidao = l5.id
                            
					  inner join comarca as l6
					        on l3.idcomarca = l6.id 
					  where l1.uid = ?
					  group by l6.nome,l1.id
                                          order by l5.descricao,data,l1.id";
            $query = $this->db->query($sql, $uid);
            return $query->result();
        }else{
            return FALSE;
        }
    }
    
    public function busca_comarcas($comarcas=NULL){
        if($comarcas!=NULL){
        $sql =   "select l1.*,l3.idcomarca,l3.idstatus_solicitacao_certidao as status_atual,l3.data, group_concat(l5.descricao) as tipo ,l3.idusuario, l6.nome
                    from (select uid,cpf as doc, data_solicitacao  from solicitacao_certidao_pf
                            union
                            select uid,cnpj as doc, data_solicitacao  from solicitacao_certidao_pj)  as l1
                    inner join
                    (select uidsolicitacao,idcomarca, max(idstatus_solicitacao_certidao) as status_atual
                        from solicitacao_certidao_status_solicitacao_certidao 
                        group by uidsolicitacao,idcomarca) as l2
                    on l1.uid = l2.uidsolicitacao
                            
                    inner join solicitacao_certidao_status_solicitacao_certidao as l3
                    on l3.uidsolicitacao = l2.uidsolicitacao
                    and l3.idstatus_solicitacao_certidao = l2.status_atual 
                    and l3.idcomarca = l2.idcomarca
                       
                    inner join solicitacao_certidao_tipo_solicitacao_certidao as l4
                    on l4.uidsolicitacao = l1.uid
                            
                    inner join tipo_solicitacao_certidao as l5
                    on l4.idtipo_solicitacao_certidao = l5.id
                            
                    inner join comarca as l6
                    on l3.idcomarca = l6.id
                    
                    where l3.idcomarca in ?
					 
                    group by l6.nome,l1.uid
                    order by l5.descricao,data,l1.uid";	
            $query = $this->db->query($sql, array($comarcas));
            return $query->result();
			
        }else{
            return FALSE;
        }
    }
    
    public function busca_uid_comarca($uid=NULL,$comarca=NULL){
        
         if($uid!=NULL && $comarca!= NULL){
            $sql =   "select l1.nome as nome_pessoa,l1.*,l6.nome as comarca,l6.telefone,l3.idcomarca,l3.idstatus_solicitacao_certidao as status_atual,l3.data,l3.observacao, group_concat(l5.descricao) as tipo ,l3.idusuario, l7.nome as nome_usuario, l6.nome, l8.funcao
					  from solicitacao_certidao_pf as l1
					  inner join
					        (select uidsolicitacao,idcomarca, max(idstatus_solicitacao_certidao) as status_atual
							from solicitacao_certidao_status_solicitacao_certidao 
							group by uidsolicitacao,idcomarca) as l2
					        on l1.uid = l2.uidsolicitacao
                            
					  inner join solicitacao_certidao_status_solicitacao_certidao as l3
                                                    on l3.uidsolicitacao = l2.uidsolicitacao
                                                    and l3.idstatus_solicitacao_certidao = l2.status_atual 
                                                    and l3.idcomarca = l2.idcomarca
                       
					  inner join solicitacao_certidao_tipo_solicitacao_certidao as l4
							on l4.uidsolicitacao = l1.uid
                            
					  inner join tipo_solicitacao_certidao as l5
					        on l4.idtipo_solicitacao_certidao = l5.id
                            
					  inner join comarca as l6
					        on l3.idcomarca = l6.id 
                                                
                                          left join usuario as l7  
                                                on l7.id = l3.idusuario
                                          
                                          left join comarca_usuario as l8
                                                on l8.idusuario = l3.idusuario
                                                and l8.idcomarca = l3.idcomarca
                                                
					  where l1.uid = ? and
                                                l3.idcomarca = ?
					  group by l6.nome,l1.id
                                          order by l5.descricao,data,l1.id";
            $query = $this->db->query($sql, array($uid,$comarca));
            //echo $this->db->last_query();
            return $query->result();
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