<?php 
include "../components/head.php"; 

$old = false;
if (isset($_SESSION['POST'])) {
    if (count($_SESSION['POST']) != 0) {
        $old = true;
    }
}

?>

<body>
    <?php include "../components/navigation.php"; ?>
    <div class="container">
        <div class="row">
            <div class="col-4"></div>
            <div class="col-4">
                <form method = 'post'>
                    <div class="mb-3">
                        <label for="itemName" class="form-label">Recipe Name</label>
                        <input name = "name" id="itemName" value="<?=($old)? $_SESSION['POST']['name'] : "" ?>" type="text" class="form-control">
                    </div>

                    <?php 
                    foreach ($ingredients as $key => $i) {?>
                    <div class="row mb-2">
                        <div class="col-6">
                            <label for="i<?=$key?>"><?=$i->name?></label>
                            <input type="checkbox" name="ingredients[]" value="<?=$i->id?>" id="i<?=$key?>"><br>                
                        </div>
                        <div class="col-6">
                            <input name = "amounts[]" value="<?=($old)? $_SESSION['POST']['amounts'] : "" ?>" type="number" step= ".01" class="form-control">
                        </div>
                    </div>
                    <?php } ?>

                    <button type="submit" class="btn btn-primary" name = 'createRecipe'>Submit</button>
                </form>
            </div>
            <div class="col-4"></div>
        </div>
    </div>
    <?php include $_ADMIN_PATH . "/views/components/bottom.php"; ?>
</body>
</html>

<?php
$_SESSION['POST'] = [];
?>