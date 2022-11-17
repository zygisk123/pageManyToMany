<?php include "../components/head.php"; 

?>
<body>
    <?php include "../components/navigation.php"; ?>
    <div class="container">
        <div class="row">
            <div class="col-4"></div>
            <div class="col-4">
                <div class="name">
                    <h1>
                        <?=$showRecipe->recipeName?>
                    </h1>
                </div>
                <?php 
                $amountID = -1;
                foreach ($ingredients as $key => $i) {
                        echo "KEY: " . $key ."<br>";
                        
                        $checked = "";
                        foreach ($showRecipe->ingredients as  $ri) {
                            if($i->id == $ri->id){
                             $checked = "checked";
                             $amountID++;
                             break;
                            }
                         }?>
                        <div class="row mb-2">
                            <div class="col-6">
                                <label for="i<?=$key?>"><?=$i->name?></label>
                                <input type="checkbox" <?=$checked?> name="ingredients[]" value="<?=$i->id?>" id="i<?=$key?>"><br>                
                            </div>
                            <div class="col-6">
                                <input name = "amounts[]" value="<?=($checked != "") ? $showRecipe->ingredients[$amountID]->amount: ""?>" type="number" step= ".01" class="form-control">
                            </div>
                        </div>
                <?php } ?>
                <div class="row mt-3">
                    <div class="col-6">
                        <form action="<?=$_USER_PATH.'/views/recipe/edit.php'?>" method="get">
                            <input type="hidden" name="showRecipeID" value="<?=$showRecipe->id?>">
                            <button type="submit" name="goToEdit" class="btn btn-primary">Edit</button>
                        </form>
                    </div>
                    <div class="col-6">
                        <form action="<?=$_USER_PATH.'/views/recipe/showAll.php'?>" method="get">
                            <input type="hidden" name="id" value="<?=$showRecipe->id?>">
                            <button type="submit" name="delete" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-4"></div>
        </div>
    </div>
    <?php include $_ADMIN_PATH . "/views/components/bottom.php"; ?>
</body>
</html>
