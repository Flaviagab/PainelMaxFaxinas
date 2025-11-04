<?php
namespace App\Model;
 
use App\Core\Database;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;

 #[Entity()]
class Servico
{
     #[Column(), Id, GeneratedValue() ]
    private int $id;

    #[Column()]
    private float $preco;

    #[Column()]
    private string $tipoDeServico;
   

     public function __construct(string $tipoDeServico, float $preco)
    {
        $this->tipoDeServico = $tipoDeServico;
        $this->preco = $preco;
    }

    public function getId() :int {
        return $this->id;
        
    }

    public function getTipoDeServico(): string
    {
        return $this->tipoDeServico;
    }

    public function getPreco(): float
    {
        return $this->preco;
    }

    public function setTipoDeServico(string $tipoDeServico): void
    {
        $this->tipoDeServico = $tipoDeServico;
    }

    public function setPreco(float $preco): void
    {
        $this->preco = $preco;
    }

    public static function findAll(): array 
    {
        $entityManager = Database::getEntityManager();
        $repository = $entityManager->getRepository(Servico::class);
        return $repository->findAll();

    }

    public function save(): void
    {
        $em = Database::getEntityManager();
        $em->persist($this);
        $em->flush();
    }
    
}



