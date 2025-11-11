<?php
use App\Core\Database;
use App\Model\Servico;

require "../../vendor/autoload.php";

header("Content-Type: application/json");

// Se quiser filtrar por ID futuramente, pode pegar de $_GET["id"]
// $id = $_GET["id"] ?? null;

$em = Database::getEntityManager();
$repo = $em->getRepository(Servico::class);

$servicos = $repo->findAll();

$dados = [];

foreach ($servicos as $s) {
    $dados[] = [
        "id" => $s->getId(),
        "tipoDeServico" => $s->getTipoDeServico(),
        "descricao" => $s->getDescricao(),
        "imagem" => $s->getImagem(),
    ];
}

echo json_encode($dados);
