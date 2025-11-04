<?php
namespace App\Model;
 
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\ManyToOne;


#[Entity()]
class Adicional {

    #[Column(), Id, GeneratedValue()]
    private int $id;

    #[Column()]
    private string $nome;

    #[Column()]
    private float $preco;

     #[Column()]
    private string $descricao;

    #[ManyToOne()]
    private Servico $servico;

    public function __construct(string $nome, float $preco, string $descricao, Servico $servico) {
        $this->nome = $nome;
        $this->preco = $preco;
        $this->descricao = $descricao;
        $this->servico = $servico;
    }

    public function getId(): int {
        return $this->id;
    }

    public function getNome(): string {
        return $this->nome;
    }

    public function getPreco(): float {
        return $this->preco;
    }

    public function getDescricao(): string {
        return $this->descricao;
    }

    public function getServico(): Servico {
        return $this->servico;
    }

    public function setNome(string $nome): void {
        $this->nome = $nome;
    }

    public function setPreco(float $preco): void {
        $this->preco = $preco;
    }

    public function setDescricao(string $descricao): void {
        $this->descricao = $descricao;
    }

    public function setServico(Servico $servico): void {
        $this->servico = $servico;
    }
}
