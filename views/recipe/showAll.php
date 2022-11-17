<?php include "../components/head.php"; ?>

<body>
    <?php include "../components/navigation.php"; ?>

    <div class="container">
        <div class="row">
            <!-- <div class="col-2">
                <?php //include $_ADMIN_PATH . "/views/components/filter.php"; ?>
            </div> -->
            <div class="col-12">
                <div class="row">
                    <?php foreach($recipes as $recipe){ ?>
                        <div class="recipe d-inline col-4 mt-3 mb-3">
                            <a href = <?=$_USER_PATH."/views/recipe/show.php?recipeID=".$recipe->id?>>
                                <div class="recipeName">
                                    <h1>
                                        <?php echo $recipe->recipeName;?>    
                                    </h1>
                                </div>
                                <div class="recipeBrand">
                                    <ol>
                                        <h6>
                                            Reikes:
                                        </h6>
                                        <?php foreach ($recipe->ingredients as $ingredient) { ?>
                                           <li> <?=$ingredient->name . " " .$ingredient->amount . " g."?> </li> 
                                       <?php } ?>
                                    </ol>
                                </div>
                            </a>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

