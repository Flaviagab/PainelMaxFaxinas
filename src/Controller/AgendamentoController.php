<?php

namespace App\Controller;

use App\Model\Agendamento;
use App\Core\Database;

class AgendamentoController
{
    public function index($id = null)
    {
        $entityManager = Database::getEntityManager();

        if (!empty($id)) {

            $agendamentos = [$entityManager->getRepository(Agendamento::class)->find($id)];
        } else {

            $agendamentos = $entityManager->getRepository(Agendamento::class)->findAll();
        }

        if (!$agendamentos) {
            $agendamentos = [];
        }

        require __DIR__ . "/../View/agendamento/index.php";
    }

    public function mudarStatus(): void
    {
        require __DIR__ . "/../View/agendamento/mudarStatus.php";
    }
}
