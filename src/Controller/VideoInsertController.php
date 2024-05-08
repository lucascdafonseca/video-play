<?php

namespace Project\Mvc\Controller;

use Project\Mvc\Entity\Video;
use Project\Mvc\Repository\VideoRepository;

class VideoInsertController
{


    private VideoRepository $repository;

    public function __construct(VideoRepository $repository)
    {
        $this->repository = $repository;
    }

    public function processRequest()
    {
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

        $this->repository->addVideo(new Video($url, $title));

        header('Location: /');
    }
}
