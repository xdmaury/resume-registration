<?php

class LoginController 
{
    public static function login()
    {
        include 'View/Login/Login.php';
    }

    public static function register()
    {
        include 'View/Login/Register.php';
    }

    public static function authenticate()
    {
       

        $email = $_POST['email'];
        $password = $_POST['password'];

        include 'Model/LoginModel.php';
        $loginModel = new LoginModel();
        $login = $loginModel->getByEmail($email);

        if (!$login) {
            $_SESSION['flash'] = 'Usuário ou senha inválidos';
            header("Location: /login");
            exit;
        }
       
        if ($password != $login->senha) {
            $_SESSION['flash'] = 'Usuário ou senha inválidos';
            header("Location: /login");
            exit;
        }

        session_start();
        $_SESSION['login'] = $login;
        header("Location: /");
        exit;
    }

    public static function save()
    {
        include 'Model/LoginModel.php';
        $loginModel = new LoginModel();
        $loginModel->id = $_POST['id'];
        $loginModel->email = $_POST['email'];
        $loginModel->senha = $_POST['password'];
        /*
        // isso nao esta funcionando 
        $login = $loginModel->getByEmail($loginModel->email);

        if ($login->email == $loginModel->email) {
            // Se o usuário já existir, exibe mensagem de erro e redireciona para o formulário de registro
            $_SESSION['flash'] = 'Usuário já existente';
            header("Location: /registerLogin");
            exit;
        }
        */

        $loginModel->save(); 

        header("Location: /usuario?login_id=$loginModel->id");
        exit;

    }

    public static function logout()
    {
        session_start();
        session_destroy();
        header("Location: /login");
        exit;
    }
}

?>