<?php

use Project\Mvc\Repository\VideoRepository;

$dbPath = __DIR__ . '/db.sqLite';
$pdo = new PDO("sqlite:$dbPath");

$repository = new VideoRepository($pdo);
$videosArray = $repository->getAll();
?>
<!DOCTYPE html>
<html lang="pt-br">

<?php require_once 'html-header.php'; ?>

    <ul class="videos__container" alt="videos Project">
        <?php foreach ($videosArray as $video) : ?>
            <li class="videos__item">
                <iframe width="100%" height="72%" src="<?= $video->url ?>" title="<?= $video->title ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <div class="descricao-video">
                    <img src="./img/logo.png" alt="logo">
                    <h3><?= $video->title ?></h3>
                    <div class="acoes-video">
                        <a href="/edit-video?id=<?= $video->id ?>">Editar</a>
                        <a href="/remove-video?id=<?= $video->id ?>">Excluir</a>
                    </div>
                </div>
            </li>
        <?php endforeach; ?>
    </ul>
</body>

</html>