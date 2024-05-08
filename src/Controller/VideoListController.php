<?php

namespace Project\Mvc\Controller;

use Project\Mvc\Repository\VideoRepository;

class VideoListController implements IController
{
    private VideoRepository $repository;

    public function __construct(VideoRepository $videoRepository)
    {
        $this->repository = $videoRepository;
    }

    public function processRequest()
    {
        $videosArray = $this->repository->getAll();
        require_once __DIR__ . '/../../views/video-list.php';
    }
}
