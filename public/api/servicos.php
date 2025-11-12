<?php
use App\Core\Database;
use App\Model\Servico;

require "../../vendor/autoload.php";

header("Content-Type: application/json");

$em = Database::getEntityManager();
$repo = $em->getRepository(Servico::class);

if (isset($_GET["id"])) {
    $id = (int)$_GET["id"];
    $servico = $repo->find($id);

    if (!$servico) {
        http_response_code(404);
        echo json_encode(["erro" => "Serviço não encontrado"]);
        exit;
    }

    echo json_encode([
        "id" => $servico->getId(),
        "tipoDeServico" => $servico->getTipoDeServico(),
        "descricao" => $servico->getDescricao(),
        "imagem" => $servico->getImagem(),
    ]);
    exit;
}

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
