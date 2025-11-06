<?php
use App\Core\Database;
use App\Model\Endereco;
use App\Model\Cliente;
use App\Model\Cidade;
use App\Model\Estado;
use App\Model\Pais;

$entityManager = Database::getEntityManager();

try {
    $id = $_POST['id'] ?? null;
    $rua = $_POST['rua'] ?? null;
    $numero = $_POST['numero'] ?? null;
    $bairro = $_POST['bairro'] ?? null;
    $idCliente = $_POST['cliente'] ?? null;
    $idCidade = $_POST['cidade'] ?? null;
    $idEstado = $_POST['estado'] ?? null;
    $idPais = $_POST['pais'] ?? null;

    if (!$rua || !$numero || !$bairro || !$idCliente || !$idCidade || !$idEstado || !$idPais) {
        echo "<script>mensagem('Preencha todos os campos!', '/endereco', 'error');</script>";
        exit;
    }

    $repoCliente = $entityManager->getRepository(Cliente::class);
    $repoCidade = $entityManager->getRepository(Cidade::class);
    $repoEstado = $entityManager->getRepository(Estado::class);
    $repoPais = $entityManager->getRepository(Pais::class);

    $cliente = $repoCliente->find($idCliente);
    $cidade = $repoCidade->find($idCidade);
    $estado = $repoEstado->find($idEstado);
    $pais = $repoPais->find($idPais);

    if (!$cliente || !$cidade || !$estado || !$pais) {
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

    echo "<script>mensagem('Endereço salvo com sucesso!', '/endereco/listar', 'success');</script>";
} catch (Exception $e) {
    echo "<script>mensagem('Erro ao salvar', '/endereco', 'error');</script>";
}
