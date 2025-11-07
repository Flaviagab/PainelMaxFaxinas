<div class="container">
    <div class="card">
        <div class="card-header">
            <div class="float-start">
                <h2>Listagem de Serviços</h2>
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
        <div class="card-body table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Imagem</th>
                        <th>Nome do Serviço</th>
                        <th>Preço</th>
                        <th class="col-opcoes">Opções</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($servicos as $servico) {
                    ?>
                        <tr>
                            <td><?= $servico->getId() ?></td>
                             <td>
                                <img src="/<?= $servico->getImagem() ?>" class="img-servico">
                            </td>
                            <td><?= $servico->getTipoDeServico() ?></td>
                            <td>R$ <?= number_format($servico->getPreco(), 2, ',', '.')?></td>
                            <td class="col-opcoes">
                                <a href="/servico/index/<?= $servico->getId() ?>" class="btn" title="Editar">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <a onclick="confirmarExclusao('/servico/excluir/<?= $servico->getId() ?>')" class="btn" title="Excluir">
                                    <i class="bi bi-trash"></i>
                                </a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>