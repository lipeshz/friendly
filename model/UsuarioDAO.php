<?php 
require_once('../bd/gerenciador_de_conexoes.php');
require_once('UsuarioDTO.php');

class UsuarioDAO{
    private $con;

    function __construct(){
        $this->con = GerenciadorDeConexoes::obter_conexao();
    }

    function inserir($usuario){
        $result = $this->con->query("INSERT INTO usuarios (nome,nick,email,cpf,data_nasc,senha) VALUES ('" . $usuario->get_nome() . "', '" . $usuario->get_nick() . "', '" . $usuario->get_email() . "', '" . $usuario->get_cpf() . "', '" . $usuario->get_data_nasc() . "', '" . $usuario->get_senha() . "')");

        if($result->rowCount() > 0){
            return true;
        }else{
            return false;
        }
    }

    function alterar($usuario){
        $result = $this->con->query("UPDATE usuarios SET nome = '" . $usuario->get_nome() . "', nick = '" . $usuario->get_nick() . "', email = '" . $usuario->get_email() . "', cpf = '" . $usuario->get_cpf() . "', data_nasc = '" . $usuario->get_data_nasc() . "', senha = '" . $usuario->get_senha() . "' WHERE id_usuario = " . $usuario->get_id_usuario());

        if($result->rowCount() > 0){
            return true;
        }else{
            return false;
        }
    }

    function excluir($id){
        $result = $this->con->query("DELETE FROM usuarios WHERE (id_usuario = '" . $id . "')");

        if($result->rowCount() > 0){
            return true;
        }else{
            return false;
        }
    }

    function obter($id){
        $result = $this->con->query("SELECT * FROM usuarios WHERE id_usuario = '" . $id . "'");

        if($result->rowCount() > 0){
            $row = $result->fetch(PDO::FETCH_ASSOC);

            $u = new Usuario();
            $u->set_id_usuario($row['id_usuario']);
            $u->set_nome($row['nome']);
            $u->set_nick($row['nick']);
            $u->set_email($row['email']);
            $u->set_cpf($row['cpf']);
            $u->set_data_nasc($row['data_nasc']);
            $u->set_senha($row['senha']);

            return $u;
        }else{
            return false;
        }
    }

    function obter_por_nick($nick){
        $result = $this->con->query("SELECT * FROM usuarios WHERE (nick = '" . $nick . "')");

        if($result->rowCount() == 0){
            $row = $result->fetch(PDO::FETCH_ASSOC);

            $u = new Usuario();
            $u->set_id_usuario($row['id_usuario']);
            $u->set_nome($row['nome']);
            $u->set_nick($row['nick']);
            $u->set_email($row['email']);
            $u->set_cpf($row['cpf']);
            $u->set_data_nasc($row['data_nasc']);
            $u->set_senha($row['senha']);
            
            return $u;
        }else{
            return false;
        }
    }

    function obter_por_email_cad($email){
        $result = $this->con->query("SELECT * FROM usuarios WHERE (email = '" . $email . "')");

        if($result->rowCount() == 0){
            $row = $result->fetch(PDO::FETCH_ASSOC);

            $u = new Usuario();
            $u->set_id_usuario($row['id_usuario']);
            $u->set_nome($row['nome']);
            $u->set_nick($row['nick']);
            $u->set_email($row['email']);
            $u->set_cpf($row['cpf']);
            $u->set_data_nasc($row['data_nasc']);
            $u->set_senha($row['senha']);

            return $u;
        }else{
            return false;
        }
    }

    function obter_por_email_login($email){
        $result = $this->con->query("SELECT * FROM usuarios WHERE (email = '" . $email . "')");

        if($result->rowCount() > 0){
            $row = $result->fetch(PDO::FETCH_ASSOC);

            $u = new Usuario();
            $u->set_id_usuario($row['id_usuario']);
            $u->set_nome($row['nome']);
            $u->set_nick($row['nick']);
            $u->set_email($row['email']);
            $u->set_cpf($row['cpf']);
            $u->set_data_nasc($row['data_nasc']);
            $u->set_senha($row['senha']);

            return $u;
        }else{
            return false;
        }
    }

    function obter_por_cpf($cpf){
        $result = $this->con->query("SELECT * FROM usuarios WHERE (cpf = '" . $cpf . "')");

        if($result->rowCount() == 0){
            $row = $result->fetch(PDO::FETCH_ASSOC);

            $u = new Usuario();
            $u->set_id_usuario($row['id_usuario']);
            $u->set_nome($row['nome']);
            $u->set_nick($row['nick']);
            $u->set_email($row['email']);
            $u->set_cpf($row['cpf']);
            $u->set_data_nasc($row['data_nasc']);
            $u->set_senha($row['senha']);

            return $u;
        }else{
            return false;
        }
    }

    function obter_todos(){
        $lista = [];
        $result = $this->con->query("SELECT * FROM usuarios");

           while($row = $result->fetch(PDO::FETCH_ASSOC)){
            $u = new Usuario();
            $u->set_id_usuario($row['id_usuario']);
            $u->set_nome($row['nome']);
            $u->set_nick($row['nick']);
            $u->set_email($row['email']);
            $u->set_cpf($row['cpf']);
            $u->set_data_nasc($row['data_nasc']);
            $u->set_senha($row['senha']);
            array_push($lista, $u);
           }
           return $lista;
    }
}
?>
