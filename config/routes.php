<?php

return [
    'GET|/' => \Project\Mvc\Controller\VideoListController::class,
    'GET|/new-video' => \Project\Mvc\Controller\VideoFormController::class,
    'POST|/new-video' => \Project\Mvc\Controller\VideoInsertController::class,
    'GET|/edit-video' => \Project\Mvc\Controller\VideoFormController::class,
    'POST|/edit-video' => \Project\Mvc\Controller\VideoUpdateController::class,
    'GET|/remove-video' => \Project\Mvc\Controller\VideoDeleteController::class
];