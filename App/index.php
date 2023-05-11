<?php

include 'Controller/LoginController.php';
include 'Controller/CurriculoController.php';
include 'Controller/UsuarioController.php';

$url = isset($_GET['url']) ? $_GET['url'] : '/';

switch($url)
{
    case '/':
        //CurriculoController::curriculo();
        include 'View/index.php';
    break;

    case 'usuario':
        UsuarioController::formUsuario();
    break;

    case 'usuario/salve':
        UsuarioController::save();
    break;

    case 'curriculoRegistre':
        CurriculoController::save();
    break;

    case 'login':
        LoginController::login();
    break;

    case 'login/register':
        LoginController::register();
    break;
    
    case 'login/save':
        LoginController::save();
        break;

    case 'login/authenticate':
        LoginController::authenticate();
    break;

    case 'login/logout':
        LoginController::logout();
    break;

    default:
        echo "Erro 404";
    break;
}
