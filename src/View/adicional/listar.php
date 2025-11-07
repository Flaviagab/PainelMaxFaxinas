<?php
$id = $dados?->getId() ?? null;
$nome = $dados?->getNome() ?? null;
$preco = $dados?->getPreco() ?? null;
$descricao = $dados?->getDescricao() ?? null;
$servico = $dados?->getServico() ?? null;
?>

<div class="container">
    <div class="card">
        <div class="card-header">
            <div class="float-start">
                <h2>Listagem de Adicionais</h2>
            </div>
            <div class="float-end">
                <a href="/adicional" title="Novo" class="btn">
                    <i class="bi bi-file-earmark"></i> Novo Registro
                </a>
                <a href="/adicional/listar" title="Listar" class="btn">
                    <i class="bi bi-search"></i> Listar
                </a>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Preço</th>
                        <th>Serviço</th>
                        <th class ="col-opcoes">Opções</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach ($adicionais as $dados) {
                            ?>
                                <tr>
                                    <td><?=$dados->getId()?></td>
                                    <td><?=$dados->getNome()?></td>
                                    <td><?=$dados->getPreco()?></td>
                                    <td><?=$dados->getServico()->getTipoDeServico()?></td>
                                    <td class="col-opcoes">
                                <a href="/adicional/index/<?= $dados->getId() ?>" class="btn" title="Editar">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <a onclick="confirmarExclusao('/adicional/excluir/<?= $dados->getId() ?>')" class="btn" title="Excluir">
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