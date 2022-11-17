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

            // $items = RecipeController::getAll();
        }    
        // if (isset($_GET['goToEdit'])){
        //     $item = ItemController::showItem($_GET['showItemID']);
        // }
        // if (isset($_GET['delete'])){
        //     $item = ItemController::deleteItem($_GET['id']);
        //     $items = ItemController::getAll();
        //     header("Location: ".$_USER_PATH."/views/shop/showAll.php");
        //     die;
        // }
        // if (isset($_GET['search'])){
        //     $searchItems = ItemController::search();
        //     $items = ItemController::getAll();
        // }
        // if (isset($_GET['filter'])){
        //     // $_GET['filterByBrand'] = explode(",",$_GET['filterByBrand']);
        //     // // print_r($_GET["filterByBrand"]);
        // //    echo ($_GET['filterByBrand']);
           
        //     $items = ItemController::filter();
        // }
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