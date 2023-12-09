<?php 
class Usuario{
    private $id_usuario;
    private $nome;
    private $nick;
    private $biografia;
    private $email;
    private $cpf;
    private $data_nasc;
    private $senha;

    function set_id_usuario($id_usuario){
        $this->id_usuario = $id_usuario;
    }

    function get_id_usuario(){
        return $this->id_usuario;
    }

    function set_nome($nome){
		$this->nome = $nome;
	}

	function get_nome(){
		return $this->nome;
	}

    function set_nick($nick){
        $this->nick = $nick;
    }

    function get_nick(){
        return $this->nick;
    }

    function set_biografia($biografia){
        $this->biografia = $biografia;
    }

    function get_biografia(){
        return $this->biografia;
    }

    function set_email($email){
        $this->email = $email;
    }

    function get_email(){
        return $this->email;
    }

    function set_cpf($cpf){
        $this->cpf = $cpf;
    }

    function get_cpf(){
        return $this->cpf;
    }

    function set_data_nasc($data_nasc){
        $this->data_nasc = $data_nasc;
    }

    function get_data_nasc(){
        return $this->data_nasc;
    }

    function set_senha($senha){
        $this->senha = $senha;
    }

    function get_senha(){
        return $this->senha;
    }
}
?>