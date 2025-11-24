<?php
use App\Core\Database;
use App\Model\Servico;

$entityManager = Database::getEntityManager();

$id = $id ?? null;

if (!$id) {
    echo "<script>mensagem('ID inválido para exclusão', '/servico/listar', 'error');</script>";
    exit;
}

try {
    $servico = $entityManager->getRepository(Servico::class)->find($id);

    if ($servico) {
        $entityManager->remove($servico);
        $entityManager->flush();

        echo "<script>mensagem('Serviço excluído com sucesso!', '/servico/listar', 'success');</script>";
    } else {
        echo "<script>mensagem('Serviço não encontrado', '/servico/listar', 'error');</script>";
    }

} catch (Exception $e) {
    echo "<script>mensagem('Erro ao excluir', '/servico/listar', 'error');</script>";
}
