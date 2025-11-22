<div class="container mt-4">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center flex-wrap gap-2">
            <div class="float-start">
                <h2>Listagem de Clientes</h2>
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
        <div class="card-body table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Telefone</th>
                        <th class="col-opcoes">Opções</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($clientes as $cliente) {
                    ?>
                        <tr>
                            <td><?= $cliente->getId() ?></td>
                            <td><?= $cliente->getNome() ?></td>
                            <td><?= $cliente->getTelefone() ?></td>
                            <td class="col-opcoes">
                                <a href="/cliente/index/<?= $cliente->getId() ?>" class="btn" title="Editar">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <a onclick="confirmarExclusao('/cliente/excluir/<?= $cliente->getId() ?>')" class="btn" title="Excluir">
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