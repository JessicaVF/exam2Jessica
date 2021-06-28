<?php 


if (!$voyage) {?>
<br>
    <div class="container">
        
        <form class="form" action="index.php?controller=voyage&task=create" method="POST">
            <div class="form-group">
                <textarea name="description" placeholder="description du voyage" id="" cols="30" rows="10"></textarea>
            </div>
            <div class="form-group">
                <textarea name="image" placeholder="url d'image du voyage" id="" cols="30" rows="10"></textarea>
            </div>
            <input type="hidden" name="id" value="<?php echo $_POST['velo_id']?>">
            <div class="form-group">
            <button class="btn btn-success" type="submit">Envoyer</button>
        </div>

        </form>
    </div>

<?php }else{ ?>
    <br>
    <div class="container">
        <form class="form" action="index.php?controller=voyage&task=edit" method="POST">
            
            <input type="hidden" name="velo_id" value="<?php echo $_POST['velo_id']?>">
            <input type="hidden" name="id" value="<?php echo $voyage['id']?>">
            <div class="form-group">
                <textarea name="descriptionEdit"cols="30" rows="10"><?php echo $voyage['description']?></textarea>
            </div>
            <div class="form-group">
                <textarea name="imageEdit"cols="30" rows="10"><?php echo $voyage['image']?></textarea>
            </div>
            <div 
                <div class="form-group"><button class="btn btn-success" type="submit">Enregistrer les modifs</button>
            </div>
        </form>
    </div>
    

<?php }?>
<hr>
<a class="btn btn-secondary" href="index.php?controller=velo&task=show&id=<?php echo $_POST['velo_id']?>">Cancel</a>
<a class="btn btn-primary" href="index.php?controller=velo&task=index">Back to home</a>
<br>
<br>