<?php
declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

$userController = new App\Controller\UserController();
$userController->showUser($_GET);
