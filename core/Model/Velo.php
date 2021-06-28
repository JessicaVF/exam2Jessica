<?php
namespace Model;

class Velo extends Model{
    protected $table = "velos";
    protected $id;

    public function getVoyages($id){
    
        $modelVoyage = new \Model\Voyage();
        $voyages = $modelVoyage ->findAllByVelo($this->id);
        return $voyages;
    }
    function edit(int $id, string $image, string $description): void{
        $queryEdit = $this->pdo->prepare("UPDATE $this->table SET image = :image, description = :description WHERE id=:id"); 
        $queryEdit->execute(['image' =>$image, 'description' =>$description, 'id'=>$id]);
    }
    
}