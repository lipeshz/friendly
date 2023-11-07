<?php 
session_start();
$mensagem="";
if(isset($_SESSION['login_err'])){
    $mensagem="Credenciais estão incorretas!";
    unset($_SESSION['login_err']);
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Friendly - Entrar</title>
    <link rel="stylesheet" type="text/css" href="../css/login.css">
</head>
    <body>
        <form action="../controller/login.php" method="post">
            <div class="login-items">
                <label for="log_email">E-Mail:</label>
                <input type="email" name="email" id="email" placeholder="Seu e-mail">
            </div>
            <div class="login-items">
                <label for="log_senha">Senha:</label>
                <input type="password" name="senha" id="senha"  placeholder="Sua senha">
            </div>
            <?php 
                echo $mensagem;
            ?>
            <input type="submit" value="Entrar" class="entrar">
        </form>
        <div class="tipo-entry">
            <p>Não possui uma conta?<a href="cadastro.php" style="text-decoration: none; color: #FF0000;"> Cadastre-se!</a></p>
        </div>
    </body>
</html>