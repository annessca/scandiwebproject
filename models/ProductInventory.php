<?php 
abstract class ProductInventory {
    public $db_connect;
    public $table = 'sampleproducts';

    public $id, $sku, $name, $price, $metrics, $type;
    public $size, $weight, $height, $width, $length;
    public $errors = array();

    public function __construct($scandiwebDB) {
        $this->db_connect = $scandiwebDB;
    }

    protected function postProduct(){}

    public function getProducts() {
        $query = 'SELECT 
            id, sku, name, price, type, metrics
        FROM
            ' .$this->table;
        $statement = $this->db_connect->prepare($query);
        $statement->execute();
    }
/*
    public function validateName($namedata) {

        if (!preg_match ("/^[a-zA-z]*$/", $namedata) ) {  
            array_push($this->errors, "Please, provide the data of indicated type.");  
        } else if (empty($data)){  
            array_push($this->errors, "Please, submit required data.");
        } else {  
            $namedata = trim(htmlspecialchars(strip_tags($namedata)));
            return $namedata;  
        }

    }

    public function validateAlphanumeric($skudata){
    
        if (!preg_match ("/^[A-Za-z0-9_]+$/", $skudata)) {
            array_push($this->errors, "Please, provide the data of indicated type."); 
        }else if (empty($skudata)){  
            array_push($this->errors, "Please, submit required data.");
        } else {  
            $skudata = trim(htmlspecialchars(strip_tags($skudata)));
            return $skudata;  
        }

    }

    public function validateFloat($pricedata){

        if (filter_var($pricedata, FILTER_VALIDATE_FLOAT) === false) {
            array_push($this->errors, "Please, provide the data of indicated type.");
        }else if (empty($pricedata)){  
            array_push($this->errors, "Please, submit required data.");
        } else {  
            $pricedata = trim(htmlspecialchars(strip_tags($pricedata)));
            return $pricedata;  
        }

    }

    public function validateNumber($metricsdata){

        if (filter_var($metricsdata, FILTER_VALIDATE_INT) === false) {
            array_push($this->errors, "Please, provide the data of indicated type.");
        }else if (empty($metricsdata)){  
            array_push($this->errors, "Please, submit required data.");
        } else {  
            $metricsdata = trim(htmlspecialchars(strip_tags($metricsdata)));
            return $metricsdata;  
        }

    }*/

    public function confirmProductDuplication() {

        // Confirm if the product already exists
        $sku_query = 'SELECT * FROM ' . $this->table .' WHERE `sku` = :sku LIMIT 1';

        $statement = $this->db_connect->prepare($sku_query);
        $statement->bindParam(':sku', $this->sku, PDO::PARAM_STR);
        $statement->execute();

        return $statement->fetch(PDO::FETCH_ASSOC);
    }
}
class ProcessProduct extends ProductInventory {
    public function postProduct(){
        if ($this->confirmProductDuplication()) {
            if ($this->confirmProductDuplication() === $this->sku) {
                array_push($this->errors, "The Product Already Exists");
            }
        }

        $queryString = 'INSERT INTO ' . $this->table . ' SET sku = :sku, name = :name, price = :price, type = :type, metrics = :metrics';

        $stmt = $this->db_connect->prepare($queryString);
        $this->sku = htmlspecialchars(strip_tags($this->sku));
        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->price = htmlspecialchars(strip_tags($this->price));
        $this->type = htmlspecialchars(strip_tags($this->type));

        $this->size = htmlspecialchars(strip_tags($this->size));
        $this->weight = htmlspecialchars(strip_tags($this->weight));
        $this->height = htmlspecialchars(strip_tags($this->height));
        $this->width = htmlspecialchars(strip_tags($this->width));
        $this->length = htmlspecialchars(strip_tags($this->length));
        $this->metrics =  "{$this->height} x {$this->width} x {$this->length}";
/*
        $this->sku = $this->validateAlphanumeric($this->sku);
        $this->name = $this->validateName($this->name);
        $this->price = $this->validateFloat($this->price);
        $this->type = htmlspecialchars(strip_tags($this->type));
        
        $this->size = $this->validateNumber($this->size);
        $this->weight = $this->validateNumber($this->weight);
        $this->height = $this->validateNumber($this->height);
        $this->width = $this->validateNumber($this->width);
        $this->length = $this->validateNumber($this->length);
*/
        $stmt->bindParam(':sku', $this->sku);
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':price', $this->price);
        $stmt->bindParam(':type', $this->type);
    
        $this->type === "DVD" ? $stmt->bindParam(':metrics', $this->size) : ($this->type === "Book" ? $stmt->bindParam(':metrics', $this->weight) : $stmt->bindParam(':metrics', $this->metrics));

        // Execute query
        if($stmt->execute()) {
            return true;
        }

        // Print error if something goes wrong
        printf("Error: %s.\n", $stmt->error);

        return false;
    }

}
