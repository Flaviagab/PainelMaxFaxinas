<?php

use App\Core\Database;
use App\Model\Agendamento;

$id = $_POST['id'] ?? null;
$novoStatus = $_POST['status'] ?? null;

if (!$id || !$novoStatus) {
    header("Location: /agendamento");
    exit;
}

$em = Database::getEntityManager();
$agendamento = $em->find(Agendamento::class, $id);

if ($agendamento) {
    $agendamento->setStatus($novoStatus);

    $em->persist($agendamento);
    $em->flush();

    echo "<script>mensagem('Status alterado com sucesso', '/agendamento', 'success');</script>";
}
