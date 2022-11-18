<?php

include $_ADMIN_PATH."/controllers/IngredientController.php";
include $_ADMIN_PATH."/controllers/RecipeController.php";


if(strpos($_SERVER['REQUEST_URI'], "/recipe/") !== false){

    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    
        if (count($_GET) == 0) {
            $recipes = RecipeController::getAll();
            $ingredients = IngredientController::getAll();
        }
        if (isset($_GET['recipeID'])){
            $showRecipe = RecipeController::showRecipe($_GET['recipeID']);
            $ingredients = IngredientController::getAll();

        }    

        if (isset($_GET['editRecipe'])) {
            RecipeController::update();
            $recipes = RecipeController::getAll();
            header("Location: ".$_OUTER_PATH."/pageManyToMany/views/recipe/showAll.php");
            die;
        }
        if (isset($_GET['delete'])){
            RecipeController::delete($_GET['id']);
            $recipes = RecipeController::getAll();
            header("Location: ".$_USER_PATH."/views/recipe/showAll.php");
            die;
        }
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        if (isset($_POST['createRecipe'])) {
            RecipeController::store();
            $recipes = RecipeController::getAll();
            header("Location: ".$_OUTER_PATH."/pageManyToMany/views/recipe/showAll.php");
            die;
        }


    }

}
?>