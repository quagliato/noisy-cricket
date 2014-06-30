<?php
	session_start();
	if(isset($_SESSION['user_id'])) unset($_SESSION['user_id']);
	
	Structure::header();
?>
                <form method="POST" action="<?=APP_URL?>/action/usuario/cadastrar" class="new_submit">
                    <h1>Usuário > Cadastrar</h1>

                    <label for="nome">Nome completo</label>
                    <input name="Usuario-nome" type="text" id="nome" required="required">

                    <label for="email">Email</label>
                    <input name="Usuario-email" type="email" id="email" required="required">

                    <label for="senha">Senha</label>
                    <input name="Usuario-senha" type="password" id="senha" required="required">
                
                    <label for="confirmacao_senha">Confirmação Senha</label>
                    <input name="confirmacao_senha" type="password" id="confirmacao_senha" placeholder="Confirme sua senha" required="required" onchange="validatePassword()">

                    <p><input type="submit" value="Cadastrar" /></p>
                </form>
<?php Structure::footer(); ?>
