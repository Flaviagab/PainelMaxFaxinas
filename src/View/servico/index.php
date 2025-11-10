<?php
$id = $dados?->getId() ?? null;
$tipoDeServico = $dados?->getTipoDeServico() ?? '';
$preco = $dados?->getPreco() ?? '';
$descricao = $dados?->getDescricao() ?? '';
$imagem = $dados?->getImagem() ?? null;
?>

<div class="container">
    <div class="card">
        <div class="card-header">
            <div class="float-start">
                <h2>Cadastro de Serviços</h2>
            </div>
            <div class="float-end">
                <a href="/servico" title="Novo" class="btn">
                    <i class="bi bi-file-earmark"></i> Novo Registro
                </a>
                <a href="/servico/listar" title="Listar" class="btn">
                    <i class="bi bi-search"></i> Listar
                </a>
            </div>
        </div>

        <div class="card-body">
            <form action="/servico/salvar" method="post" enctype="multipart/form-data" data-parsley-validate>

                <div class="row">
                    <div class="col-12 col-md-1">
                        <label for="id">ID:</label>
                        <input type="text" name="id" id="id" class="form-control" readonly value="<?= $id ?>">
                    </div>

                    <div class="col-12 col-md-11">
                        <label for="tipoDeServico">Nome do Serviço:</label>
                        <input type="text" name="tipoDeServico" id="tipoDeServico" class="form-control"
                               value="<?= $tipoDeServico ?>"
                               required data-parsley-required-message="Preencha o nome do serviço">
                    </div>
                </div>

                <br>

                <div class="row">
                    <div class="col-12 col-md-6">
                        <label for="preco">Preço:</label>
                        <input type="text" name="preco" id="preco" class="form-control preco"
                               value="<?= $preco ?>"
                               required data-parsley-required-message="Preencha o preço">
                    </div>

                    <div class="col-12 col-md-6">
                        <label for="imagem">Imagem (jpg/png):</label>
                        <input type="file" name="imagem" id="imagem" class="form-control" accept="image/*"
                               <?= empty($id) ? 'required data-parsley-required-message="Envie uma imagem"' : '' ?>>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-12">
                        <label for="descricao">Descrição do Serviço:</label>
                        <textarea name="descricao" id="descricao" class="form-control" rows="4"
                                  required data-parsley-required-message="Preencha a descrição"><?= $descricao ?></textarea>
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
    $('.preco').mask('000.000.000.000.000,00', {reverse: true});
    });
</script>