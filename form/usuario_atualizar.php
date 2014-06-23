<?php
	$usuario = Structure::verifySession();
	Structure::header();
?>
                <form action="<?=APP_URL?>/action/usuario/atualizar" method="post" class="new_submit">
                    <h1>Usuário > Alterar Cadastro</h1>

                    <label for="nome">Nome completo</label>
                    <input name="Usuario-nome" type="text" id="nome" required="required" value="<?=$usuario->get('nome')?>">
                                            
                    <label for="senha">Senha</label>
                    <input name="Usuario-senha" type="password" id="senha" placeholder="Senha difícil">
                
                    <label for="confirmacao_senha">Confirmação Senha</label>
                    <input name="confirmacao_senha" type="password" id="confirmacao_senha" placeholder="Confirme sua senha" onchange="validatePassword()">

                    <label for="email">Email</label>
                    <input name="Usuario-email" type="email" id="email" prequired="required" max-length="100" value="<?=$usuario->get('email')?>">

                    <p><input class="btn btn-success" type="submit" value="Atualizar" /></p>
                </form>

<?php Structure::footer(); ?>
