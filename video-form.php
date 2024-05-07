<?php
$dbPath = __DIR__ . '/db.sqLite';
$pdo = new PDO("sqlite:$dbPath");

$video = [
    'url' => '',
    'title' => '',
];

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
if ($id !== false && $id !== null) {
    $query = 'SELECT * FROM  videos WHERE id = ?;';

    $prepared = $pdo->prepare($query);
    $prepared->bindValue(1, $id);
    $prepared->execute();
    $video = $prepared->fetch(PDO::FETCH_ASSOC);
}
?>

<?php require_once 'html-header.php'; ?>

<main class="container">

    <form class="container__formulario" method="post">
        <h2 class="formulario__titulo">Envie um vídeo!</h2>
        <div class="formulario__campo">
            <label class="campo__etiqueta" for="url">Link embed</label>
            <input name="url" class="campo__escrita" value="<?= $video['url']; ?>" required placeholder="Por exemplo: https://www.youtube.com/embed/FAY1K2aUg5g" id='url' />
        </div>


        <div class="formulario__campo">
            <label class="campo__etiqueta" for="titulo">Titulo do vídeo</label>
            <input name="titulo" class="campo__escrita" value="<?= $video['title']; ?>" required placeholder="Neste campo, dê o nome do vídeo" id='titulo' />
        </div>

        <input class="formulario__botao" type="submit" value="Enviar" />
    </form>

</main>

</body>

</html>