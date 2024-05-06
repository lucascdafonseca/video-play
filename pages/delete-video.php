<?php

$dbPath = '../db.sqLite';
$pdo = new PDO("sqlite:$dbPath");

$id = $_GET['id'];

$query = 'DELETE from videos WHERE id = ?;';
$preparedStatement = $pdo->prepare($query);
$preparedStatement->bindValue(1, $id);

$preparedStatement->execute();

header('Location: ../index.php');
