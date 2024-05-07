<?php

$dbPath = __DIR__ . '/../db.sqLite';
$pdo = new PDO("sqlite:$dbPath");

$url = filter_input(INPUT_POST, 'url', FILTER_VALIDATE_URL);
if ($url === false) {
    header('Location: /?sucesso=0');
    exit();
}
$title = filter_input(INPUT_POST, 'titulo');
if ($url === false) {
    header('Location: /?sucesso=0');
    exit();
}

$query = 'INSERT INTO videos (url, title) VALUES (:url, :title);';

$preparedStatement = $pdo->prepare($query);
$preparedStatement->bindValue(':url', $url);
$preparedStatement->bindValue(':title', $title);

$preparedStatement->execute();

header('Location: /');
