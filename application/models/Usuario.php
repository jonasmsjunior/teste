<?php
class Usuario extends CI_Model{
    public function __construct() {
        parent::__construct();
    }
    public function buscar($parametros) {
        return $this->db->get_where('usuario', $parametros);
        
    }
    
    public function inserir($dados){
        return $this->db->insert('usuario', $dados);
    }
    public function lista(){
        return $this->db->get('usuario');
    }
    public function alterar($dados=NULL,$condicao=NULL){
        if($dados!=NULL and $condicao!=NULL){
            if($this->db->update('usuario',$dados,$condicao)){
                
            }
        }
    }
}