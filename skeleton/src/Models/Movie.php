<?php

namespace Models;

use Exception;
use PDO;

class Movie extends Database
{
    private $id;
    private $title;
    private $type;
    private $genre;
    private $rating;
    private $is_watched;
    private $created_at;

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($value)
    {
        if (empty($value)) throw new Exception('Title is required');
        if (strlen($value) < 1 && strlen($value) > 255) throw new Exception('Title must be between 1 and 255 characters');

        $this->title = htmlspecialchars($value);
    }

    public function getType(){
        return $this->type;
    }

    public function setType($value){
        if ($value != "film" || $value != "serie") throw new Exception('Type must be film or serie');
        
    }

    public function getRating(){
        return $this->rating;
    }

    public function setRating($value){
        if ($value < 1 || $value > 5 || $value !=Null) throw new Exception('Type must be between 1 and 5');
    }

    public function getAll()
	{
		$queryExecute = $this->db->prepare("INSERT INTO `movies`(`title`, `type`, `genre`, `rating`, `is_watched`, `created_at`) 
			VALUES (:title, :type, :genre, :rating, :is_watched, :created_at)");

        $queryExecute->bindValue(':title', $this->title, PDO::PARAM_STR);
		$queryExecute->bindValue(':type', $this->type, PDO::PARAM_STR);
		$queryExecute->bindValue(':genre', $this->genre, PDO::PARAM_STR);
        $queryExecute->bindValue(':rating', $this->rating, PDO::PARAM_STR);
		$queryExecute->bindValue(':is_watched', $this->is_watched, PDO::PARAM_STR);
		$queryExecute->bindValue(':created_at', $this->created_at, PDO::PARAM_STR);

		return $queryExecute->execute();
	}
}
