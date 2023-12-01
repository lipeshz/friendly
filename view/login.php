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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../css/login.css">
    <title>Friendly - Entrar</title>
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
            <p>Não possui uma conta?<a href="cadastro_usuario.php" style="text-decoration: none; color: #FF0000;"> Cadastre-se!</a></p>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    </body>
</html>