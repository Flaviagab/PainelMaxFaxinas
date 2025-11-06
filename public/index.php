<?php
require_once __DIR__ . '/../vendor/autoload.php';

use App\Controller\IndexController;

session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel de Controle</title>

    <link rel="shortcut icon" href="/imagens/iconeAdmin.png">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/style.css">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="/js/jquery-3.7.1.js"></script>
    <script src="/js/jquery.mask.min.js"></script>
    <script src="/js/parsley.min.js"></script>

    <script>
        function mostrarSenha() {
            var campo = document.getElementById("senha");
            if (campo.type == "password") {
                campo.type = "text";
            } else {
                campo.type = "password";
            }
        }

        mensagem = function(msg, url, icone) {
            Swal.fire({
                icon: icone,
                title: msg,
                confirmButtonText: "OK",
            }).then((result) => {
                location.href = url;
            })
        }

        function confirmarExclusao(url) {
            Swal.fire({
                title: "Tem certeza?",
                text: "Essa ação não poderá ser desfeita!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Sim, excluir",
                cancelButtonText: "Cancelar"
            }).then((result) => {
                if (result.isConfirmed) {
                    location.href = url;
                }
            });
        }
    </script>
</head>

<body>
    <?php
    if ((!isset($_SESSION["admin"])) && (!$_POST)) {
        require __DIR__ . "/../src/View/index/login.php";
    } else if ((!isset($_SESSION["admin"])) && ($_POST)) {
        $email = trim($_POST["email"] ?? null);
        $senha = trim($_POST["senha"] ?? null);

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "<script>mensagem('E-mail inválido', 'index', 'error');</script>";
        } else if (empty($senha)) {
            echo "<script>mensagem('Digite a senha', 'index', 'error');</script>";
        } else {

            $acao = new IndexController;
            $acao->verificar(['email' => $email, 'senha' => $senha]);
        }
    } else {
    ?>

        <header>
            <nav class="navbar navbar-expand-lg bg-body-tertiary">
                <div class="container-fluid">
                    <img class="logocabecalho" src="/imagens/MaxFaxinas.png" alt="Logo Max Faxinas">
                    <!--    <a class="navbar-brand" href="#">Navbar</a> -->
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                        aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavDropdown">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="index">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/servico">Serviços</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/adicional">Adicionais</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/cliente">Clientes</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/endereco">Endereços</a>
                            </li>
                        </ul>
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item">
                                <div class="dropdown">
                                    <a class="btn" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="bi bi-person-circle"></i>
                                    </a>

                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li>
                                            <a class="dropdown-item" href="perfil">Ver perfil</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item bntSair" href="/sair">
                                                <i class="bi bi-x-circle me-2"></i>Sair</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                        </ul>

                    </div>
                </div>
            </nav>


            <main>
                <?php

                $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
                $uri = trim($uri, '/');
                $controller = !empty($uri) ? $uri : 'index';
                $param = explode("/", $controller);

                $controller = $param[0] ?? "index";
                $acao = $param[1] ?? "index";
                $id = $param[2] ?? NULL;

                $controller = ucfirst($controller) . "Controller";
                $page = __DIR__ . "/../src/Controller/{$controller}.php";

                if (file_exists($page)) {

                    include $page;
                    $classe = "App\\Controller\\" . $controller;
                    $control = new $classe();
                    $control->$acao($id);
                } else include __DIR__ . "/../src/View/index/erro.php";
                ?>
            </main>

        <?php
    }
        ?>


</body>

</html>