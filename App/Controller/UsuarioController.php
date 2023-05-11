<?php

class UsuarioController {
    
    public static function formUsuario() {
        include 'View/Usuario/FormUsuario.php';
    }

    public static function salve() {

        include 'Model/UsuarioModel.php';
        $usuarioModel = new UsuarioModel();
        $usuarioModel->id = $_POST['id'];
        $usuarioModel->login_id = $_POST['login_id'];
        $usuarioModel->nome = $_POST['nome'];
        $usuarioModel->cpf = $_POST['cpf'];
        $usuarioModel->data_nascimento = $_POST['data_nascimento'];
        $usuarioModel->sexo = $_POST['sexo'];
        $usuarioModel->estado_civil = $_POST['estado_civil'];
        $usuarioModel->escolaridade = $_POST['escolaridade'];

        $usuarioModel->save();

        header("Location: /curriculoRegistre");
        exit;
        
    }
}
?>