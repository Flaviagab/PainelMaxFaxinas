<?php

//Grupo de classes
namespace App\Model;

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use App\Core\Database;

#[Entity()]
class Usuario
{

    #[Column(), Id, GeneratedValue()]
    private int $id;

    #[Column()]
    private string $cpf;
    #[Column()]
    private string $nome;
    #[Column()]
    private string $email;
    #[Column()]
    private string $telefone;
    #[Column()]
    private string $senha;

    public function __construct(string $cpf, string $nome, string $email, string $telefone, string $senha)
    {
        $this->cpf = $cpf;
        $this->nome = $nome;
        $this->email = $email;
        $this->telefone = $telefone;
        $this->senha = password_hash($senha, PASSWORD_DEFAULT);
    }

    public function getId(): int
    {
        return $this->id;
    }

    // Getters (Serve para pegar os valores)
    public function getCpf(): string
    {
        return $this->cpf;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getTelefone(): string
    {
        return $this->telefone;
    }

    public function getSenha(): string
    {
        return $this->senha;
    }

    public function setSenha(string $senha): void
    {
        $this->senha = password_hash($senha, PASSWORD_DEFAULT);
    }

    // Setters (Serve para alterar os valores)
    public function setCpf(string $cpf): void
    {
        $this->cpf = $cpf;
    }

    public function setNome(string $nome): void
    {
        $this->nome = $nome;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function setTelefone(string $telefone): void
    {
        $this->telefone = $telefone;
    }

    public function save(): void
    {
        $em = Database::getEntityManager();
        $em->persist($this);
        $em->flush();
    }

    public static function findAll(): array
    {
        $em = Database::getEntityManager();
        $repository = $em->getRepository(Usuario::class);
        return $repository->findAll();
    }
}
