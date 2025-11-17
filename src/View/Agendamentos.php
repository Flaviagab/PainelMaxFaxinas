
    <div class="admin-header text-center mb-4">
      <h1 class="titulo">Lista de Agendamentos</h1>
    </div>
<div class="container bg-white p-4 rounded shadow">
    <div class="d-flex justify-content-center">
      <table class="table responsive table-striped w-100">
        <thead>
          <tr>
            <th class="subtitulo pb-4 w-Id" scope="col">Id</th>
            <th class="subtitulo pb-4 w-Data"scope="col">Data</th>
            <th class="subtitulo pb-4 w-Status"scope="col">Status</th>
            <th class="subtitulo pb-4 w-15"scope="col">Cliente</th>
            <th class="subtitulo pb-4 w-15"scope="col">Serviço</th>
            <th class="subtitulo pb-4 w-15"scope="col">Telefone</th>
            <th class="subtitulo pb-4 w-15"scope="col">Alterar Status</th>
          </tr>
        </thead>
        <tbody>
          <?php if (!empty($agendamentos)): ?>
            <?php foreach ($agendamentos as $agendamento): ?>
              <tr>
                <td class="align-middle w-Id"><?= $agendamento->getId() ?></td>
                <td class="align-middle w-10"><?= $agendamento->getData()->format('d/m/Y') ?></td>
                <td class="align-middle w-Status <?= 'status-' . $agendamento->getStatus() ?>">
                  <?= $agendamento->getStatus() ?>
                </td>
                <td class="align-middle w-15"><?= $agendamento->getCliente()->getNome() ?></td>
                <td class="align-middle w-15"><?= $agendamento->getServico()->getTipoDeServico() ?></td>
                <td class="align-middle w-15"><?= $agendamento->getCliente()->getTelefone() ?></td>
                
                <td class="w-15">
                  <form method="POST" action="/mudarStatus" class="d-flex flex-column align-items-start gap-2 w-auto">
                    <input type="hidden" name="id" value="<?= $agendamento->getId() ?>">
                    <select name="status" class="form-select form-select-sm my-2 w-100">
                      <option value="pendente" <?= $agendamento->getStatus()=='pendente'?'selected':'' ?>>Pendente</option>
                      <option value="confirmado" <?= $agendamento->getStatus()=='confirmado'?'selected':'' ?>>Confirmado</option>
                      <option value="concluido" <?= $agendamento->getStatus()=='concluido'?'selected':'' ?>>Concluído</option>
                      <option value="cancelado" <?= $agendamento->getStatus()=='cancelado'?'selected':'' ?>>Cancelado</option>
                    </select>
                    <button type="submit" class="btn btn-sm btn-primary w-100 px-3">Salvar</button>
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

