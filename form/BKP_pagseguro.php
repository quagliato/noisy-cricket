<?php

	$valor_dao = new ValorDAO;
	if ($valor_dao->isMaxReached(0) && $valor_dao->isMaxReached(3)) {
        Structure::redirWithMessage("Lote finalizado. Inscricoes encerradas.", "/");
    }
	
	function getNome($pacote) {
		$valor_dao = new ValorDAO;
	
		$result = $valor_dao->getValorDescricaoAtual($pacote);
		
		if (!$result) {
			Structure::redirWithMessage("Ocorreram problemas. Por favor, tente novamente", "/");
		}
	
		switch($pacote) {
			case 0: return "Inscricao Basica - ".$result;
			case 1: return $result;
			case 2: return $result;
			case 3: return $result;
		}
	}
	
	Structure::verifySession(0);
	
	if (!isset($_POST['pacotes'])) {
		var_dump($_POST);
		Structure::redirWithMessage("Selecione ao menos um pacote.", "/passo2");
	}
	
	Structure::header();
?>

                <h1>Inscrições</h1>
				<p><strong>Caros encontristras</strong>,<br />Informamos que o não comparecimento ao evento, após quitado o valor da inscrição, não implica na devolução desse valor, em qualquer hipótese.</p>
                
                <div style="margin-top:20px;">

