<?php

readonly class Card {
    public int $id;

    public string $first_name;

    public string $last_name;

    public int $release_year;

    public string $brand;

    public string $sport;

    public float $value;

    public string $img_link;

    public int $deleted;

    public string $logo;

    public function __construct(int $id, string $first_name, string $last_name, int $release_year, string $brand, string $sport, float $value, string $img_link, int $deleted, string $logo)
    {
        $this->id = $id;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->release_year = $release_year;
        $this->brand = $brand;
        $this->sport = $sport;
        $this->value = $value;
        $this->img_link = $img_link;
        $this->deleted = $deleted;
        $this->logo = $logo;
    }

    public function getId(): int
    {
        return $this->id;
    }




}
