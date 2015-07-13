
            <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Solicitações</h3>
                </div><!-- /.box-header -->
                
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>N°</th>
                        <th>Data</th>
                        <th>Documento</th>
                        <th>Comarca</th>
                        <th>Tipo</th>
                        <th>Status</th>
                        <th>Ações</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($solicitacoes as $key => $solicitacao) {?>
                      <tr>
                        <td><?=$solicitacao->uid;?></td>
                        <td><?=(new \DateTime($solicitacao->data))->format('d-m-Y H:i:s');?></td>
                        <td><?=$solicitacao->doc;?></td>
                        <td><?=$solicitacao->nome;?></td>
                        <td><?=$solicitacao->tipo;?></td>
                        <td>
                            <?php
                                if($solicitacao->status_atual == 1){
                                    echo anchor("admin/solicitacao/$solicitacao->uid/$solicitacao->idcomarca",
                                            'Iniciado <img alt="Editar" width="25" src="'.base_url('includes/tabela/icones/window_enter.png').'">');
                                }
                                if($solicitacao->status_atual == 2){
                                   echo anchor("admin/solicitacao/$solicitacao->uid/$solicitacao->idcomarca",
                                            'Em Análise <img alt="Editar" width="25" src="'.base_url('includes/tabela/icones/search_file.png').'">'); 
                                }
                                if($solicitacao->status_atual == 3){
                                    echo anchor("admin/solicitacao/$solicitacao->uid/$solicitacao->idcomarca",
                                            'Liberado <img alt="Editar" width="25" src="'.base_url('includes/tabela/icones/accept.png').'">');
                                }
                                if($solicitacao->status_atual == 4){
                                    echo anchor("admin/solicitacao/$solicitacao->uid/$solicitacao->idcomarca",
                                            'Recusado <img alt="Editar" width="25" src="'.base_url('includes/tabela/icones/_recusado.png').'">');
                                }
                            ?>
                        </td>
                        <td><?php
                            if($solicitacao->status_atual == 3){
                                echo anchor("solicitacao_certidao/pdf/$solicitacao->uid/$solicitacao->idcomarca",
                                'Imprimir <img alt="Editar" width="25" src="'.base_url('includes/tabela/icones/printer_inkjet.png').'">');
								if( $solicitacao->idusuario == $this->session->userdata("usr_id")){
                                    	echo anchor("admin/analisar/$solicitacao->uid/$solicitacao->idcomarca",
                                            ' Reanalisar <img alt="Editar" width="25" src="'.base_url('includes/tabela/icones/analisar.png').'">');
                                    }   
                                
                            }
							
							if($solicitacao->status_atual == 4){
                               
								if( $solicitacao->idusuario == $this->session->userdata("usr_id")){
                                    	echo anchor("admin/analisar/$solicitacao->uid/$solicitacao->idcomarca",
                                            ' Reanalisar <img alt="Editar" width="25" src="'.base_url('includes/tabela/icones/analisar.png').'">');
                                    }   
                                
                            }
							
							if($solicitacao->status_atual == 1){
                                    echo anchor("admin/analisar/$solicitacao->uid/$solicitacao->idcomarca",
                                            'Analisar <img alt="Editar" width="25" src="'.base_url('includes/tabela/icones/analisar.png').'">');
                                         
                             }
                             
							 if($solicitacao->status_atual == 2){
							 	if( $solicitacao->idusuario == $this->session->userdata("usr_id")){
							 		echo anchor("admin/liberar/$solicitacao->uid/$solicitacao->idcomarca",
                                            'Liberar <img alt="Editar" width="25" src="'.base_url('includes/tabela/icones/liberar.png').'">');
                                    echo " ";
                                    echo anchor("admin/recusar/$solicitacao->uid/$solicitacao->idcomarca",
                                            'Recusar <img alt="Editar" width="25" src="'.base_url('includes/tabela/icones/recusar.png').'">');        
							 	}
							else {
									$data_status = new DateTime($solicitacao->data);
									$data_status->add(new DateInterval( "P1D" ));
									$data_atual = new DateTime();
									if($data_status < $data_atual)
									{
										echo anchor("admin/analisar/$solicitacao->uid/$solicitacao->idcomarca",
                                            'Analisar <img alt="Editar" width="25" src="'.base_url('includes/tabela/icones/analisar.png').'">');
												
									}
								 }
							 }
                            ?>
                        </td>
                      </tr>
                        <?php } ?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>N°</th>
                        <th>Data</th>
                        <th>Documento</th>
                        <th>Comarca</th>
                        <th>Tipo</th>
                        <th>Status</th>
                        <th>Ações</th>
                      </tr>
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
              </div>