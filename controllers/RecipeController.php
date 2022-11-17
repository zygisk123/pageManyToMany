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