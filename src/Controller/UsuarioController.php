<?php
namespace App\Controller;

use App\Core\Database;
use App\Model\Usuario;
use Doctrine\ORM\EntityManager;

class UsuarioController{

    private EntityManager $entityManager;
    private $usuarioRepository;

    public function __construct()
    {
        $this->entityManager = Database::getEntityManager();

        $this->usuarioRepository = $this->entityManager->getRepository(Usuario::class);
    }

      public function index($id){

         require __DIR__ . "/../View/usuario/index.php";

    }

    public function salvar(){
        require __DIR__ . "/../View/usuario/salvar.php";
    }

}