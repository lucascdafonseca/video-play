<?php

namespace Project\Mvc\Controller;

use Project\Mvc\Repository\VideoRepository;

class VideoFormController
{

    private VideoRepository $repository;

    public function __construct(VideoRepository $repository)
    {
        $this->repository = $repository;
    }

    public function processRequest()
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        if ($id !== false && $id !== null) {
            $videoToEdit = $this->repository->findById($id);
        }

        require_once __DIR__ . '/../../html-header.php'; ?>

        <main class="container">

            <form class="container__formulario" method="post">
                <h2 class="formulario__titulo">Envie um vídeo!</h2>
                <div class="formulario__campo">
                    <label class="campo__etiqueta" for="url">Link embed</label>
                    <input name="url" class="campo__escrita" value="<?= $videoToEdit->url; ?>" required placeholder="Por exemplo: https://www.youtube.com/embed/FAY1K2aUg5g" id='url' />
                </div>
                <div class="formulario__campo">
                    <label class="campo__etiqueta" for="titulo">Titulo do vídeo</label>
                    <input name="titulo" class="campo__escrita" value="<?= $videoToEdit->title; ?>" required placeholder="Neste campo, dê o nome do vídeo" id='titulo' />
                </div>
                <input class="formulario__botao" type="submit" value="Enviar" />
            </form>
        </main>
        </body>

        </html>
<?php
    }
}
