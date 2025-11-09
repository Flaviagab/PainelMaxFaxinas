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
                <a href="adicional" class="btn">
                    <i class="bi bi-file-earmark"></i> Adicionar
                </a>

                <a href="adicional/listar" class="btn">
                    <i class="bi bi-search"></i> Listar
                </a>
            </div>
        </div>

        <div class="card-body">
            <form name="formCadastro" method="post" action="/adicional/salvar" enctype="multipart/form-data" data-parsley-validate="" class="formAdicional">

                <!-- Primeira linha -->
                <div class="row">
                    <div class="col-12 col-md-1">
                        <label for="id">ID:</label>
                        <input type="text" readonly name="id" id="id" class="form-control" value="<?= $dados?->getId() ?? '' ?>">
                    </div>

                    <div class="col-12 col-md-8">
                        <label for="nome">Nome do Adicional:</label>
                        <input type="text" name="nome" id="nome" class="form-control" required data-parsley-required-message="Preencha o nome" value="<?= $dados?->getNome() ?? '' ?>">
                    </div>

                    <div class="col-12 col-md-3">
                        <label for="servico_id">Serviço:</label>
                        <select name="servico_id" id="servico_id" required class="form-control" data-parsley-required-message="Selecione um serviço">
                            <option value="">Selecione um serviço</option>
                            <?php foreach ($servicos as $servico): ?>
                                <option value="<?= $servico->getId(); ?>" <?= ($dados && $dados->getServico() && $dados->getServico()->getId() === $servico->getId()) ? 'selected' : '' ?>>
                                    <?= $servico->getTipoDeServico(); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="row mt-4">

                    <div class="col-12 col-md-6">
                        <label for="preco">Preço:</label>
                        <input type="text" name="preco" id="preco" required data-parsley-required-message="Preencha o preço do adicional" class="form-control preco" value="<?= $dados?->getPreco() ?? '' ?>">
                    </div>

                    

                    
                     <div class="col-12 col-md-6">
                        <label for="imagem">Imagem (jpg/png):</label>
                        <input type="file" name="imagem" id="imagem" class="form-control" accept="image/*"
                               <?= empty($id) ? 'required data-parsley-required-message="Envie uma imagem"' : '' ?>>
                    </div>

                    <div class="row mt-4" >
                        <div class="col-12">
                            <label for="descricao">Descrição do Adicional:</label>
                            <textarea name="descricao" id="descricao" class="form-control" rows="4" required data-parsley-required-message="Preencha a descrição do adicional" value="<?= $dados?->getDescricao() ?? '' ?>"></textarea>
                        </div>
                    </div>

                </div>

                <!-- Botão -->
                <div class="text-center text-lg-end mt-4">
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
    $('.preco').mask('000.000.000.000.000,00', {reverse: true});
    });
</script>