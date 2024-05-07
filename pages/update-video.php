<?php

$dbPath = '../db.sqLite';
$pdo = new PDO("sqlite:$dbPath");

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
$url = filter_input(INPUT_POST, 'url', FILTER_VALIDATE_URL);
if ($url === false) {
    header('Location: ../index.php?sucesso=0');
    exit();
}
$title = filter_input(INPUT_POST, 'titulo');
if ($url === false) {
    header('Location: ../index.php?sucesso=0');
    exit();
}

$query =  'UPDATE videos SET url = :url, title = :title WHERE id = :id;';

$statement = $pdo->prepare($query);
$statement->bindValue(':url', $url);
$statement->bindValue(':title', $title);
$statement->bindValue(':id', $id);

$statement->execute();

header('Location: ../index.php');