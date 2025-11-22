<?php

namespace App\Model;

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\ManyToOne;

#[Entity()]
class Pagamento
{
    #[Id, GeneratedValue(), Column()]
    private int $id;

    #[Column]
    private string $status;

    #[ManyToOne()]
    #[JoinColumn(name: "agendamento_id", referencedColumnName: "id")]
    private Agendamento $agendamento;

    public function getId(): int {
        return $this->id;
    }

    public function getStatus(): string {
        return $this->status;
    }

    public function setStatus(string $status): void {
        $this->status = $status;
    }

    public function getAgendamento(): Agendamento {
        return $this->agendamento;
    }
}
