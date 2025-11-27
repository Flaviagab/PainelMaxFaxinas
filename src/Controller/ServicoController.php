<?php

namespace App\Controller;

use App\Core\Database;
use Doctrine\ORM\EntityManager;
use App\Model\Servico;

class ServicoController
{
    private EntityManager $entityManager;
    private $servicoRepository;

    public function __construct()
    {
        $this->entityManager = Database::getEntityManager();

        $this->servicoRepository = $this->entityManager->getRepository(Servico::class);
    }

    public function index($id)
    {
        $dados = null;

        if (!empty($id)) {
            $dados = $this->servicoRepository->find($id);
        }
        require __DIR__ . "/../View/servico/index.php";
    }

    public function salvar()
    {
        require __DIR__ . "/../View/servico/salvar.php";
    }

    public function listar()
    {
        $servicos = $this->servicoRepository->findAll();
        require __DIR__ . "/../View/servico/listar.php";
    }

    public function excluir($id = null) 
    {
        require __DIR__ . "/../View/servico/excluir.php";
    }
}
