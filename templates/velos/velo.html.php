
<br>
<a href="index?controller=velo&task=index" class="btn btn-primary">Back to the index</a>
<div class="row">
    <div class="card m-5" style="width: 18rem;">
        <img src="<?php echo $velo['image']?>" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title"><?php echo $velo['modele']?></h5>
            <a href ="index.php?controller=velo&task=suppr&id=<?php echo $velo['id'] ?>" class="btn btn-danger">supprimer ce velo</a>    
            
        
        </div>
    </div>
</div>
<hr>

<form action="index.php?controller=voyage&task=create" method="POST">
            <input type="hidden"  name="creation">
            <button type="submit" name="velo_id" value="<?php echo $velo['id'] ?>" class="btn btn-success">Add a voyage</button>
</form>
<div class="row">

    <?php foreach($voyages as $voyage){ ?>

        <div class="card m-5" style="width: 18rem;">
            <img src="<?php echo $voyage['image']?>" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title"><?php echo $voyage['description']?></h5>
                <form action="index.php?controller=voyage&task=create" method="POST">
                    <input type="hidden" name="velo_id" value="<?php echo $velo['id'] ?>">
                    <button type="submit" name="id" value="<?php echo $voyage['id'] ?>" class="btn btn-warning">Modifier ce voyage</button>
                </form>
                <br>
                <a href ="index.php?controller=voyage&task=suppr&id=<?php echo $voyage['id'] ?>" class="btn btn-danger">supprimer ce voyage</a>    


        </div>
        </div>
    <?php } ?>
</div>