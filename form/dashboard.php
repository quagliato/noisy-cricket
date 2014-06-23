<?php
    $usuario = Structure::verifySession();	
	Structure::header();

    $usu_id = $usuario->get('id');
?>

                <h1>Painel</h1>
                <?php include_once("custom/custom_dashboard.php"); ?>
                <?php if($usuario->get('privilegio') == 'ADM') : ?>
                <h2>Admin</h2>
                <?php include_once("custom/custom_dashboard_admin.php"); ?>
                <?php endif; ?>

<?php Structure::footer(); ?>
