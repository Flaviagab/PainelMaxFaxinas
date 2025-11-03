<?php
namespace App\Controller;

use App\Model\Administrador;
use App\Core\Database;
use Doctrine\ORM\EntityManager;

class IndexController{

    private EntityManager $entityManager;
    private $administradorRepository;

    public function __construct()
    {
        $this->entityManager = Database::getEntityManager();

        $this->administradorRepository = $this->entityManager->getRepository(Administrador::class);
    }

    public function index(): void
    {
        $page = 'home';
        include __DIR__ . '/../View/index/index.php';
    }

     public function erro(): void
    {
        $page = 'erro';
        include __DIR__ . '/../View/index/erro.php';
    }

    public function verificar($dados)
    {
        $email = $dados["email"] ?? null;
        $senha = $dados["senha"] ?? null;

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "<script>mensagem('Digite um e-mail válido', '', 'error')</script>";
            exit;
        } elseif (empty($senha)) {
            echo "<script>mensagem('Senha inválida', '', 'error')</script>";
        }

        $em = \App\Core\Database::getEntityManager();
        $repositorio = $em->getRepository(\App\Model\Administrador::class);

        $administrador = $repositorio->findOneBy(['email' => $email]);

        if   ($administrador && password_verify($senha, $administrador->getSenha())) {
            // Login bem-sucedido
            $_SESSION['admin'] = [
                'id' => $administrador->getId(),
                'nome' => $administrador->getNome()
            ];

            echo "<script>mensagem('Login realizado com sucesso!', 'index', 'success')</script>";
        } else {
            echo "<script>mensagem('Email ou senha incorretos','login', 'error')</script>";
            exit;
        }
    }
}