<?php
	
	$id_user = $_SESSION['user_id'];
    $userDAO = new UsuarioDAO;
    $user = $userDAO->getUserById($id_user);
    $usuario = $user;
	
	$dao = new GenericDAO;
	$pacotes = array();
	$valor_total = 0;
	$valor_dao = new ValorDAO;
	$isencao_dao = new IsencaoDAO;
	$isencao_total = 0;
	
	foreach ($_POST['pacotes'] as $key => $val) {
		$pacotes[] = $val;
	}
	
	foreach($pacotes as $pacote) {
		$valor_total += $valor_dao->getValorAtual($pacote);
	}
	
	$isencoes = $isencao_dao->getIsencoes($user->get('email'));
	
	if ($isencoes) {
		foreach($isencoes as $isencao => $valor) {
			$isencao_total += $valor;
		}
	}
	
	$valor_final = $valor_total - $isencao_total;
	
	$datetime_agora = date('Y-m-d H:i:s');
	
	$transacao = new Transacao;
	
	$transacao->set('id_user', $id_user);
	$transacao->set('valor_total', $valor_total);
	$transacao->set('data_criacao', $datetime_agora);
	$transacao->set('status', 0);
	
	if ($isencao_total > 0) {
		$transacao->set('isencao', 1);
	}
	
	$result = $dao->insert($transacao);
	
	if (!$result) {
		Structure::redirWithMessage("301 - Problemas ao criar transacao. Tente novamente, por favor.", "/");
	}
	
	$transacao = $dao->selectAll('Transacao',"id_user = $id_user AND valor_total = $valor_total AND data_criacao = '$datetime_agora' AND status = 0");
	$id_transacao = $transacao->get('id');
	
	$itens = array();
	$total_isento = true;
	
	foreach ($pacotes as $pacote) {
		
			$transacao_item = new TransacaoItem;
			$transacao_item->set('id_transacao', $id_transacao);
			$transacao_item->set('id_item', $pacote);
			$transacao_item->set('desc_item', getNome($pacote));
			$transacao_item->set('valor_item',$valor_dao->getValorAtual($pacote));
			
			if ($isencao_dao->hasIsencao($user->get('email'), $pacote)) {
				$transacao_item->set('isencao', 1);
			} else {
				$total_isento = false;
			}
			
			$itens[] = $transacao_item;
	}
	
	$problemas = false;
	
	foreach ($itens as $item) {
		$result = $dao->insert($item);
		
		if (!$result)
			$problemas = true;
	}
	
	if ($problemas) {
		//deleta itens
		//delete transacoes
		Structure::redirWithMessage("302 - Problemas ao criar transacao. Tente novamente, por favor.", "/");
	}
	
	$itens = $dao->selectAll('TransacaoItem',"id_transacao = $id_transacao");
	
	if (!$itens) {
		//deleta itens
		//delete transacoes
		Structure::redirWithMessage("303 - Problemas ao criar transacao. Tente novamente, por favor.", "/");		
	}
	
	if (!$total_isento) {
		$paymentRequest = new PagSeguroPaymentRequest();
		
		$paymentRequest->setCurrency("BRL");
		
		if (is_array($itens)) {
			foreach ($itens as $item) {
				if ($item->get('isencao') == 0) {
					$valor_item = $item->get('valor_item');
					$valor_item = number_format($valor_item, 2, '.', '');
					$paymentRequest->addItem($item->get('id_item'), $item->get('desc_item'), 1, $valor_item);  	
				}
			}
		} else {
			$item = $itens;
			if ($item->get('isencao') == 0) {
				$valor_item = $item->get('valor_item');
				$valor_item = number_format($valor_item, 2, '.', '');
				$paymentRequest->addItem($item->get('id_item'), $item->get('desc_item'), 1, $valor_item);  	
			}			
		}
		
		$paymentRequest->setReference($id_transacao);
		$paymentRequest->setMaxAge(259200);
		$paymentRequest->setMaxUses(15);
		$paymentRequest->setSender($usuario->get('nome'), $usuario->get('email'), '41', '98623286');
		
		$paymentRequest->setRedirectUrl(APP_URL."/passo2");
		
		try {
		
			$credentials = new PagSeguroAccountCredentials(PAGSEGURO_EMAIL, PAGSEGURO_TOKEN);
			$url = $paymentRequest->register($credentials);
			if ($url) {
					echo "<p><a title=\"URL do pagamento\" href=\"$url\">Ir para o pagamento.</a></p>";
					
					$transacao = new Transacao;
					$transacao->set('id', $id_transacao);
					$transacao->set('link_pgto', $url);
					$dao = new GenericDAO;
					$dao->updateWithFields($transacao,array('link_pgto'),"id = $id_transacao");
			}
			
			$to = $usuario->get('email');
			$subject = "Inscrição - R Geração";
			$message = "<p>Sua inscrição no R Geração foi realizada.</p>";
			$message .= "<p>Em até 3 dias útis, seu pagamento será computado e você será notificado.</p>";
			$message .= "<p>Com carinho,</p>";
			$message .= "<p>CORDe Geração.</p>";
			
			$additional_headers = "MIME-Version: 1.0\n";
			$additional_headers .= "Content-type: text/html; charset=iso-8859-1\n";
			$additional_headers .= "From:inscricao_encontristas@rgeracao.com.br";
			
			mail($to, $subject, $message, $additional_headers);
			
		}  catch (PagSeguroServiceException $e) {
				die($e->getMessage());
		}
	} else {
		echo "<p>Você possui total isenção.</p>";
		echo "<p>Sua incrição está <strong>CONFIRMADA.</strong>";
		$transacao = $dao->selectAll('Transacao',"id = $id_transacao");
		$transacao->set('status',1);
        $transacao->Set('link_pgto', APP_URL);
		
		$dao = new GenericDAO;
		
		$result = $dao->updateWithFields($transacao, array('status', 'link_pgto'), "id = $id_transacao");
		
		if (!$result) {
			$to = "administrador@rgeracao.com.br";
			$subject = "Problema na alteração de status.";
			$message = "Problema na alteração do status da Transação id = ".$transacao->get('id');
			
			$additional_headers = "MIME-Version: 1.0\n";
			$additional_headers .= "Content-type: text/html; charset=iso-8859-1\n";
			$additional_headers .= "From:problemas_isentos@rgeracao.com.br";
			
			mail($to, $subject, $message, $additional_headers);
		} else {
			$to = $usuario->get('email');
			$subject = "Inscrição - R Geração";
			$message = "<p>Sua inscrição no R Geração foi realizada.</p>";
			$message .= "<p>Você está isento de qualquer pagamento. Então sua inscrição está confirmada.</p>";
			$message .= "<p>Com carinho,</p>";
			$message .= "<p>CORDe Geração.</p>";
			
			$additional_headers = "MIME-Version: 1.0\n";
			$additional_headers .= "Content-type: text/html; charset=iso-8859-1\n";
			$additional_headers .= "From:inscricao_isentos@rgeração.com.br";
			
			mail($to, $subject, $message, $additional_headers);
			
		}
	}
?>
                </div>

<?php Structure::footer(); ?>
