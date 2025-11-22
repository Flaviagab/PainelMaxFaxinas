<div class=" text-center mb-4">
  <h1 class="titulo">Lista de Agendamentos</h1>
</div>
<div class="container bg-white p-4 rounded shadow">
  <div class="table-responsive">
    <table class="table table-striped table-bordered">
      <thead>
        <tr>
          <th class="pb-4" scope="col">Id</th>
          <th class="pb-4" scope="col">Data</th>
          <th class="pb-4" scope="col">Status</th>
          <th class="pb-4" scope="col">Cliente</th>
          <th class="pb-4" scope="col">Serviço</th>
          <th class="pb-4" scope="col">Telefone</th>
          <th class="pb-4" scope="col">Alterar Status Pagamento</th>
          <th class="pb-4" scope="col">Alterar Status Data</th>
        </tr>
      </thead>
      <tbody>
        <?php if (!empty($agendamentos)): ?>
          <?php foreach ($agendamentos as $agendamento): ?>
            <tr>
              <td class="align-middle"><?= $agendamento->getId() ?></td>
              <td class="align-middle"><?= $agendamento->getData()->format('d/m/Y') ?></td>
              <td class="align-middle <?= 'status-' . $agendamento->getStatus() ?>">
                <?= $agendamento->getStatus() ?>
              </td>
              <td class="align-middle"><?= $agendamento->getCliente()->getNome() ?></td>
              <td class="align-middle"><?= $agendamento->getServico()->getTipoDeServico() ?></td>
              <td class="align-middle"><?= $agendamento->getCliente()->getTelefone() ?></td>

              <td>
                <!-- Formulário para status de pagamento -->
                <form method="POST" action="/agendamento/mudarStatusPagamento" class="d-flex flex-column gap-2">
                  <input type="hidden" name="id" value="<?= $agendamento->getId() ?>">
                  <select name="status_pagamento" class="form-select form-select-sm">
                    <option value="pendente" <?= $agendamento->getPagamento()->getStatus() == 'pendente' ? 'selected' : '' ?>>Pendente</option>
                    <option value="pago" <?= $agendamento->getPagamento()->getStatus() == 'pago' ? 'selected' : '' ?>>Pago</option>
                  </select>

                  <button type="submit" class="btn btn-sm">Salvar</button>
                </form>
              </td>

              <td>
                <form method="POST" action="/agendamento/mudarStatus" class="d-flex flex-column gap-2">
                  <input type="hidden" name="id" value="<?= $agendamento->getId() ?>">
                  <select name="status" class="form-select form-select-sm">
                    <option value="pendente" <?= $agendamento->getStatus() == 'pendente' ? 'selected' : '' ?>>Pendente</option>
                    <option value="confirmado" <?= $agendamento->getStatus() == 'confirmado' ? 'selected' : '' ?>>Confirmado</option>
                    <option value="concluido" <?= $agendamento->getStatus() == 'concluido' ? 'selected' : '' ?>>Concluído</option>
                    <option value="cancelado" <?= $agendamento->getStatus() == 'cancelado' ? 'selected' : '' ?>>Cancelado</option>
                  </select>
                  <button type="submit" class="btn btn-sm">Salvar</button>
                </form>
              </td>
            </tr>
          <?php endforeach ?>
        <?php else: ?>
          <td colspan="8" class="text-center">Nenhum agendamento encontrado</td>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
</div>