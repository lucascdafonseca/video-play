<?php

use Project\Mvc\Entity\Video;
use Project\Mvc\Repository\VideoRepository;

$dbPath = __DIR__ . '/db.sqLite';
$pdo = new PDO("sqlite:$dbPath");

$url = filter_input(INPUT_POST, 'url', FILTER_VALIDATE_URL);
if ($url === false) {
    header('Location: /?sucesso=0');
    exit();
}
$title = filter_input(INPUT_POST, 'titulo');
if ($title === false) {
    header('Location: /?sucesso=0');
    exit();
}

$repository = new VideoRepository($pdo);
$repository->addVideo(new Video($url, $title));


header('Location: /');
