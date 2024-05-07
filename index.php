<?php

if ($_SERVER['REQUEST_URI'] === '/') {
    require_once 'list-videos.php';
} else if ($_SERVER['PATH_INFO'] === '/new-video') {
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        require_once 'video-form.php';
    } else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        require_once 'pages/insert-video.php';
    }
} else if ($_SERVER['PATH_INFO'] === '/edit-video') {
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        require_once 'video-form.php';
    } else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        require_once 'pages/update-video.php';
    }
} else if ($_SERVER['PATH_INFO'] === '/remove-video') {
    require_once 'pages/delete-video.php';
}
