<?php

include $_ADMIN_PATH."/models/Ingredient.php";
// include $_ADMIN_PATH."/helperClasses/Validator.php";

class IngredientController {

    public static function getAll()
    {
        return Ingredient::all();
    }

    public static function findByRecipe($id)
    {
        return Ingredient::findByRecipe($id);
    }
    // public static function addItem()
    // {   
    //     if (Validator::validate()) {
    //         header("Location:" . "http://".$_SERVER['SERVER_NAME']."/shop/views/shop/add.php");
    //         die;
    //     }
    //     Item::create();
    // }

    // public static function showItem($id)
    // {
    //     return Item::find($id);
    // }

    // public static function updateItem()
    // {
    //     if (Validator::validateEdit()) {
    //         header("Location:" . "http://".$_SERVER['SERVER_NAME']."/shop/views/shop/edit.php");
    //         die;
    //     }
    //     $item = New Item();
    //     $item->id = $_POST['id'];
    //     $item->name = $_POST['name'];
    //     $item->price = $_POST['price'];
    //     $item->size = $_POST['size'];
    //     $item->about = $_POST['about'];
    //     $item->brandID = $_POST['brand'];
    //     $item->update();
    // }

    // public static function deleteItem($id)
    // {
    //     Item::destroy($id);
    // }

    // public static function search()
    // {
    //     return Item::search();
    // }

    // public static function filter()
    // {
    //     if (Validator::validateFilter()) {
    //         header("Location:" . "http://".$_SERVER['SERVER_NAME']."/shop/views/shop/showAll.php");
    //         die;
    //     }
    //     $items = Item::filter();
    //     return $items;
    // }



}
?>