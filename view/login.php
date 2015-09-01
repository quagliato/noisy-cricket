<?php Structure::header(); ?>
        <main>
            <header class="center">
                <h1>Login</h1>
            </header>
            <section class="center">
                <form action="<?=APP_URL?>/login"  method="post" class="new_submit login left">
                    <div class="input_line">
                        <div class="input_container full last">
                            <label for="email">Email</label>
                            <input name="User-email" type="text" id="email" required="required" placeholder="usuario@servidor.tld">
                        </div>
                    </div>

                    <div class="input_line">
                        <div class="input_container full last">
                            <label for="senha">Senha</label>
                            <input name="User-senha" type="password" id="password" required="required">
                        </div>
                    </div>

                    <p><input type="submit" value="Entrar" class="positive fright"/></p>

                    <p><a href="lost_password">Esqueceu a senha?</a></p>
                    <p><a href="<?=APP_URL?>/user/cadastrar">Ainda não tem cadastro? Clique aqui.</a></p>
                </form>
            </section>
        </main>
<?php Structure::footer(); ?>
