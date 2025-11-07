<?php
namespace App\Controller;

use App\Core\Database;
use App\Model\Servico;
use App\Model\Adicional;
use Doctrine\ORM\EntityManager;

class AdicionalController
{
    private $entityManager;
    private $adicionalRepository;

    public function __construct()
    {
        $this->entityManager = Database::getEntityManager();
        $this->adicionalRepository = $this->entityManager->getRepository(Adicional::class);
    }
    public function index($id)
    {

        $dados = null;

        if (!empty($id)) {
            $dados = $this->adicionalRepository->find($id);
        }

        $entityManager = Database::getEntityManager();

        $repo = $entityManager->getRepository(Servico::class);

        //$servicos = $repo->findAll();

        require __DIR__ . "/../View/adicional/index.php";
    }

    public function salvar(): void
    {
        require __DIR__ . "/../View/adicional/salvar.php";

    }

    public function excluir($id)
    {
        require __DIR__ . "/../View/adicional/excluir.php";
    }

    public function listar()
    {
        $adicionais = $this->adicionalRepository->findBy([],  ['nome' => 'ASC']);
        require __DIR__ . "/../View/adicional/listar.php";
    }
}