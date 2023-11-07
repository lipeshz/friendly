<?php 
session_start();
require_once('../model/UsuarioDAO.php');
$dao = new UsuarioDAO();
$usuario = $dao->obter($_SESSION['id_usuario']);

if(isset($_SESSION['sair'])){
    session_destroy();
    header("Location:../view/index.php");
    unset($_SESSION['sair']);
}
?>
