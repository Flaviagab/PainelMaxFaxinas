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

    $nome = trim($nome);

    if (strlen($nome) < 3) {
        echo "<script>mensagem('O nome deve ter pelo menos 3 letras', '/cliente', 'error');</script>";
        exit;
    }

    if (!preg_match('/^[A-Za-zÀ-ÖØ-öø-ÿ ]+$/', $nome)) {
        echo "<script>mensagem('O nome deve conter apenas letras e espaços', '/cliente', 'error');</script>";
        exit;
    }

    if (empty($nome)) {
        echo "<script>mensagem('Preencha o nome', '/cliente', 'error');</script>";
        exit;
    } else if (empty($id) && empty($senha)) {
        echo "<script>mensagem('Preencha a senha', '/cliente', 'error');</script>";
        exit;
    }

    $cpf = preg_replace('/\D/', '', $cpf);

    if (strlen($cpf) !== 11) {
        echo "<script>mensagem('O CPF deve ter 11 números', '/cliente', 'error');</script>";
        exit;
    }

    $telefone = preg_replace('/\D/', '', $telefone);

    if (strlen($telefone) !== 10 && strlen($telefone) !== 11) {
        echo "<script>mensagem('O telefone deve ter 10 ou 11 números', '/cliente', 'error');</script>";
        exit;
    }

    if (strlen($telefone) == 10) {
        // fixo
        $telefone = preg_replace('/(\d{2})(\d{4})(\d{4})/', '($1) $2-$3', $telefone);
    } else {
        // celular
        $telefone = preg_replace('/(\d{2})(\d{1})(\d{4})(\d{4})/', '($1) $2$3-$4', $telefone);
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
        echo "<script>mensagem('Erro ao salvar'{$e->getMessage()}, '/cliente', 'error');</script>";
    }
} else {
    echo "<script>mensagem('Erro, requisição inválida', '/cliente', 'error');</script>";
}
