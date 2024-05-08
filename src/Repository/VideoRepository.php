<?php

namespace Project\Mvc\Repository;

use PDO;
use Project\Mvc\Entity\Video;

class VideoRepository
{
    public function __construct(private PDO $pdo)
    {
    }

    public function addVideo(Video $video): bool
    {
        $query = 'INSERT INTO videos (url, title) VALUES (:url, :title);';
        $preparedStatement = $this->pdo->prepare($query);
        $preparedStatement->bindValue(':url', $video->url);
        $preparedStatement->bindValue(':title', $video->title);

        return $preparedStatement->execute();
    }

    public function updateVideo(Video $video): bool
    {
        $query =  'UPDATE videos SET url = :url, title = :title WHERE id = :id;';
        $statement = $this->pdo->prepare($query);
        $statement->bindValue(':url', $video->url);
        $statement->bindValue(':title', $video->title);
        $statement->bindValue(':id', $video->id);

        return $statement->execute();
    }

    public function getAll() : array
    {
        $query = 'SELECT * FROM  videos;';
        $resultSet = $this->pdo->query($query);
        $resultArray = $resultSet->fetchAll(PDO::FETCH_ASSOC);

        $videoList = array_map(function($videoData){
            $video = new Video(
                $videoData['url'], 
                $videoData['title']);
                $video->setId($videoData['id']);
                return $video;
        }, $resultArray);

        return $videoList;
    }

    public function deleteVideo(int $id) : bool
    {
        $query = 'DELETE from videos WHERE id = ?;';
        $preparedStatement = $this->pdo->prepare($query);
        $preparedStatement->bindValue(1, $id);

        return $preparedStatement->execute();
    }

    public function findById(int $id) : Video
    {
        $query = 'SELECT * FROM  videos WHERE id = ?;';

        $prepared = $this->pdo->prepare($query);
        $prepared->bindValue(1, $id);
        $prepared->execute();
        $videoData = $prepared->fetch(PDO::FETCH_ASSOC);
        $video = new Video($videoData['url'], $videoData['title']);
        $video->setId($videoData['id']);

        return $video;
    }
}
