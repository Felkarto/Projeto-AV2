<?php
session_start();

if (isset($_POST['botao']) && $_POST['botao'] == "Logar") {
    include "classes/DB.class.php";
    include "classes/Usuario.class.php";

    $login = Usuario::logar($_POST['login'], $_POST['senha']);

    if (isset($_SESSION['login']) && isset($_SESSION['id'])) {
        echo "Você está Logado <a href='index.php'> ACESSE O SISTEMA</a>";

    } else {
        echo "Você NÃO está logado";
    }
}

?>


<form method="post">
    usuario: <input type='text' name='login'><br/>
    senha: <input type='password' name='senha'>
    <input type='submit' name='botao' value='Logar'>

</form>
