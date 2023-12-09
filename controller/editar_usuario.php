<?php 
session_start();
require_once('../model/UsuarioDAO.php');
require_once('../model/PostDAO.php');

if(isset($_SESSION['id_usuario'])){
    $dao_u = new UsuarioDAO();
    $dao_p = new PostDAO();
    $usuario = $dao_u->obter($_SESSION['id_usuario']);

    if($_POST['nome'] != $_SESSION['nome']){
        $usuario->set_nome($_POST['nome']);
    }

    if($_POST['nick'] != $_SESSION['nick']){
        $usuario->set_nick($_POST['nick']);
    }

    if($_POST['biografia'] != $_SESSION['biografia']){
        $usuario->set_biografia($_POST['biografia']);
    }

    if($dao_u->alterar($usuario)){
        header("Location:../view/perfil_usuario.php?id_publicador=".$_SESSION['id_usuario']."");
    }else{
        header("Location:../view/perfil_usuario.php?id_publicador=".$_SESSION['id_usuario']."");
    }
}else{
    header('Location:../view/login.php');
}




?>