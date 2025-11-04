<?php

use App\Model\Servico;

// Busca todos os serviços
$servicos = Servico::findAll();
?>

<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <div class="float-start">
                <h2>Cadastro de Adicionais</h2>
            </div>
            <div class="float-end">
                <a href="servico" class="btn">
                    <i class="bi bi-file-earmark"></i> Adicionar
                </a>

                <a href="adicional/listar" class="btn">
                    <i class="bi bi-search"></i> Listar
                </a>
            </div>
        </div>
        <div class="card-body">
            <form name="formCadastro" method="post" action="adicional/salvar" enctype="multipart/form-data" data-parsley-validate="" class="formAdicional">
                <div class="row">
                    <div class="col-12 col-md-1">
                        <label for="id">ID:</label>
                        <input type="text" readonly name="id" id="id" class="form-control">
                    </div>
                    <div class="col-12 col-md-8">
                        <label for="nome">Nome do Adicional:</label>
                        <input type="text" name="nome" id="nome" class="form-control" required data-parsley-required-message="Digite o nome">
                    </div>
                  <div class="col-12 col-md-3">
                        <label for="servico_id">Serviço:</label>
                        <select name="servico_id" id="servico_id" required class="form-control" data-parsley-required-message="Selecione um serviço">
                            <option value="">Selecione um serviço</option>
                            <?php foreach ($servicos as $servico): ?>
                                <option value="<?= $servico->getId(); ?>">
                                    <?= $servico->getTipoDeServico(); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-12 col-md-6">
                        <label for="preco">Preço:</label>
                        <input type="text" name="preco" id="preco" class="form-control">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>