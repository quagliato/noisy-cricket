<?php

class Payment {
    
    function pay($usuario_id, $transacao_id, $payment) {
        $pagamento = NULL;
        switch ($payment) {
            case "BOL": $pagamento = payWithBoleto($usuario_id, $transacao_id); break;
            case "PPL": $pagamento = payWithPayPal($usuario_id, $transacao_id); break;
            case "PSG": $pagamento = payWithPagSeguro($usuario_id, $transacao_id); break;
        }

        return $pagamento;
    }

    function payWithBoleto($usuario_id, $trasacao_id) {
    }

    function payWithPayPal($usuario_id, $trasacao_id) {
    }

    function payWithPagSeguro($usuario_id, $trasacao_id) {
    }

}
