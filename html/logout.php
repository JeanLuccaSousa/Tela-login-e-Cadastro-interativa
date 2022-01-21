<?php 

if(!isset($_SESSION)) {
    session_start();
}

session_destroy(); // Irá destruir a sessão e as variáveis

header("Location: index.php");


?>