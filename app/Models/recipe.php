<?php

namespace App\Models;

class Recipe {
    private $id;
    private $createdAt;
    private $name;
    private $description;
    private $people;
    private $preparationTime;

    // Constructeur
    public function __construct($id, $createdAt, $name, $description, $people, $preparationTime) {
        $this->id = $id;
        $this->createdAt = $createdAt;
        $this->name = $name;
        $this->description = $description;
        $this->people = $people;
        $this->preparationTime = $preparationTime;
    }

    // Getters & setters
    public function getId() {
         return $this->id; 
        }
    public function getCreatedAt() { 
        return $this->createdAt;
     }
    public function getName() {
         return $this->name; 
        }
    public function getDescription() {
         return $this->description; 
        }
    public function getPeople() {
         return $this->people; 
        }
    public function getPreparationTime() {
         return $this->preparationTime; 
        }
    public function setId($id) {
         $this->id = $id; 
        }
    public function setCreatedAt($createdAt) {
         $this->createdAt = $createdAt; 
        }
    public function setName($name) {
         $this->name = $name; 
        }
    public function setDescription($description) {
         $this->description = $description; 
        }
    public function setPeople($people) {
         $this->people = $people; 
        }
    public function setPreparationTime($preparationTime) {
         $this->preparationTime = $preparationTime; 
        }
}
