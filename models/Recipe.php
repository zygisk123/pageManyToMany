<?php

class Recipe {
    public $id;
    public $recipeName;
    public $ingredients;
    public $amount;

    public function __construct($id = null, $recipeName = null)
    {
        $this->id = $id;
        $this->recipeName = $recipeName;
    }

    public static function all()
    {
        $recipes = [];
        $db = new DB();
        $query = "Select * from `recipes`";
        $result = $db->conn->query($query);

        while($row = $result->fetch_assoc()){
            $recipe = new Recipe( $row['id'], $row['recipe_name']);
            $recipe->ingredients = IngredientController::findByRecipe($row['id']);
            $recipes[] = $recipe;
        }
        $db->conn->close();

        return $recipes;
    }

    public static function find($id)
    {
        $recipe = new Recipe();
        $db = new DB();
        $query = "SELECT `r`.`id`, `r`.`recipe_name`, `ir`.`amount` FROM `recipes` `r` JOIN `ingredients_recipes` `ir` ON `ir`.`recipe_id` = `r`.`id` WHERE `r`.`id` = ". $id;
        $result = $db->conn->query($query);

        while($row = $result->fetch_assoc()){
            $recipe = new Recipe( $row['id'], $row['recipe_name']);
            $recipe->amount = $row['amount'];
            $recipe->ingredients = IngredientController::findByRecipe($row['id']);
        }
        $db->conn->close();
        return $recipe;
    }

    public static function store()
    {
        $db = new DB();
        $query = "INSERT INTO `recipes`(`recipe_name`) VALUES (?)";
        $stmt = $db->conn->prepare($query);
        $stmt->bind_param("s", $_POST['name']);
        if(!$stmt->execute()) {
            print_r( $stmt->error_list);
        }
        $recipeId = $stmt->insert_id;
        $ingredientAmount = array_values( array_filter($_POST['amounts']) );
        foreach ($_POST['ingredients'] as $key => $ingredient) {       
            $stmt = $db->conn->prepare("INSERT INTO `ingredients_recipes`(`ingredient_id`, `recipe_id`, `amount`) VALUES (?, ?, ?)");
            $stmt->bind_param("iid", $ingredient, $recipeId, $ingredientAmount[$key]);
            if(!$stmt->execute()) {
                print_r( $stmt->error_list);
            }
        }
        $stmt->close();
        $db->conn->close();
    }

    public function update()
    {
        $db = new DB();
        $stmt = $db->conn->prepare("UPDATE `recipes` SET `recipe_name`= ? WHERE `id` = ?");
        $stmt->bind_param("si", $_GET['name'],  $_GET['showRecipeID']);
        if(!$stmt->execute()) {
            print_r( $stmt->error_list);
        }

        $query = "delete from `ingredients_recipes` where `recipe_id` = ".$this->id;
        $db->conn->query($query);
        $ingredientAmount = array_values( array_filter($_GET['amounts']) );
        foreach ($_GET['ingredients'] as $key => $ingredient) {         
            $stmt = $db->conn->prepare("INSERT INTO `ingredients_recipes`(`ingredient_id`, `recipe_id`, `amount`) VALUES (?, ?, ?)");
            $stmt->bind_param("iid", $ingredient, $this->id, $ingredientAmount[$key]);
            if(!$stmt->execute()) {
                print_r( $stmt->error_list);
            }
        }


        $stmt->close();
        $db->conn->close();
    }

    public static function delete($id)
    {
        $db = new DB();
        $query = "delete from `ingredients_recipes` where `recipe_id` = ".$id;
        $db->conn->query($query);



        $stmt = $db->conn->prepare("DELETE FROM `recipes` WHERE `id` = ?");
        $stmt->bind_param("i", $_GET['id']);
        $stmt->execute();
 
        $stmt->close();
        $db->conn->close(); 
    }
}
?>