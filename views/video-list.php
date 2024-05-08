<?php require_once __DIR__ . '/html-header.php'; ?>

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