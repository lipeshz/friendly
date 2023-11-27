<?php 
session_start();
require_once('../model/UsuarioDAO.php');
$dao = new UsuarioDAO();
$email_existente = $dao->obter_por_email_cad($email);
$nick_existente = $dao->obter_por_nick($nick);
$cpf_existente = $dao->obter_por_cpf($cpf);


if($_POST['senha'] != $_POST['conf_senha']){
    $_SESSION['cad_senha_err']=true;
    header("Location:../view/cadastro_usuario.php");
}elseif($email_existente === false){
    $_SESSION['cad_email_err']=true;
    header("Location:../view/cadastro_usuario.php");
}elseif($nick_existente === false){
    $_SESSION['cad_nick_err']=true;
    header("Location:../view/cadastro_usuario.php");
}elseif($cpf_existente === false){
    $_SESSION['cad_cpf_err']=true;
    header("Location:../view/cadastro_usuario.php");
}else{
    $usuario = new Usuario();
    $senha = password_hash($_POST['senha'], PASSWORD_BCRYPT);
    $usuario->set_senha($senha);
    $usuario->set_nome($_POST['nome']);
    $usuario->set_nick($_POST['nick']);
    $usuario->set_email($_POST['email']);
    $usuario->set_cpf($_POST['cpf']);
    $usuario->set_data_nasc($_POST['data_nasc']);

    if($dao->inserir($usuario)){
        $_SESSION["email"] = $usuario->get_email();
        $_SESSION["id_usuario"] = $usuario->get_id_usuario();
        header("Location:../view/index.php");
    }else{
        header("Location:../view/cadastro_usuario.php");
    }
}
?>