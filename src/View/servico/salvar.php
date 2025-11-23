<?php

use App\Core\Database;
use App\Model\Servico;

require_once __DIR__ . "/../../../vendor/autoload.php";

$entityManager = Database::getEntityManager();

try {
    $id = $_POST['id'] ?? null;
    $tipoDeServico = $_POST['tipoDeServico'] ?? "";
    $preco = $_POST['preco'] ?? "";
    $descricao = $_POST['descricao'] ?? "";

    $preco = str_replace('.', '', $preco);
    $preco = str_replace(',', '.', $preco);

    $imagemFinal = null;

    // Se for edição, busca o serviço e guarda imagem atual
    if (!empty($id)) {
        $servico = $entityManager->find(Servico::class, $id);

        if (!$servico) {
            echo "<script>mensagem('Serviço não encontrado', '/servico', 'error');</script>";
            exit;
        }

        $imagemAtual = $servico->getImagem();
    } else {
        
        $servico = new Servico("", 0, "", "");
        $imagemAtual = null;
    }

    if (!empty($_FILES['imagem']['name'])) {
        $arquivoTemp = $_FILES['imagem']['tmp_name'];
        $nomeOriginal = basename($_FILES['imagem']['name']);
        $nomeNovo = uniqid() . "-" . $nomeOriginal;

        $caminhoFinal = "arquivos/" . $nomeNovo;
        $destino = __DIR__ . "/../../../public/" . $caminhoFinal;

        if (!move_uploaded_file($arquivoTemp, $destino)) {
            echo "<script>mensagem('Erro ao fazer upload', '/servico', 'error');</script>";
            exit;
        }

        $imagemFinal = $caminhoFinal;
    } else {
        $imagemFinal = $imagemAtual;
    }

    $servico->setTipoDeServico($tipoDeServico);
    $servico->setPreco((float)$preco);
    $servico->setDescricao($descricao);
    $servico->setImagem($imagemFinal); 

    $entityManager->persist($servico);
    $entityManager->flush();

    echo "<script>mensagem('Serviço salvo com sucesso!', '/servico', 'success');</script>";

}catch (Exception $e) {
    echo "<script>mensagem('Erro ao salvar', '/servico', 'error');</script>";
}