<?php 
session_start();
require_once('../model/UsuarioDAO.php');
$dao = new UsuarioDAO();
$usuario = $dao->obter_por_email_login($_POST['email']);

if(!$usuario){
    $_SESSION['login_err'] = true;
    header('Location:../view/login.php');
}else{
    if(password_verify($_POST['senha'], $usuario->get_senha())){
        $_SESSION["email"] = $usuario->get_email();
        $_SESSION["id_usuario"] = $usuario->get_id_usuario();
        header('Location:../view/index.php');
    }else{
        $_SESSION['login_err'] = true;
        header('Location:../view/login.php');
    }
}
?>
