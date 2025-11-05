<?php

use App\Model\Cliente;
use App\Core\Database;

if ($_POST) {
    $id = $_POST['id'] ?? '';
    $nome = $_POST['nome'] ?? '';
    $cpf = $_POST['cpf'] ?? '';
    $telefone = $_POST['telefone'] ?? '';
    $email = $_POST['email'] ?? '';
    $senha = $_POST['senha'] ?? '';

    if (empty($nome)) {
        echo "<script>mensagem('Preencha o nome', '/cliente', 'error');</script>";
        exit;
    } else if (empty($id) && empty($senha)) {
        echo "<script>mensagem('Preencha a senha', '/cliente', 'error');</script>";
        exit;
    }

    $em = Database::getEntityManager();

    if (empty($id)) {
        $cliente = new Cliente($cpf, $nome, $email, $telefone, $senha);
        $em->persist($cliente);
    } else {
        $cliente = $em->find(Cliente::class, $id);

        if (!$cliente) {
            echo "<script>mensagem('Cliente não encontrado', '/cliente', 'error');</script>";
            exit;
        }

        $cliente->setCpf($cpf);
        $cliente->setNome($nome);
        $cliente->setEmail($email);
        $cliente->setTelefone($telefone);

        if (!empty($senha)) {
            $cliente->setSenha($senha);
        }
    }

    try {
        $em->flush();
        echo "<script>mensagem('Registro salvo com sucesso', '/cliente', 'success');</script>";
    } catch (Exception $e) {
        echo "<script>mensagem('Erro ao salvar', '/cliente', 'error');</script>";
    }

} else {
    echo "<script>mensagem('Erro, requisição inválida', '/cliente', 'error');</script>";
}
