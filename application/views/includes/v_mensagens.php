<section class="info_service">
    <div class="container"><?php 
    if($this->session->flashdata('msg_sucesso')){
    ?>
        <div class="alert alert-success alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="fechar">
                 <span aria-hidden="true">&times;</span>
            </button>
            <strong><?=$this->session->flashdata('msg_sucesso');?></strong> 
        </div>
    <?php
    }
    if($this->session->flashdata('msg_alerta')){
    ?>
        <div class="alert alert-warning alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="fechar">
                 <span aria-hidden="true">&times;</span>
            </button>
            <strong><?=$this->session->flashdata('msg_alerta');?></strong> 
        </div>
    <?php    
    }
    if($this->session->flashdata('msg_falha')){
    ?>
        <div class="alert alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="fechar">
                 <span aria-hidden="true">&times;</span>
            </button>
            <?=$this->session->flashdata('msg_falha');?>
        </div>
    <?php  
	}
    $this->session->set_flashdata('msg_sucesso',NULL);  
	$this->session->set_flashdata('msg_falha',NULL); 
	$this->session->set_flashdata('msg_alerta',NULL);  
   
    ?>
    </div>
</section>


