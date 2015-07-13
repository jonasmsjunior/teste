
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
                        <th>CPF</th>
                        <th>Comarca</th>
                        <th>Tipo</th>
                        <th>Status</th>
                        <th>Ações</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($solicitacoes as $key => $solicitacao) {?>
                      <tr>
                        <td><?=$solicitacao->idsolicitacao_certidao;?></td>
                        <td><?=(new \DateTime($solicitacao->data))->format('d-m-Y H:i:s');?></td>
                        <td><?=$solicitacao->cpf;?></td>
                        <td><?=$solicitacao->nome;?></td>
                        <td><?=$solicitacao->descricao;?></td>
                        <td>
                            <?php
                                if($solicitacao->status_atual == 1){
                                    echo anchor("solicitacao_certidao/acompanhar/$solicitacao->idsolicitacao_certidao/$solicitacao->idcomarca",
                                            'Iniciado <img alt="Editar" width="25" src="'.base_url('includes/tabela/icones/window_enter.png').'">');
                                }
                                if($solicitacao->status_atual == 2){
                                   echo anchor("solicitacao_certidao/acompanhar/$solicitacao->idsolicitacao_certidao/$solicitacao->idcomarca",
                                            'Em Análise <img alt="Editar" width="25" src="'.base_url('includes/tabela/icones/search_file.png').'">'); 
                                }
                                if($solicitacao->status_atual == 3){
                                    echo anchor("solicitacao_certidao/acompanhar/$solicitacao->idsolicitacao_certidao/$solicitacao->idcomarca",
                                            'Liberado <img alt="Editar" width="25" src="'.base_url('includes/tabela/icones/accept.png').'">');
                                }
                                if($solicitacao->status_atual == 4){
                                    echo anchor("solicitacao_certidao/acompanhar/$solicitacao->idsolicitacao_certidao/$solicitacao->idcomarca",
                                            'Recusado <img alt="Editar" width="25" src="'.base_url('includes/tabela/icones/_recusado.png').'">');
                                }
                            ?>
                        </td>
                        <td><?php
                            if($solicitacao->status_atual == 3){
                                echo anchor("solicitacao_certidao/pdf/$solicitacao->idsolicitacao_certidao/$solicitacao->idcomarca",'Imprimir <img alt="Editar" width="25" src="'.base_url('includes/tabela/icones/printer_inkjet.png').'">');
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
                        <th>CPF</th>
                        <th>Comarca</th>
                        <th>Tipo</th>
                        <th>Status</th>
                        <th>Ações</th>
                      </tr>
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
              </div>