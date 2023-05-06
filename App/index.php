<?php

include 'Controller/LoginController.php';

#$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$url = isset($_GET['url']) ? $_GET['url'] : '/';

switch($url)
{
    case '/':
        echo "página inicial";
    break;

    case 'home':
        echo "página home";
    break;

    case 'login':
        LoginController::login();
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
