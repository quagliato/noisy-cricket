<?php
    $usuario = Structure::verifySession();	
	Structure::header();

    $usu_id = $usuario->get('id');
?>

                <h1>Painel</h1>
                <?php if($usuario->get('privilegio') == 'ADM') : ?>
                <h2>Admin</h2>
                <ul>
                    <li><a href="<?=APP_URL?>/admin/info_panel">Info Panel</a></li>
                    <li><a href="<?=APP_URL?>/admin/valor/listar">Valores</a></li>
                    <li><a href="<?=APP_URL?>/admin/blacklist/listar">Blacklist</a></li>
                    <!--li><a href="<?=APP_URL?>/admin/isencao/cadastrar">Cadastrar Isenção</a></li-->
                    <li><a href="<?=APP_URL?>/admin/inscricao/buscar">Buscar Inscrição</a></li>
                </ul>
                <?php endif; ?>

<?php Structure::footer(); ?>
