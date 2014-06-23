<?php
	Structure::header();
?>
                <h1>Restaurar Senha</h1>
				    <form method="POST" action="<?=APP_URL?>/request" class="new_submit">
						<label for="email">E-mail</label>
						<input id="email" type="email" name="email" placeholder="usuario@servidor.com.br" required>

                        <p><input id="submit" type="submit" value="Restaurar" /></p>
                    </form>
<?php Structure::footer(); ?>
