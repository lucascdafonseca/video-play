<?php

$dbPath = __DIR__ . '/db.sqLite';
$pdo = new PDO("sqlite:$dbPath");
//$pdo->exec('CREATE TABLE videos(id INTEGER PRIMARY KEY, url TEXT, title TEXT)');
$pdo->exec('DELETE FROM videos');