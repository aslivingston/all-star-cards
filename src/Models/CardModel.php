<?php

require_once 'src/Entities/Card.php';

class CardModel

{
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function getAllCards()
    {
        $query = $this->db->prepare('SELECT * FROM `cards` WHERE `deleted` = 0');
        $query->execute();
        $data = $query->fetchAll();
        return $data;
    }


    public function getCardById(string $id)
    {
        $query = $this->db->prepare('SELECT * FROM `cards` WHERE `id` = :id');
        $query->execute([
            ':id' => $id
        ]);
        $data = $query->fetch();
        if ($data === false) {
            return null;
        }
        return $this->hydrateSingleCard($data);
    }

    private function hydrateSingleCard(array $data): Card {
        return new Card ($data['id'], $data['first_name'], $data['last_name'], $data['release_year'], $data['brand'], $data['sport'], $data['value'], $data['img_link'], $data['deleted']);
    }

    public function registerCard($first_name, $last_name, $release_year = null, $brand = null, $sport = null, $value = null, $img_link = null) {

        $query = $this->db->prepare('INSERT INTO `cards` (`first_name`, `last_name`, `release_year`, `brand`, `sport`, `value`, `img_link`) VALUES (:first_name, :last_name, YEAR(:release_year), :brand, :sport, :value, :img_link)');
        $query->execute([
            ':first_name' => $first_name,
            ':last_name' => $last_name,
            ':release_year' => $release_year,
            ':brand' => $brand,
            ':sport' => $sport,
            ':value' => $value,
            ':img_link' => $img_link,
        ]);
    }

    public function removeCard($id): void
    {
        $query = $this->db->prepare('UPDATE `cards` SET `deleted` = 1 WHERE `id` = :id');
        $query->execute([
            ':id' => $id
        ]);
    }

    public function updateCard(int $id, string $first_name, string $last_name): void
    {

        $query = $this->db->prepare('UPDATE `cards` SET `first_name` = :first_name, `last_name` = :last_name WHERE `id` = :id');
        $query->execute([
            ':first_name' => $first_name,
            ':last_name' => $last_name,
            ':id' => $id
        ]);
    }

    public function getAllSports()
    {
        $query = $this->db->prepare('SELECT DISTINCT `sport` FROM `cards`;');
        $query->execute();
        $sports = $query->fetchAll();

        return $sports;
    }

    function getCardsBySport(string $sport)
    {
        $query = $this->db->prepare( 'SELECT * FROM `cards` WHERE `sport` = :sport;');
        $query->execute([
            ':sport' => $sport
        ]);
        $cards = $query->fetchAll();
        return $cards;
    }


}