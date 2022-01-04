<?php
include('conexao.php');

if(isset($_POST['email']) || isset($_POST['senha'])) { //Isset == 'Se existir'
    if(strlen($_POST['email']) == 0 ) { //strlen -> Quantidade de caracteres
        echo 'Preencha seu e-mail';
    } else if(strlen($_POST['senha']) == 0 ) {
        echo 'Preencha sua senha';
    } else {
        $email = $mysqli->real_escape_string($_POST['email']);
        $senha = $mysqli->real_escape_string($_POST['senha']);

        $sql_code = "SELECT * FROM usuários WHERE email = '$email' and senha = '$senha'"; // Para verificar o usuário e a senha ||| * Quer dizer, selecionar tudo desta tabela
        $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $msqli->error); // die(); Caso de algum problema no carregamento, ele retorna o tipo de erro

        $quantidade = $sql_query->num_rows;

        if($quantidade == 1) {
            $usuario = $sql_query->fetch_assoc();

            if(!isset($_SESSION)) { //!isset -> Se não existir uma sessão, inicia-se outra
                session_start();
            }

            $_SESSION['user'] = $usuario['id']; // Iniciando uma outra sessão com um novo usuário
            $_SESSION['nome'] = $usuario['nome']; // e com o nome dele
            // Variável $_SESSION continua válida mesmo quando a pessoa troca de página

            // $_GET = Só continua válida se ela estiver na URL;
            // $_POST = Só continua válida quando um dado é enviado por formulário

            header("Location: painel.php"); // Assim que o usuário é logado, ele é direcionado para a página

        } else {
            echo 'Falha ao logar! E-mail ou senha incorretos';
        }
    }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
        integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="content first-content">
            <div class="first-column">
                <h2 class="title title-primary">Welcome back!</h2>
                <p class="description description-primary">To keep connected with us</p>
                <p class="description description-primary">please login with your personal info</p>
                <button id="signin" class="btn btn-primary">Sign in</button>
            </div>
            <!--end first-column-->
            <div class="second-column">
                <h2 class="title title-second">Create account</h2>
                <div class="social-media">
                    <ul class="list-social-media">
                        <a class="link-social-media" href="#"><li class="item-social-media"><i class="fab fa-facebook-f"></i></i></li></a>
                        <a class="link-social-media" href="#"><li class="item-social-media"><i class="fab fa-google-plus-g"></i></li></a>
                        <a class="link-social-media" href="#"><li class="item-social-media"><i class="fab fa-linkedin-in"></i></li></a>
                    </ul>
                </div>
                <p class="description description-second">or use your email for registration</p>
                <form class="form" method="POST">
                    <label class="label-input">
                        <i class="fas fa-user icon-modify"></i>
                        <input type="text" placeholder="Name">
                    </label>
                    <label class="label-input">
                        <i class="far fa-envelope icon-modify"></i>
                        <input type="email" placeholder="Email" name="email">
                    </label>
                    <label class="label-input">
                        <i class="fas fa-lock icon-modify"></i>
                        <input type="password" placeholder="Password" name="senha">
                    </label>
                    <button type="submit" class="btn btn-second">Sign up</button>
                </form>
            </div>
            <!--end second-column-->
        </div>
        <!--end first-content-->
        <div class="content second-content">
                <div class="first-column">
                    <h2 class="title title-primary">Hello, Friend!</h2>
                    <p class="description description-primary">Enter your personal details</p>
                    <p class="description description-primary">and start journey with us</p>
                    <button id="signup" class="btn btn-primary">Sign up</button>
                </div>
                <!--end first-column-->
                <div class="second-column">
                    <h2 class="title title-second">Sign In To Developer</h2>
                    <div class="social-media">
                        <ul class="list-social-media">
                            <a class="link-social-media" href="#"><li class="item-social-media"><i class="fab fa-facebook-f"></i></li></a>
                            <a class="link-social-media" href="#"><li class="item-social-media"><i class="fab fa-google-plus-g"></i></li></a>
                            <a class="link-social-media" href="#"><li class="item-social-media"><i class="fab fa-linkedin-in"></i></li></a>
                        </ul>
                    </div>
                    <p class="description description-second">or use your email for registration</p>
                    <form class="form">
                        <label class="label-input">
                            <i class="far fa-envelope icon-modify"></i>
                            <input type="email" placeholder="Email">
                        </label>
                        <label class="label-input">
                            <i class="fas fa-lock icon-modify"></i>
                            <input type="password" placeholder="Password">
                        </label>
                        <a class="password" href="#">forgot your password?</a>
                        <button class="btn btn-second">Sign in</button>
                    </form>
                </div>
                <!--end second-column-->
        </div>
    <script src="js/app.js"></script>
</body>
</html>