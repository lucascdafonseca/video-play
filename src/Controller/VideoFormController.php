<?php

namespace Project\Mvc\Controller;

use Project\Mvc\Repository\VideoRepository;

class VideoFormController implements IController
{
    private VideoRepository $repository;

    public function __construct(VideoRepository $repository)
    {
        $this->repository = $repository;
    }

    public function processRequest()
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        $video = null;
        if ($id !== false && $id !== null) {
            $video = $this->repository->findById($id);
        }
        require_once __DIR__ . '/../../views/video-form.php';
    }
}
