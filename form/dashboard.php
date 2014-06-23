<?php
    $usuario = Structure::verifySession();	
	Structure::header();
?>

                <h1>Painel</h1>
                <?php include_once("custom/custom_dashboard.php"); ?>
                <?php if($usuario->get('privilegio') == 'ADM') : ?>
                <?php include_once("custom/custom_dashboard_admin.php"); ?>
                <?php endif; ?>

<?php Structure::footer(); ?>
