<?php
use App\Core\Database;
use App\Model\Endereco;
use App\Model\Cliente;
use App\Model\Cidade;

$entityManager = Database::getEntityManager();

try {
    $id = $_POST['id'] ?? null;
    $rua = $_POST['rua'] ?? null;
    $numero = $_POST['numero'] ?? null;
    $bairro = $_POST['bairro'] ?? null;
    $idCliente = $_POST['cliente'] ?? null;
    $idCidade = $_POST['cidade'] ?? null;

    if (!$rua || !$numero || !$bairro || !$idCliente || !$idCidade) {
        echo "<script>mensagem('Preencha todos os campos!', '/endereco', 'error');</script>";
        exit;
    }

    $repoCliente = $entityManager->getRepository(Cliente::class);
    $repoCidade = $entityManager->getRepository(Cidade::class);

    $cliente = $repoCliente->find($idCliente);
    $cidade = $repoCidade->find($idCidade);

    if (!$cliente || !$cidade) {
        echo "<script>mensagem('Dados de relacionamento inválidos.', '/endereco', 'error');</script>";
        exit;
    }

    if (!empty($id)) {
        $endereco = $entityManager->find(Endereco::class, $id);

        if (!$endereco) {
            echo "<script>mensagem('Endereço não encontrado!', '/endereco/listar', 'error');</script>";
            exit;
        }

        $endereco->setRua($rua);
        $endereco->setNumero((int)$numero);
        $endereco->setBairro($bairro);
        $endereco->setCliente($cliente);
        $endereco->setCidade($cidade);
    } else {
        $endereco = new Endereco($rua, (int)$numero, $bairro, $cliente, $cidade);
    }

    $entityManager->persist($endereco);
    $entityManager->flush();

    echo "<script>mensagem('Endereço salvo com sucesso!', '/endereco', 'success');</script>";
} catch (Exception $e) {
    echo "<script>mensagem('Erro ao salvar', '/endereco', 'error');</script>";
}
