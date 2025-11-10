<?php

use App\Model\Adicional;
use App\Core\Database;

if ($_POST) {
    $id = $_POST['id'] ?? '';
    $nome = $_POST['nome'] ?? '';
    $preco = $_POST['preco'] ?? '';
    $descricao = $_POST['descricao'] ?? '';
    $servico_id = $_POST['servico_id'] ?? '';

    $preco = str_replace('.', '', $preco);
    $preco = str_replace(',', '.', $preco);

    if (empty($nome)) {
        echo "<script>mensagem('Preencha o nome do adicional', '/adicional', 'error');</script>";
        exit;
    }

    $em = Database::getEntityManager();

    $servico = $em->find(\App\Model\Servico::class, $servico_id);
    if (!$servico) {
        echo "<script>mensagem('Serviço não encontrado', '/adicional', 'error');</script>";
        exit;
    }

    if (empty($id)) {
        $adicional = new Adicional($nome, (float)$preco, $descricao, $servico);
        $em->persist($adicional);
    } else {
        $adicional = $em->find(Adicional::class, $id);

        if (!$adicional) {
            echo "<script>mensagem('Adicional não encontrado', '/adicional', 'error');</script>";
            exit;
        }

        $adicional->setNome($nome);
        $adicional->setPreco((float)$preco);
        $adicional->setDescricao($descricao);
        $adicional->setServico($servico);
    }

    try {
        $em->flush();
        echo "<script>mensagem('Registro salvo com sucesso', '/adicional', 'success');</script>";
    } catch (Exception $e) {
        echo "<script>mensagem('Erro ao salvar', '/adicional', 'error');</script>";
    }
} else {
    echo "<script>mensagem('Erro, requisição inválida', '/adicional', 'error');</script>";
}
