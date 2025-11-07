<?php
use App\Core\Database;
use App\Model\Adicional;

$entityManager = Database::getEntityManager();

$id = $id ?? null;


if (!$id) {
    echo "<script>mensagem('ID inválido para exclusão', '/adicional/listar', 'error');</script>";
    exit;
}

try {
    $adicional = $entityManager->getRepository(Adicional::class)->find($id);

    if ($adicional) {
        $entityManager->remove($adicional);
        $entityManager->flush();

        echo "<script>mensagem('Adicional excluído com sucesso!', '/adicional/listar', 'ok');</script>";
    } else {
        echo "<script>mensagem('Adicional não encontrado', '/adicional/listar', 'error');</script>";
    }

} catch (Exception $e) {
    echo "<script>mensagem('Erro ao excluir', '/adicional/listar', 'error');</script>";
}
