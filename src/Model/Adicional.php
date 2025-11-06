<?php
namespace App\Model;

use App\Core\Database;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: "adicional")]
class Adicional
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private int $id;

    #[ORM\Column(type: "string", length: 100)]
    private string $nome;

    #[ORM\Column(type: "float")]
    private float $preco;

    #[ORM\Column(type: "string", length: 255)]
    private string $descricao;

    #[ORM\ManyToOne(targetEntity: Servico::class)]
    #[ORM\JoinColumn(name: "servico_id", referencedColumnName: "id", nullable: false)]
    private Servico $servico;

   public function __construct(
    string $nome = '',
    float $preco = 0,
    string $descricao = '',
    ?Servico $servico = null
) {
    $this->nome = $nome;
    $this->preco = $preco;
    $this->descricao = $descricao;
    $this->servico = $servico;
}


    public function getId(): int
    {
        return $this->id;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function getPreco(): float
    {
        return $this->preco;
    }

    public function getDescricao(): string
    {
        return $this->descricao;
    }

    public function getServico(): Servico
    {
        return $this->servico;
    }

    public function setNome(string $nome): void
    {
        $this->nome = $nome;
    }

    public function setPreco(float $preco): void
    {
        $this->preco = $preco;
    }

    public function setDescricao(string $descricao): void
    {
        $this->descricao = $descricao;
    }

    public function setServico(Servico $servico): void
    {
        $this->servico = $servico;
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
        $repository = $em->getRepository(Adicional::class);
        return $repository->findAll();
    }

       public static function listar(): array
    {
        $em = Database::getEntityManager();
        $repo = $em->getRepository(self::class);
        return $repo->findBy([], ['nome' => 'ASC']);
    }
}