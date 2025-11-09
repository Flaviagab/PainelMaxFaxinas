<?php
namespace App\Controller;

use App\Model\Administrador;
use App\Model\Agendamento;
use App\Core\Database;
use Doctrine\ORM\EntityManager;

class AgendamentoController {
    public function index($id = null) {
        $dados = null;

        if (!empty($id)) {
            $entityManager = Database::getEntityManager();
            $agendamentoRepository = $entityManager->getRepository(Agendamento::class);
            $dados = $agendamentoRepository->find($id);
        }

        require __DIR__ . "/../View/Agendamentos.php";
    }
}

?>