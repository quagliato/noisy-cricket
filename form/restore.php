<?php
    Structure::header();
    if (!isset($_GET['code']) || is_null($_GET['code'])) {
        Structure::redirWithMessage("Nãnãninanão!", "/");
    }
?>
            <h1>Restaurar Senha</h1>
            <form method="POST" onsubmit="return validateRestorePassword();" action="reset_password" class="new_submit">
                <input type="hidden" name="code" value="<?=$_GET['code']?>">

                <label for="senha">Senha</label>
                <input id="senha" type="password" name="senha" required />

                <label for="confirmacao_senha">Confirme sua senha</label>
                <input id="confirmacao_senha" type="password" name="confirmacao_senha" required />

                <p><input id="restaurar" type="submit" value="Restaurar" /></p>
            </form>
<?php Structure::footer(); ?>
