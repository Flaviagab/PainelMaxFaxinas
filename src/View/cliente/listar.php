<div class="container">
    <div class="card">
        <div class="card-header">
            <div class="float-start">
                <h2>Listagem de Clientes</h2>
            </div>
            <div class="float-end">
                <a href="/cliente" title="Novo" class="btn">
                    <i class="bi bi-file-earmark"></i> NOvo Registro
                </a>
                <a href="/cliente/listar" title="Listar" class="btn">
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
                        <th>Telefone</th>
                        <th>Opções</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach ($clientes as $dados){
                            ?>
                                <tr>
                                    <td><?=$dados->getId()?></td>
                                    <td><?=$dados->getNome()?></td>
                                    <td><?=$dados->getTelefone()?></td>
                                </tr>
                            <?php
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>