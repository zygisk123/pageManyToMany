<?php

include $_ADMIN_PATH . "/models/DB.php";

class Ingredient{
    public $id;
    public $name;
    public $recipe;
    public $amount;

    public function __construct($id = null, $name = null)
    {
        $this->id = $id;
        $this->name = $name;

    }

    public static function all()
    {
        $ingredients = [];
        $db = New DB();
        $query = "select * from `ingredients`";
        $result = $db->conn->query($query);
    
        while ($row = $result->fetch_assoc()) {
            $ingredients[] = New Ingredient($row['id'], $row['name']);
        }
        $db->conn->close();
        return $ingredients;
    }

    public static function findByRecipe($id)
    {
        $ingredients = [];
        $db = new DB();
        $query = "SELECT `i`.`id`, `i`.`name`, `ir`.`amount` FROM `ingredients_recipes` `ir` JOIN `ingredients` `i` ON `i`.`id` = `ir`.`ingredient_id` JOIN `recipes` `r` ON `r`.`id` = `ir`.`recipe_id` WHERE `r`.`id` =" . $id;
        $result = $db->conn->query($query);

        while($row = $result->fetch_assoc()){
            $ingredient = new Ingredient( $row['id'], $row['name']);
            $ingredient->amount = $row['amount'];
            //$ingredient->model = HiveModelController::show($row['hive_model_id']);
            $ingredients[] = $ingredient;
        }
        $db->conn->close();
        return $ingredients;
    }
}

?>