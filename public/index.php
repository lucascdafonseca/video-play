<?php

use Project\Mvc\Controller\{
    VideoDeleteController,
    VideoFormController,
    VideoInsertController,
    VideoListController,
    VideoUpdateController
};
use Project\Mvc\Repository\VideoRepository;

require_once __DIR__ . '/../vendor/autoload.php';

$dbPath = __DIR__ . '/../db.sqLite';
$pdo = new PDO("sqlite:$dbPath");
$videoRepository = new VideoRepository($pdo);


if ($_SERVER['REQUEST_URI'] === '/') {
    $controller = new VideoListController($videoRepository);
} else if ($_SERVER['PATH_INFO'] === '/new-video') {
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $controller = new VideoFormController($videoRepository);
    } else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $controller = new VideoInsertController($videoRepository);
    }
} else if ($_SERVER['PATH_INFO'] === '/edit-video') {
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $controller = new VideoFormController($videoRepository);
    } else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $controller = new VideoUpdateController($videoRepository);
    }
} else if ($_SERVER['PATH_INFO'] === '/remove-video') {
    $controller = new VideoDeleteController($videoRepository);
} else {
    http_response_code(404);
}
$controller->processRequest();
