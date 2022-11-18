<?php

include $_ADMIN_PATH."/models/Recipe.php";

class RecipeController {

    public static function getAll()
    {
        return Recipe::all();
    }
    
    public static function showRecipe($id)
    {
        return Recipe::find($id);
    }

    public static function store()
    {
        Recipe::store();
    }

    public static function update()
    {
        $recipe = new Recipe();
        $recipe->id = $_GET['showRecipeID'];
        $recipe->recipeName = $_GET['name'];
        $recipe->ingredients = $_GET['ingredients'];
        $recipe->amount = array_values( array_filter($_GET['amounts']));
        $recipe->update();
    }

    public static function delete($id)
    {
        Recipe::delete($id);
    }

    // public static function addBrand()
    // {
    //     Brand::create();
    // }


    // public static function updateItem()
    // {
    //     $brand = New Brand();
    //     $brand->id = $_POST['brandID'];
    //     $brand->name = $_POST['name'];
    //     $brand->update();
    // }

    // public static function deleteBrand($id)
    // {
    //     Brand::destroy($id);
    // }

    // public static function search()
    // {
    //     return Item::search();
    // }

    // public static function getBrands()
    // {
    //     $brands = Item::getBrands();
    //     return $brands;
    // }

    // public static function filter()
    // {
    //     $items = Item::filter();
    //     return $items;
    // }



}
?>