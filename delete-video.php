<?php

use Project\Mvc\Repository\VideoRepository;

$dbPath = __DIR__ . '/db.sqLite';
$pdo = new PDO("sqlite:$dbPath");

$id = $_GET['id'];

$repository = new VideoRepository($pdo);
$repository->deleteVideo($id);

header('Location: /');
