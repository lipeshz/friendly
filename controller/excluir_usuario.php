<?php 
session_start();
require_once('../model/UsuarioDAO.php');
$dao = new UsuarioDAO();
$usuario = $dao->obter($_SESSION['id_usuario']);

if(isset($_SESSION['excluir'])){
    $dao->excluir($_SESSION['id_usuario']);
    session_destroy();
    unset($_SESSION['excluir']);
    header("Location:../view/index.php");
}
?>