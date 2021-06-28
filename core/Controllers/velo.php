<?php

namespace Controllers;

class Velo extends Controller{

    protected $modelName = \Model\Velo::class;

    public function index()
    {
        $titreDeLaPage = "Exam velos-voyage";

        $velo = new $this->modelName;

        $velos = $velo->findAll();

           
        \Rendering::render('velos/velos', compact('titreDeLaPage', 'velos'));


    }

    public function show(){

        $velo_id = null;

        if(!empty($_GET['id']) && ctype_digit($_GET['id'])){
            $velo_id = $_GET['id'];
        }
        if(!$velo_id){
            die("il faut entrer un id...");
        }

        $velo= $this->model->find($velo_id, $this->modelName);

        $titreDeLaPage = $velo['modele'];

        $modelVoyage = new \Model\Voyage();

        $voyages = $modelVoyage->findAllByvelo($velo_id);
        
        \Rendering::render("velos/velo", compact('velo', 'titreDeLaPage', 'voyages'));
    }
    public function suppr(){

        $velo_id = null;

        if( !empty($_GET['id']) && ctype_digit ($_GET['id'])){
            $velo_id = $_GET['id'];  
        }
        if(!$velo_id){
            die("il faut entrer un id...");
        }

        $velo= $this->model->find($velo_id, $this->modelName);

        if(!$velo){
            die("Ce velo n'existe pas");
        }
        
        $this->model->delete($velo_id);
        \Http::redirect("index.php?controller=velo&task=index");

    }
    

}
