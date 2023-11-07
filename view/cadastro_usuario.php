<?php 
session_start();

$mensagem_senha="";
if(isset($_SESSION['cad_senha_err'])){
    $mensagem_senha="Campos não coincidem!";
    unset($_SESSION['cad_senha_err']);
}

$mensagem_email="";
if(isset($_SESSION['cad_email_err'])){
    $mensagem_email="E-mail já cadastrado!";
    unset($_SESSION['cad_email_err']);
}

$mensagem_nick="";
if(isset($_SESSION['cad_nick_err'])){
    $mensagem_nick="Nick já cadastrado!";
    unset($_SESSION['cad_nick_err']);
}

$mensagem_cpf="";
if(isset($_SESSION['cad_cpf_err'])){
    $mensagem_cpf="CPF já cadastrado!";
    unset($_SESSION['cad_cpf_err']);
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Friendly - Cadastro</title>
    <link rel="stylesheet" type="text/css" href="../css/cadastro.css">
</head>
    <body>
        <form action="../controller/cadastro_usuario.php" method="post">
            <div class="cad-items">
                <label for="usu_nome">Nome:*</label>
                <input type="text" name="nome" id="usu_nome" placeholder="Seu nome completo" required>
            </div>
            <div class="cad-items">
                <label for="usu_nick">Nick:*</label>
                <input type="text" name="nick" id="usu_nick" placeholder="Como as pessoas vão te chamar?" maxlength="16" required>
            </div>
            <?php 
            echo $mensagem_nick;
            ?>
            <div class="cad-items">
                <label for="usu_email">E-Mail:*</label>
                <input type="email" name="email" id="usu_email" autocomplete="email" placeholder="Seu e-mail de cadastro" required>
            </div>
            <?php 
            echo $mensagem_email;
            ?>
            <div class="cad-items">
                <label for="usu_cpf">CPF:*</label>
                <input type="number" name="cpf" id="usu_cpf" placeholder="Seu CPF" onKeyPress="if(this.value.length>11) return false;" required>
            </div>
            <?php 
            echo $mensagem_cpf;
            ?>
            <div class="cad-items">
                <label for="usu_data_nasc">Data de Nascimento:*</label>
                <input type="date" name="data_nasc" id="usu_data_nasc" required>
            </div>
            <div class="cad-items">
                <label for="usu_senha">Senha:*</label>
                <input type="password" name="senha" id="usu_senha" placeholder="Sua senha" required>
            </div>
            <div class="cad-items">
                <label for="usu_conf_senha">Confirmar senha:*</label>
                <input type="password" name="conf_senha" id="usu_conf_senha" placeholder="Confirme sua senha" required>
            </div>
            <p class="erro">
            <?php 
            echo $mensagem_senha;
            ?>
            </p>
            <p>(*) Campos obrigatórios</p><br>
            <div class="btn-cad"><input type="submit" value="Cadastrar" id="cadastrar"></div>
        </form>
    </body>
</html>