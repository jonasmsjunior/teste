    <div class="container">
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4">
            
            <div class="account-wall">
                
                <form class="form-signin" role="form" method="post" action="<?= base_url('login/logar') ?>">
                	<div class="control-group col-sm-12">
	                    <label class="control-label" for="matricula">N° de Matrícula:</label>
	                    <div class="input-group">
	                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
	                        <input type="text" class="form-control" placeholder="Informe seu número de matrícula" name="matricula" value="<?=set_value('matricula');?>" required="">
	                    </div> 
	                </div>
	                
	                <div class="control-group col-sm-12">
	                    <label class="control-label" for="senha">Senha:</label>
	                    <div class="input-group">
	                        <span class="input-group-addon"><i class="fa fa-key"></i></span>
	                        <input type="password" class="form-control" placeholder="Informe sua senha" name="senha" value="<?=set_value('nome');?>" required="">
	                    </div> 
	                </div>
	                <div class="control-group col-sm-12">
	                	<label class="control-label" for="senha"></label>
		                <button class="btn btn-lg btn-primary btn-block" type="submit">Entar</button>
		                <a href="<?= base_url('solicitacao_acesso'); ?>" class="text-center new-account">Solicitar acesso</a>
	                	
	                </div>
                </form>
            </div>
            
        </div>
    </div>
</div>