<?php 
session_start();
require_once('../model/PostDAO.php');

$dao = new PostDAO();
$curtir = $dao->obter($_POST['id_post']);

?>