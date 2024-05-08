<?php

use Project\Mvc\Controller\VideoDeleteController;
use Project\Mvc\Controller\VideoFormController;
use Project\Mvc\Controller\VideoInsertController;
use Project\Mvc\Controller\VideoListController;
use Project\Mvc\Controller\VideoUpdateController;
use Project\Mvc\Repository\VideoRepository;

require_once __DIR__ . '/../vendor/autoload.php';

$dbPath = __DIR__ . '/../db.sqLite';
$pdo = new PDO("sqlite:$dbPath");
$videoRepository = new VideoRepository($pdo);


if ($_SERVER['REQUEST_URI'] === '/') {
    $controller = new VideoListController($videoRepository);
    $controller->processRequest();
} else if ($_SERVER['PATH_INFO'] === '/new-video') {
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $controller = new VideoFormController($videoRepository);
        $controller->processRequest();
    } else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $controller = new VideoInsertController($videoRepository);
        $controller->processRequest();
    }
} else if ($_SERVER['PATH_INFO'] === '/edit-video') {
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $controller = new VideoFormController($videoRepository);
        $controller->processRequest();
    } else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $controller = new VideoUpdateController($videoRepository);
        $controller->processRequest();
    }
} else if ($_SERVER['PATH_INFO'] === '/remove-video') {
    $controller = new VideoDeleteController($videoRepository);
    $controller->processRequest();
} else {
    http_response_code(404);
}
