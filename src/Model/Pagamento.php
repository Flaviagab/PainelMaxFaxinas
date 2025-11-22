<?php

use App\Model\FormaPagamento;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\ManyToOne;

class Pagamento
{
    #[Column, Id, GeneratedValue]
    private int $id;

    #[ManyToOne]
    private FormaPagamento $formaPagamento;
    
    #[Column]
    private string $status;

    public function __construct(FormaPagamento $formaPagamento)
    {
        $this->formaPagamento = $formaPagamento;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getFormaPagamento(): FormaPagamento
    {
        return $this->formaPagamento;
    }

     public function getStatus(): string
    {
        return $this->status;
    }

    public function setStatus(string $status): void
    {
        $this->status = $status;
    }
}

?>