<?php

use Project\Mvc\Repository\VideoRepository;

require_once __DIR__ . '/../vendor/autoload.php';

$routes = require_once __DIR__ . '/../config/routes.php';

$dbPath = __DIR__ . '/../db.sqLite';
$pdo = new PDO("sqlite:$dbPath");
$videoRepository = new VideoRepository($pdo);

$pathInfo = $_SERVER['PATH_INFO'] ?? '/';
$httpMethod = $_SERVER['REQUEST_METHOD'];

$controllerClass = $routes["$httpMethod|$pathInfo"];
$controller = new $controllerClass($videoRepository);

$controller->processRequest();
