<?php

namespace App\Model;

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\ManyToOne;

#[Entity()]
class Estado
{

    #[Column(), Id, GeneratedValue()]
    private int $id;

    #[Column()]
    private string $nome;

    #[ManyToOne()]
    private Pais $pais;

    public function __construct(string $nome, Pais $pais)
    {
        $this->nome = $nome;
        $this->pais = $pais;
    }

     public function getId(): int {
        return $this->id;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function getPais(): Pais
    {
        return $this->pais;
    }
}
