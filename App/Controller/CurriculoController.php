<?php

class CurriculoController {

    public static function curriculo(){
        include 'View/Curriculo/Curriculo.php';
    }

    public static function save(){

        
        include 'Model/LoginModel.php';
        $loginModel = new LoginModel();
        $loginModel->email = $_POST['email'];
        $loginModel->senha = $_POST['password']; 
        $loginModel->save(); 

        

        include 'Model/UsuarioModel.php';
        $usuarioModel = new UsuarioModel();

        $usuarioModel->login_id = $login->id;
        $usuarioModel->login_id = 1;

        $usuarioModel->nome = $_POST['nome'];
        $usuarioModel->cpf = $_POST['cpf'];
        $usuarioModel->data_nascimento = $_POST['data_nascimento'];
        $usuarioModel->sexo = $_POST['sexo'];
        $usuarioModel->estado_civil = $_POST['estado_civil'];
        $usuarioModel->escolaridade = $_POST['escolaridade'];

        $usuarioModel->save();


        include 'Model/CurriculoModel.php';
        $curriculoModel = new CurriculoModel();
        $curriculoModel->usuario_id = 1;

        $curriculoModel->pretensao_salarial = $_POST['pretensao_salarial'];
        $curriculoModel->data_registro = date_create('now', timezone_open('America/Sao_Paulo'))->format('Y-m-d H:i:s');
        $curriculoModel->$cursos = $_POST['cursos'];


        $curriculoModel->experiencias = $_POST['experiencias'];
       
        $curriculoModel->save();

        header("Location: /");
        exit;
    }


}
?>