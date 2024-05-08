<?php

namespace Project\Mvc\Controller;

use Project\Mvc\Repository\VideoRepository;

class VideoDeleteController
{
    private VideoRepository $repository;

    public function __construct(VideoRepository $repository)
    {
        $this->repository = $repository;
    }

    public function processRequest()
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        $this->repository->deleteVideo($id);
        header('Location: /');
    }
}
