<?php
    $urlpatterns = array(
		"/" => "index.php",
		"/404" => "theme/404.php",
		"/login" => "action/login.php",
        "/logout" => "action/logout.php",

        "/admin/blacklist/cadastrar" => "form/blacklist_cadastrar.php",
		"/admin/blacklist/editar" => "form/blacklist_editar.php",
		"/admin/blacklist/listar" => "form/blacklist_listar.php",
        "/admin/action/blacklist/cadastrar" => "action/blacklist_cadastrar.php",
        "/admin/action/blacklist/editar" => "action/blacklist_editar.php",
        "/admin/action/blacklist/excluir" => "action/blacklist_excluir.php",
		
		"/arquivo/enviar" => "form/arquivo_enviar.php",
		"/arquivo/listar" => "form/arquivo_listar.php",
		"/usuario/cadastrar" => "form/usuario_cadastrar.php",
		"/usuario/atualizar" => "form/usuario_atualizar.php",

		"/action/arquivo/enviar" => "action/arquivo_enviar.php",
        "/action/usuario/cadastrar" => "action/usuario_cadastrar.php",
		"/action/usuario/atualizar" => "action/usuario_atualizar.php",

        "/dashboard" => "form/dashboard.php",
        
		"/lost_password" => "form/lost_password.php",
		"/request" => "action/request.php",
		"/restore" => "form/restore.php",
		"/reset_password" => "action/reset_password.php"
	);
?>
