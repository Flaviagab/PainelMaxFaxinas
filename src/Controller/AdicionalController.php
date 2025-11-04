<?php
namespace App\Controller;

use App\Core\Database;
use App\Model\Servico;
use App\Model\Adicional;

class AdicionalController {

    public function index($id = null){
        // Pega o EntityManager
        $entityManager = Database::getEntityManager();

        // Pega o repositório da entidade Servico
        $repo = $entityManager->getRepository(Servico::class);

        // Busca todos os serviços
        $servicos = $repo->findAll();

        // Inclui a view, passando $servicos
         require __DIR__ . "/../View/adicional/index.php";
    }

     public function salvar(): void
    {
        $entityManager = Database::getEntityManager();

        // Dados vindos do formulário
        $nome = $_POST['nome'] ?? '';
        $preco = $_POST['preco'] ?? 0;
        $servicoId = $_POST['servico_id'] ?? null;

        if (!$servicoId) {
            die("Serviço não selecionado!");
        }

        // Busca o serviço selecionado
        $servico = $entityManager->find(Servico::class, $servicoId);

        // Cria novo adicional
        $adicional = new Adicional();;
        $adicional->setNome($nome);
        $adicional->setPreco((float)$preco);
        $adicional->setServico($servico);

        // Salva no banco
        $entityManager->persist($adicional);
        $entityManager->flush();

        echo "✅ Adicional salvo com sucesso!";
    }

    public function excluir($id){
        // excluir os dados
    }

    public function listar(){
        // listar os dados
    }
}
