<?php

namespace App\Model;

use App\Core\Database;
use DateTime;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\JoinColumn;
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

    #[ManyToOne]
    #[JoinColumn(name: "cliente_id", referencedColumnName: "id")]
    private Cliente $cliente;

    #[ManyToOne]
    #[JoinColumn(name: "servico_id", referencedColumnName: "id")]
    private Servico $servico;

    #[ManyToOne]
    #[JoinColumn(name: "forma_pagamento_id", referencedColumnName: "id")]
    private FormaPagamento $forma_pagamento;

    #[ManyToOne]
    #[JoinColumn(name: "id_endereco", referencedColumnName: "id")]
    private Endereco $endereco;
    #[Column]
    private float $valor_total;


    public function __construct(DateTime $data, string $status, Cliente $cliente, Servico $servico, FormaPagamento $forma_pagamento,  Endereco $endereco, float $valor_total)
    {
        $this->data = $data;
        $this->status = $status;
        $this->cliente = $cliente;
        $this->servico = $servico;
        $this->forma_pagamento = $forma_pagamento;
        $this->endereco = $endereco;
        $this->valor_total = $valor_total;
    }

    // Getters (Serve para pegar os valores)
    public function getData(): DateTime
    {
        return $this->data;
    }

    public function getId(): int
    {
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

    public function getFormaPagamento(): FormaPagamento
    {
        return $this->forma_pagamento;
    }

    public function getEndereco(): Endereco
    {
        return $this->endereco;
    }

    public function getValorTotal(): float
    {
        return $this->valor_total;
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
