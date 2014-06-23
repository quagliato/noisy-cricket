<?php Structure::header(); ?>

		<article>
            <form action="<?=APP_URL?>/login"  method="post" class="new_submit">

                <h1>Login</h1>

                <label for="email">Email</label>
                <input name="Usuario-email" type="text" id="email" required="required">
                                        
                <label for="senha">Senha</label>
                <input name="Usuario-senha" type="password" id="senha" required="required">

                <p><a href="lost_password">Esqueceu a senha?</a></p>
            
                <input type="submit" value="Entrar" />

                <p><a href="<?=APP_URL?>/usuario/cadastrar">Ainda não tem cadastro? Clique aqui.</a></p>
            </form>
        </article>
<?php Structure::footer(); ?>
