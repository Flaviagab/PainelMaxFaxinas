<?php
require __DIR__ . '/../vendor/autoload.php';
use App\Controller\IndexController;

session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel de Controle</title>

    <link rel="shortcut icon" href="imagens/iconeAdmin.png">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="js/jquery-3.7.1.js"></script>
    <script src="js/jquery.mask.min.js"></script>
    <script src="js/parsley.min.js"></script>

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
    </script>
</head>

<body>
    <?php
    if ((!isset($_SESSION["admin"])) && (!$_POST)) {
        require "../src/View/index/login.php";
    } else if ((!isset($_SESSION["admin"])) && ($_POST)) {
        $email = trim($_POST["email"] ?? null);
        $senha = trim($_POST["senha"] ?? null);

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "<script>mensagem('E-mail inválido', 'index', 'error');</script>";
        } else if (empty($senha)) {
            echo "<script>mensagem('Digite a senha', 'index', 'error');</script>";
        }else{
            $acao = new IndexController;
            $acao->verificar(['email' => $email, 'senha' => $senha]);
        }

    } else {

        echo "Passou";

    }
    ?>


</body>

</html>