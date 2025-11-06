<?php

namespace App\Controller;

use App\Core\Database;
use App\Model\Cliente;
use Doctrine\ORM\EntityManager;

class ClienteController
{

    private EntityManager $entityManager;
    private $clienteRepository;

    public function __construct()
    {
        $this->entityManager = Database::getEntityManager();

        $this->clienteRepository = $this->entityManager->getRepository(Cliente::class);
    }

    public function index($id)
    {
        $dados = null;

        if (!empty($id)) {
            $dados = $this->clienteRepository->find($id);
        }

        require __DIR__ . "/../View/cliente/index.php";
    }

    public function salvar()
    {
        require __DIR__ . "/../View/cliente/salvar.php";
    }

    public function listar()
    {
        $clientes = $this->clienteRepository->findBy([], ['nome' => 'ASC']);
        require __DIR__ . "/../View/cliente/listar.php";
    }

    public function excluir($id = null)
    {
        require __DIR__ . "/../View/cliente/excluir.php";
    }
}
