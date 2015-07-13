<?php
class SolicitacaoCertidaoPJ extends CI_Model{
    public function __construct() {
        parent::__construct();
    }
    
    public function inserir($dados=NULL){
        if($dados!=NULL){
            if($this->db->insert('solicitacao_certidao_pj',$dados)){
            	return TRUE;
            }
        }
		return FALSE;
    }
    
    public function busca_uid($uid=NULL){
        if($uid!=NULL){
            $sql =   "select l1.*,l3.idcomarca,l3.idstatus_solicitacao_certidao as status_atual,l3.data, group_concat(l5.descricao) as tipo ,l3.idusuario, l6.nome
					  from solicitacao_certidao_pj as l1
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
             //echo $this->db->last_query();
            return $query->result();
        }else{
            return FALSE;
        }
    }
    
    public function busca_uid_comarca($uid=NULL,$comarca=NULL){
        
         if($uid!=NULL && $comarca!= NULL){
            $sql =   "select l1.*,l6.nome as comarca,l6.telefone,l3.idcomarca,l3.idstatus_solicitacao_certidao as status_atual,l3.data,l3.observacao, group_concat(l5.descricao) as tipo ,l3.idusuario, l7.nome as nome_usuario, l6.nome, l8.funcao
					  from solicitacao_certidao_pj as l1
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
}