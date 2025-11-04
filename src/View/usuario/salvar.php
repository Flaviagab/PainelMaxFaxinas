<?php

if ($_POST) {
    $id = $_POST['id'] ?? '';
    $nome = $_POST['nome'] ?? '';
    $cpf = $_POST['cpf'] ?? '';
    $telefone = $_POST['telefone'] ?? '';
    $email = $_POST['email'] ?? '';
    $senha = $_POST['senha'];

    if (!empty($nome)) {
        echo "<script>mensagem('Preencha o nome', '/usuario', 'error');</script>";
    } else if ((empty($id)) && empty($senha)) {
        echo "<script>mensagem('Preencha a senha', '/usuario', 'error');</script>";
    }

    if(!empty($senha)){
        $_POST["senha"] = password_hash($senha, PASSWORD_BCRYPT);
    }



} else {
    echo "<script>mensagem('Erro, requisição inválida', '/usuario', 'error');</script>";
}
