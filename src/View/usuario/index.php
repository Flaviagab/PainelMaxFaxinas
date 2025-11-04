<?php
if (!empty($id)) {
    $dados = $this->usuario->editar($id);
}

$id = $dados->id ?? null;
$cpf = $dados->cpf ?? null;
$nome = $dados->nome ?? null;
$telefone = $dados->telefone ?? null;
$email = $dados->email ?? null;
$senha = $dados->senha ?? null;
?>

<div class="container">
    <div class="card">
        <div class="card-header">
            <div class="float-start">
                <h2>Cadastro de Usuários</h2>
            </div>
            <div class="float-end">
                <a href="" title="Novo" class="btn">
                    <i class="bi bi-file-earmark"></i> NOvo Registro
                </a>
                <a href="" title="Listar" class="btn">
                    <i class="bi bi-search"></i> Listar
                </a>
            </div>
        </div>
        <div class="card-body">
            <form action="usuario/salvar" name="formUsuario" method="post" data-parsley-validate="">
                <div class="row">
                    <div class="col-12 col-md-1">
                        <label for="id">ID:</label>
                        <input type="text" name="id" id="id" class="form-control" readonly value="<?= $id ?>">
                    </div>
                    <div class="col-12 col-md-11">
                        <label for="nome">Nome do Usuário</label>
                        <input type="text" name="nome" id="nome" class="form-control" value="<?= $nome ?>" required data-parsley-required-message="Preencha o nome">
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-12 col-md-6">
                        <label for="cpf">CPF:</label>
                        <input type="text" name="cpf" id="cpf" class="form-control cpf" value="<?= $cpf ?>" required data-parsley-required-message="Preencha o CPF">
                    </div>
                    <div class="col-12 col-md-6">
                        <label for="telefone">Telefone:</label>
                        <input type="text" name="telefone" id="telefone" class="form-control telefone" required data-parsley-required-message="Preencha um telefone" value="<?= $telefone ?>">
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-12 col-md-6">
                        <label for="email">E-mail:</label>
                        <input type="email" name="email" id="email" class="form-control" value="<?= $email ?>" required data-parsley-required-message="Preencha o e-mail" data-parsley-type-message="Digite um email válido">
                    </div>
                    <div class="col-12 col-md-6">
                        <label for="senha">Senha:</label>
                        <input type="password" name="senha" id="senha" class="form-control" required data-parsley-required-message="Preencha a senha" data-parsley-minlength="6" data-parsley-minlength-message="A senha deve ter pelo menos 6 caracteres">
                    </div>
                </div>
                <br>
                <div class="text-center text-lg-end">
                    <button type="submit" class="btn btnUsuario">
                        <i class="bi bi-check-lg"></i> Salvar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('.telefone').mask('(00) 00000-0000');
        $('.cpf').mask('000.000.000-00');
    });
</script>