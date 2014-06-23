<?php
    $user = Structure::verifySession();
    Structure::header();
?>
                <form class="form-inscricao" onsubmit="return validateStep1();" action="<?=APP_URL?>/admin/action/arquivo/enviar" method="post" enctype="multipart/form-data">
                    <h1>Arquivos > Enviar arquivo</h1>

                    <label for="filename">Nome do Arquivo <em>(Máximo de 50 caracteres)</em></label>
                    <input name="filename" type="text" id="filename" placeholder="manual_da_suruba.pdf" required="required" maxlengh="50">
                                            
                    <label for="file">Arquivo <em>(Limite de <?=MAX_FILESIZE?>)</em></label>
                    <input name="user_file" type="file" id="file" required="required">
                
                    <p><input type="submit" value="Enviar arquivo" /></p>
            </form>
<?php Structure::footer(); ?>
