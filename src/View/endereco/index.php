<?php
use App\Core\Database;
use App\Model\Cliente;
use App\Model\Cidade;
use App\Model\Estado;
use App\Model\Pais;

$id = $dados?->getId() ?? null;
$rua = $dados?->getRua() ?? '';
$numero = $dados?->getNumero() ?? '';
$bairro = $dados?->getBairro() ?? '';
$clienteSelecionado = $dados?->getCliente()?->getId() ?? '';
$cidadeSelecionada = $dados?->getCidade()?->getId() ?? '';
$estadoSelecionado = $dados?->getCidade()?->getEstado()?->getId() ?? '';
$paisSelecionado = $dados?->getCidade()?->getEstado()?->getPais()?->getId() ?? '';

$em = Database::getEntityManager();
$clientes = $em->getRepository(Cliente::class)->findAll();
$cidades = $em->getRepository(Cidade::class)->findAll();
$estados = $em->getRepository(Estado::class)->findAll();
$paises = $em->getRepository(Pais::class)->findAll();
?>

<div class="container mt-4">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center flex-wrap gap-2">
            <div class="float-start">
                <h2>Cadastro de Endereços</h2>
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

        <div class="card-body">
            <form action="/endereco/salvar" method="post" data-parsley-validate>
                <div class="row g-3 mt-2">
                    <div class="col-12 col-md-1">
                        <label for="id">ID:</label>
                        <input type="text" name="id" id="id" class="form-control" readonly value="<?= $id ?>">
                    </div>
                    <div class="col-12 col-md-7">
                        <label for="rua">Rua:</label>
                        <input type="text" name="rua" id="rua" class="form-control" required
                               data-parsley-required-message="Preencha a rua" value="<?= $rua ?>">
                    </div>
                    <div class="col-12 col-md-2">
                        <label for="numero">Número:</label>
                        <input type="number" name="numero" id="numero" class="form-control" required
                               data-parsley-required-message="Preencha o número" value="<?= $numero ?>">
                    </div>
                    <div class="col-12 col-md-2">
                        <label for="bairro">Bairro:</label>
                        <input type="text" name="bairro" id="bairro" class="form-control" required
                               data-parsley-required-message="Preencha o bairro" value="<?= $bairro ?>">
                    </div>
                </div>

                
                <div class="row g-3 mt-2">
                    <div class="col-12 col-md-6">
                        <label for="cliente">Cliente:</label>
                        <select name="cliente" id="cliente" class="form-control" required
                                data-parsley-required-message="Selecione o cliente">
                            <option value="">Selecione</option>
                            <?php foreach ($clientes as $c): ?>
                                <option value="<?= $c->getId() ?>" <?= ($c->getId() == $clienteSelecionado ? 'selected' : '') ?>>
                                    <?= $c->getNome() ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="col-12 col-md-6">
                        <label for="pais">País:</label>
                        <select name="pais" id="pais" class="form-control" required
                                data-parsley-required-message="Selecione o país">
                            <option value="">Selecione</option>
                            <?php foreach ($paises as $p): ?>
                                <option value="<?= $p->getId() ?>" <?= ($p->getId() == $paisSelecionado ? 'selected' : '') ?>>
                                    <?= $p->getNome() ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                

                <div class="row g-3 mt-2">
                    <div class="col-12 col-md-6">
                        <label for="estado">Estado:</label>
                        <select name="estado" id="estado" class="form-control" required
                                data-parsley-required-message="Selecione o estado">
                            <option value="">Selecione</option>
                            <?php foreach ($estados as $e): ?>
                                <option value="<?= $e->getId() ?>" <?= ($e->getId() == $estadoSelecionado ? 'selected' : '') ?>>
                                    <?= $e->getNome() ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="col-12 col-md-6">
                        <label for="cidade">Cidade:</label>
                        <select name="cidade" id="cidade" class="form-control" required
                                data-parsley-required-message="Selecione a cidade">
                            <option value="">Selecione</option>
                            <?php foreach ($cidades as $cid): ?>
                                <option value="<?= $cid->getId() ?>" <?= ($cid->getId() == $cidadeSelecionada ? 'selected' : '') ?>>
                                    <?= $cid->getNome() ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
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
