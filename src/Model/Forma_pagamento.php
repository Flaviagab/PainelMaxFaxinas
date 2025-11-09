<?php
namespace App\Model;
 
use App\Core\Database;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;

#[Entity()]
class Forma_pagamento
{
    #[Column, Id, GeneratedValue]
    private int $id;

    #[Column()]
    private string $tipo;

    public function __construct(string $tipo)
    {
        $this->tipo = $tipo;
    }

    public function getId(): int {
        return $this->id;
    }

    public function getTipo(): string
    {
        return $this->tipo;
    }
}
?>