<?php
namespace App\Controller;

class SairController
{
    public function index()
    {
        unset($_SESSION["admin"]);
        echo "<script>location.href='/'</script>";
        exit;
    }
}
