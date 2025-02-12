<?php

class Event {
    private int $id;
    private string $titre;
    private string $date;
    private string $lieu;
    private string $description;
    private string $etat;
    private float $prix;
    private int $capacite;
    private string $image;
    private Categorie $categorie;
    private array $reservations = [];
    private array $tags = [];
}