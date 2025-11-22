<?php
use App\Core\Database;
use App\Model\Agendamento;

    $id = $_POST['id'] ?? null;
    $novoStatus = $_POST['status_pagamento'] ?? null;

    if (!$id || !$novoStatus) {
        header("Location: /agendamento");
        exit;
    }

    $em = Database::getEntityManager();
    $agendamento = $em->find(Agendamento::class, $id);

    if (!$agendamento) {
        header("Location: /agendamento");
        exit;
    }

    // pega a forma de pagamento vinculada
    $formaPagamento = $agendamento->getFormaPagamento();

    if ($formaPagamento) {
        $formaPagamento->setStatus($novoStatus);

        $em->persist($formaPagamento);
        $em->flush();
    }

    echo "<script>mensagem('Status de pagamento atualizado com sucesso', '/agendamento', 'success');</script>";  
?>