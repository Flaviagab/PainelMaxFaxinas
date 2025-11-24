<?php

namespace App\Controller;

use App\Core\Database;
use App\Model\Endereco;
use Doctrine\ORM\EntityManager;

class EnderecoController
{
    private EntityManager $entityManager;
    private $enderecoRepository;

    public function __construct()
    {
        $this->entityManager = Database::getEntityManager();
        $this->enderecoRepository = $this->entityManager->getRepository(Endereco::class);
    }

    public function index($id = null)
    {
        $dados = null;

        if (!empty($id)) {
            $dados = $this->enderecoRepository->find($id);
        }

        require __DIR__ . "/../View/endereco/index.php";
    }

    public function listar()
    {
        $enderecos = $this->enderecoRepository->findAll();
        require __DIR__ . "/../View/endereco/listar.php";
    }

    public function salvar()
    {
        require __DIR__ . "/../View/endereco/salvar.php";
    }

    public function excluir($id = null){
        require __DIR__ . "/../View/endereco/excluir.php";
    }
}
