<h1> Exam Velos-Voyages <h1>
<div class="row">

    <?php foreach($velos as $velo){ ?>

        <div class="card m-5" style="width: 18rem;">
            <img src="<?php echo $velo['image']?>" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title"><?php echo $velo['modele']?></h5>
                <p class="card-text"><?php echo "les voyages"?></p>
                <a href="index.php?controller=velo&task=show&id=<?php echo $velo['id'] ?>" class="btn btn-primary">Check ce velo</a>
                
        <a href ="index.php?controller=velo&task=suppr&id=<?php echo $velo['id'] ?>" class="btn btn-danger">supprimer ce velo</a>
        </div>
        </div>
    <?php } ?>
</div>