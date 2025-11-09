<?php

namespace App\Model;

use App\Core\Database;
use DateTime;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\ManyToOne;

#[Entity()]
class Agendamento
{

    #[Column, Id, GeneratedValue]
    private int $id;

    #[Column()]
    private DateTime $data;

    #[Column()]
    private string $status;

    #[ManyToOne()]
    private Cliente $cliente;

    #[ManyToOne()]
    private Servico $servico;

    #[ManyToOne()]
    private forma_pagamento $forma_pagamento;

    public function __construct(DateTime $data, string $status, Cliente $cliente, Servico $servico, forma_pagamento $forma_pagamento)
    {
        $this->data = $data;
        $this->status = $status;
        $this->cliente = $cliente;
        $this->servico = $servico;
        $this->forma_pagamento = $forma_pagamento;
    }

    // Getters (Serve para pegar os valores)
    public function getData(): DateTime
    {
        return $this->data;
    }

    public function getId(): int {
    return $this->id;
}
    public function getStatus(): string
    {
        return $this->status;
    }

    public function getCliente(): Cliente
    {
        return $this->cliente;
    }

    public function getServico(): Servico
    {
        return $this->servico;
    }

    public function getFormaPagamento(): forma_pagamento
    {
        return $this->forma_pagamento;
    }

    // Setters (Serve para alterar os valores)
    public function setData(DateTime $data): void
    {
        $this->data = $data;
    }

    public function setStatus(string $status): void
    {
        $this->status = $status;
    }

    public static function findAll(): array
    {
        $entityManager = Database::getEntityManager();
        $repository = $entityManager->getRepository(Agendamento::class);
        return $repository->findAll();
    }

    public function save(): void
    {
        $em = Database::getEntityManager();
        $em->persist($this);
        $em->flush();
    }
}