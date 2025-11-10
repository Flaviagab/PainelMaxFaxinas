<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <div class="float-start">
                <h2>Listagem de Endereços</h2>
            </div>
            <div class="float-end">
                <a href="/endereco" title="Novo" class="btn">
                    <i class="bi bi-file-earmark"></i> Novo Registro
                </a>
                <a href="/endereco/listar" title="Listar" class="btn">
                    <i class="bi bi-search"></i> Listar
                </a>
            </div>
        </div>
        <div class="card-body table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Cliente</th>
                        <th>Rua</th>
                        <th>Número</th>
                        <th class="col-opcoes">Opções</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($enderecos as $endereco) {
                    ?>
                        <tr>
                            <td><?= $endereco->getCliente()->getNome() ?></td>
                            <td><?= $endereco->getRua() ?></td>
                            <td><?= $endereco->getNumero() ?></td>
                            <td class="col-opcoes">
                                <a href="/endereco/index/<?= $endereco->getId() ?>" class="btn" title="Editar">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <a onclick="confirmarExclusao('/endereco/excluir/<?= $endereco->getId() ?>')" class="btn" title="Excluir">
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