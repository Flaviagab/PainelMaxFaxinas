<?php
use App\Core\Database;
use App\Model\Cliente;

$entityManager = Database::getEntityManager();

$id = $id ?? null;

if (!$id) {
    echo "<script>mensagem('ID inválido para exclusão', '/cliente/listar', 'error');</script>";
    exit;
}

try {
    $cliente = $entityManager->getRepository(Cliente::class)->find($id);

    if ($cliente) {
        $entityManager->remove($cliente);
        $entityManager->flush();

        echo "<script>mensagem('Cliente excluído com sucesso!', '/cliente/listar', 'ok');</script>";
    } else {
        echo "<script>mensagem('Cliente não encontrado', '/cliente/listar', 'error');</script>";
    }

} catch (Exception $e) {
    echo "<script>mensagem('Erro ao excluir', '/cliente/listar', 'error');</script>";
}