<?php

/**
 * Classe Controller responsável por autenticar o usuário no sistema.
 */
class LoginController 
{
    /**
     * Método para exibir o formulário de login.
     */
    public static function login()
    {
        include 'View/Login/Login.php';
    }

    /**
     * Método para autenticar o usuário no sistema.
     */
    public static function authenticate()
    {
        include 'Model/UserModel.php';

        // Obtém os dados do usuário informados no formulário de login
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Verifica se o usuário existe na base de dados
        $userModel = new UserModel();
        $user = $userModel->getUserByUsername($username);

        if (!$user) {
            // Se o usuário não existir, exibe mensagem de erro e redireciona para o formulário de login
            $_SESSION['flash'] = 'Usuário ou senha inválidos';
            header("Location: /login");
            exit;
        }

        // Verifica se a senha informada está correta
        if (!password_verify($password, $user['password'])) {
            // Se a senha estiver incorreta, exibe mensagem de erro e redireciona para o formulário de login
            $_SESSION['flash'] = 'Usuário ou senha inválidos';
            header("Location: /login");
            exit;
        }

        // Se o usuário e senha estiverem corretos, inicia a sessão do usuário e redireciona para a página inicial
        session_start();
        $_SESSION['user'] = $user;
        header("Location: /");
        exit;
    }

    /**
     * Método para deslogar o usuário do sistema.
     */
    public static function logout()
    {
        session_start();
        session_destroy();
        header("Location: /login");
        exit;
    }
}