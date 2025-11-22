<?php
$id = $dados?->getId() ?? null;
$cpf = $dados?->getCpf() ?? null;
$nome = $dados?->getNome() ?? null;
$telefone = $dados?->getTelefone() ?? null;
$email = $dados?->getEmail() ?? null;
$senha = "";
?>

<div class="container mt-4">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center flex-wrap gap-2">
            <div class="float-start">
                <h2>Cadastro de Clientes</h2>
            </div>
            <div class="float-end">
                <a href="/cliente" title="Novo" class="btn">
                    <i class="bi bi-file-earmark"></i> Novo Registro
                </a>
                <a href="/cliente/listar" title="Listar" class="btn">
                    <i class="bi bi-search"></i> Listar
                </a>
            </div>
        </div>
        <div class="card-body">
            <form action="/cliente/salvar" name="formUsuario" method="post" data-parsley-validate="">
                <div class="row g-3 mt-2">
                    <div class="col-12 col-md-1">
                        <label for="id">ID:</label>
                        <input type="text" name="id" id="id" class="form-control" readonly value="<?= $dados?->getId() ?? '' ?>">
                    </div>
                    <div class="col-12 col-md-11">
                        <label for="nome">Nome do Cliente</label>
                        <input type="text" name="nome" id="nome" class="form-control" value="<?= $dados?->getNome() ?? '' ?>" required data-parsley-required-message="Preencha o nome">
                    </div>
                </div>
                
                <div class="row g-3 mt-2">
                    <div class="col-12 col-md-6">
                        <label for="cpf">CPF:</label>
                        <input type="text" name="cpf" id="cpf" class="form-control cpf" value="<?= $dados?->getCpf() ?? '' ?>" required data-parsley-required-message="Preencha o CPF">
                    </div>
                    <div class="col-12 col-md-6">
                        <label for="telefone">Telefone:</label>
                        <input type="text" name="telefone" id="telefone" class="form-control telefone" required data-parsley-required-message="Preencha um telefone" value="<?= $dados?->getTelefone() ?? '' ?>">
                    </div>
                </div>
                
                <div class="row g-3 mt-2">
                    <div class="col-12 col-md-6">
                        <label for="email">E-mail:</label>
                        <input type="email" name="email" id="email" class="form-control" value="<?= $dados?->getEmail() ?? '' ?>" required data-parsley-required-message="Preencha o e-mail" data-parsley-type-message="Digite um email válido">
                    </div>
                    <div class="col-12 col-md-6">
                        <label for="senha">Senha:</label>
                        <input type="password" name="senha" id="senha" class="form-control" value="" <?= empty($dados?->getId()) ? 'required data-parsley-required-message="Preencha a senha"' : '' ?>
                            data-parsley-minlength="6"
                            data-parsley-minlength-message="A senha deve ter pelo menos 6 caracteres">
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