<?php
use App\Core\Database;
use App\Model\Endereco;

$entityManager = Database::getEntityManager();

$id = $id ?? null;

if (!$id) {
    echo "<script>mensagem('ID inválido para exclusão', '/endereco/listar', 'error');</script>";
    exit;
}

try {
    $endereco = $entityManager->getRepository(Endereco::class)->find($id);

    if ($endereco) {
        $entityManager->remove($endereco);
        $entityManager->flush();

        echo "<script>mensagem('Endereço excluído com sucesso!', '/endereco/listar', 'success');</script>";
    } else {
        echo "<script>mensagem('Endereco não encontrado', '/endereco/listar', 'error');</script>";
    }

} catch (Exception $e) {
    echo "<script>mensagem('Erro ao excluir', '/endereco/listar', 'error');</script>";
}