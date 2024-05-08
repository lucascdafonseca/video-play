<?php

namespace Project\Mvc\Entity;

use InvalidArgumentException;

class Video
{
    public readonly int $id;
    public readonly string $url;

    public function __construct(string $url, public readonly string $title)
    {
        $this->setUrl($url);
    }

    private function setUrl(string $url)
    {
        if (!filter_var($url, FILTER_VALIDATE_URL)) {
            throw new InvalidArgumentException("Invalid URL");
        }

        $this->url = $url;
    }

    public function setId(int $id)
    {
        $this->id = $id;
    }
}
