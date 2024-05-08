<?php

require_once __DIR__ . '/../vendor/autoload.php';

if ($_SERVER['REQUEST_URI'] === '/') {
    require_once __DIR__ . '/../list-videos.php';
} else if ($_SERVER['PATH_INFO'] === '/new-video') {
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        require_once __DIR__ . '/../video-form.php';
    } else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        require_once __DIR__ . '/..//insert-video.php';
    }
} else if ($_SERVER['PATH_INFO'] === '/edit-video') {
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        require_once __DIR__ . '/../video-form.php';
    } else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        require_once __DIR__ . '/../update-video.php';
    }
} else if ($_SERVER['PATH_INFO'] === '/remove-video') {
    require_once __DIR__ . '/../delete-video.php';
} else {
    http_response_code(404);
}
