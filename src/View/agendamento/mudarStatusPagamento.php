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

// pega o pagamento vinculado
$pagamento = $agendamento->getPagamento();

if ($pagamento) {
    $pagamento->setStatus($novoStatus);

    $em->persist($pagamento);
    $em->flush();
}

echo "<script>mensagem('Status de pagamento atualizado com sucesso', '/agendamento', 'success');</script>";
