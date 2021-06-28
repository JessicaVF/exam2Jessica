<?php

namespace Model;

class Voyage extends Model{

    protected $table = "voyages";

    function findAllByVelo(int $velo_id){
        
        $maRequete = $this->pdo->prepare("SELECT * FROM $this->table WHERE velo_id =:velo_id");
        $maRequete->execute(['velo_id' =>$velo_id]);
        $voyages = $maRequete->fetchAll();
        return $voyages;
    }  
    function insert(string $image, string $description, int $velo_id): void{
        
        $queryAdd = $this->pdo->prepare("INSERT INTO $this->table (image, description,velo_id) VALUES (:image, :description, :velo_id)");
        $queryAdd->execute(['image' =>$image, 'description' =>$description, 'velo_id' => $velo_id]);   
    }

    function edit(int $id, string $image, string $description): void{
        $queryEdit = $this->pdo->prepare("UPDATE $this->table SET image = :image, description = :description WHERE id=:id"); 
        $queryEdit->execute(['image' =>$image, 'description' =>$description, 'id'=>$id]);
    }


    // public function findNumberofVoyagePerVelo($velo_id){

    //     $maRequete = $this->pdo->prepare("SELECT * FROM $this->table WHERE velo_id =:velo_id");
    //     $maRequete->execute(['velo_id'=>$velo_id]);
    //     $voyages = $maRequete->rowCount();

    //     return $voyages;

    // }

}