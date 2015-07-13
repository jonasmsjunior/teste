<?php
class UsuarioComarca extends CI_Model{
    public function __construct() {
        parent::__construct();
    }
    public function buscar($parametros) {
        return $this->db->get_where('comarca_usuario', $parametros);
        
    }
    
     public function inserir($dados){
        return $this->db->insert('comarca_usuario', $dados);
    }
    public function lista(){
        return $this->db->get('comarca_usuario');
    }
    public function alterar($dados=NULL,$condicao=NULL){
        if($dados!=NULL and $condicao!=NULL){
            if($this->db->update('comarca_usuario',$dados,$condicao)){
                
            }
        }
    }
}