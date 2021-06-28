<?php

namespace Controllers;

class Voyage extends Controller{

    protected $modelName = \Model\Voyage::class;

    public function suppr(){
        if(!empty($_GET['id']) && ctype_digit ($_GET['id'])){
            $voyage_id = $_GET['id'];
            $voyage= $this->model->find($voyage_id, $this->modelName);
            if(!$voyage){
                die("Ce $voyage n'existe pas");
            }
            $velo_id= $voyage['velo_id'];
            $this->model->delete($voyage_id);
            \Http::redirect("index.php?controller=velo&task=show&id=$velo_id");
        }
    }

    public function create(){
        
        $voyageACreer= false;
        $name = null;
        $description = null;
        
        if(!empty($_POST['description']) && !empty($_POST['image'])){
            $description = htmlspecialchars($_POST['description']);
            $image = htmlspecialchars($_POST['image']);
            $velo_id = $_POST['id'];
            $voyageACreer = true;
        } 
        
        if($voyageACreer){

            $this->model->insert($image, $description, $velo_id);
            \Http::redirect("index.php?controller=velo&task=show&id=$velo_id");

        }else{

            $modeEdition=false;

            if(!isset($_POST['creation'])){

                if( !empty($_POST['id']) && ctype_digit($_POST['id'])   ){
            
                    $voyage_id = $_POST['id'];
                    $modeEdition = true;
                }

            }
            
            if(!$modeEdition){

                $voyage = null;
                $titreDeLaPage = "nouveau voyage";
                \Rendering::render('voyages/create', compact('voyage', 'titreDeLaPage'));
            
            }else{ 
                
                $voyage = $this->model->find($voyage_id, $this->modelName);
                $nomVoyage = $voyage['description'];
                $titreDeLaPage = "Editer $nomVoyage";
                \Rendering::render('voyages/create', compact('voyage', 'titreDeLaPage'));

            }
            
        }
    }
    function edit(){
        
        if(!empty($_POST['imageEdit']) && !empty($_POST['descriptionEdit']) && !empty($_POST['id']) && ctype_digit($_POST['id'])){
            $image = htmlspecialchars($_POST['imageEdit']);
            $description = htmlspecialchars($_POST['descriptionEdit']);
            $id = $_POST['id'];
            $this->model->edit($id, $image, $description);
            $id = $_POST['id'];
            $velo_id = $_POST['velo_id'];
            \Http::redirect("index.php?controller=velo&task=show&id=$velo_id"); 
        }else{      
            die("formulaire mal rempli");
        }
    }
}