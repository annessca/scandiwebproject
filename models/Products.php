<?php 
abstract class Product {
    private $db_connect;
    private $table = 'sampleproducts';

    private $id;
    private $sku;
    private $name;
    private $price;
    private $type;
    
    public $metrics;
    public $errors = array(); 

    public function __construct($scandiwebDB) {
        $this->db_connect = $scandiwebDB;
    }

    abstract protected function postProduct();

    public function getProducts() {
        $query = 'SELECT 
                    id, sku, name, price, type, metrics
                FROM
                    ' .$this->table;
        $statement = $this->db_connect->prepare($query);
        $statement->execute();
    }

    public function confirmProductDuplication() {
        //Confirm if the product already exists
        $sku_query = 'SELECT * FROM ' . $this->table .' WHERE `sku` = :sku LIMIT 1';

        $statement = $this->db_connect->prepare($sku_query);
        $statement->bindParam(':sku', $this->sku, PDO::PARAM_STR);
        $statement->execute();

        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function setSKU($unique_sku) {
        if (!is_string($unique_sku)){
            array_push($this->errors, "Please, provide a STRING type for SKU");
        } elseif (empty($unique_sku)){
            array_push($this->errors, "Please, submit required SKU data");
        }
        $this->sku = htmlspecialchars(strip_tags($unique_sku));
    }

    public function setName($prod_name) {
        if (!is_string($prod_name)){
            array_push($this->errors, "Please, provide a STRING type for NAME");
        } elseif (empty($prod_name)){
            array_push($this->errors, "Please, submit required NAME data");
        }
        $this->name = htmlspecialchars(strip_tags($prod_name));
    }

    public function setPrice($prod_price) {
        if (!is_float($prod_price)){
            array_push($this->errors, "Please, provide a FLOAT type for PRICE");
        } elseif (empty($prod_price)){
            array_push($this->errors, "Please, submit required PRICE data");
        }
        $this->price = htmlspecialchars(strip_tags($prod_price));
    }

    public function setType($select_type) {
        $this->type = htmlspecialchars(strip_tags($select_type));
    }

    public function getTable() {
        return $this->table;
    }

    public function getConnection() {
        return $this->db_connect;
    }

    public function getSKU() {
        return $this->sku;
    }

    public function getName() {
        return $this->name;
    }

    public function getPrice() {
        return $this->price;
    }

    public function getType() {
        return $this->type;
    }

    public function countErrors($select_type) {
        $this->type = htmlspecialchars(strip_tags($select_type));
    }
}


class DVD extends Product {
    public function __construct($scandiwebDB, $size) {
        parent::__construct($scandiwebDB);
        if(!is_int($size)) {
            array_push($this->errors, "Please, provide an INTEGER type for SIZE");
        } elseif (empty($size)){
            array_push($this->errors, "Please, submit required SIZE data");
        }
        $this->metrics = htmlspecialchars(strip_tags($size));
    }

    public function postProduct(){
        if ($this->confirmProductDuplication()) {
            if ($this->confirmProductDuplication() === $this->getSKU()) {
                array_push($this->errors, "The Product Already Exists");
            }
        }

        if (count($this->errors) == 0) {
            $queryString = 'INSERT INTO ' . $this->getTable() . ' SET sku = :sku, name = :name, price = :price, type = :type, metrics = :metrics';

            // Prepare statement
            $statement = $this->getConnection()->prepare($queryString);

            // Bind data
            $statement->bindParam(':sku', $this->getSKU());
            $statement->bindParam(':name', $this->getName());
            $statement->bindParam(':price', $this->getPrice());
            $statement->bindParam(':type', $this->getType());
            $statement->bindParam(':metrics', $this->metrics);

            // Execute query
            if($statement->execute()) {
                return true;
            }
            // Print error if something goes wrong
            printf("Error: %s.\n", $statement->error);

            return false;
        }
        
    }
}

class Book extends Product {
    public function __construct($scandiwebDB, $weight) {
        parent::__construct($scandiwebDB);
        if(!is_int($weight)) {
            array_push($this->errors, "Please, provide an INTEGER type for WEIGHT");
        } elseif (empty($weight)){
            array_push($this->errors, "Please, submit required WEIGHT data");
        }
        $this->metrics = htmlspecialchars(strip_tags($weight));
    }

    public function postProduct(){
        if ($this->confirmProductDuplication()) {
            if ($this->confirmProductDuplication() === $this->getSKU()) {
                array_push($this->errors, "The Product Already Exists");
            }
        }

        if (count($this->errors) == 0) {
            $queryString = 'INSERT INTO ' . $this->getTable() . ' SET sku = :sku, name = :name, price = :price, type = :type, metrics = :metrics';

            // Prepare statement
            $statement = $this->getConnection()->prepare($queryString);

            // Bind data
            $statement->bindParam(':sku', $this->getSKU());
            $statement->bindParam(':name', $this->getName());
            $statement->bindParam(':price', $this->getPrice());
            $statement->bindParam(':type', $this->getType());
            $statement->bindParam(':metrics', $this->metrics);

            // Execute query
            if($statement->execute()) {
                header('Location: index.php/');
                exit;
            }
            // Print error if something goes wrong
            printf("Error: %s.\n", $statement->error);

            return false; 
        }
        
    }
}

class Furniture extends Product {
    public function __construct($scandiwebDB, $height, $width, $length) {
        parent::__construct($scandiwebDB);
        $height = htmlspecialchars(strip_tags($height));
        $width = htmlspecialchars(strip_tags($width));
        $length = htmlspecialchars(strip_tags($length));
        if(!is_int($height)) {
            array_push($this->errors, "Please, provide an INTEGER type for HEIGHT");
        } elseif (empty($size)){
            array_push($this->errors, "Please, submit required HEIGHT data");
        }elseif (!is_int($width)) {
            array_push($this->errors, "Please, provide an INTEGER type for WIDTH");
        }elseif (empty($width)) {
            array_push($this->errors, "Please, submit required WIDTH data");
        }elseif (!is_int($length)) {
            array_push($this->errors, "Please, provide an INTEGER type for LENGTH");
        }elseif (empty($length)) {
            array_push($this->errors, "Please, submit required LENGTH data");
        }
        $this->metrics = "{$height}x{$width}x{$length}";
        
    }

    public function postProduct(){
        if ($this->confirmProductDuplication()) {
            if ($this->confirmProductDuplication() === $this->getSKU()) {
                array_push($this->errors, "The Product Already Exists");
            }
        }

        if (count($this->errors) == 0) {
            $queryString = 'INSERT INTO ' . $this->getTable() . ' SET sku = :sku, name = :name, price = :price, type = :type, metrics = :metrics';

            // Prepare statement
            $statement = $this->getConnection()->prepare($queryString);

            // Bind data
            $statement->bindParam(':sku', $this->getSKU());
            $statement->bindParam(':name', $this->getName());
            $statement->bindParam(':price', $this->getPrice());
            $statement->bindParam(':type', $this->getType());
            $statement->bindParam(':metrics', $this->metrics);

            // Execute query
            if($statement->execute()) {
                return true;
            }
            // Print error if something goes wrong
            printf("Error: %s.\n", $statement->error);

            return false; 
        }
    }
}


class Reproduce {
    private $db_connect;
    public $table = 'sampleproducts';

    public $id;
    public $sku;
    public $name;
    public $price;
    public $type;
    
    public $metrics;
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

    public function createProduct() {
        $queryString = 'INSERT INTO ' . $this->table . ' SET sku = :sku, name = :name, price = :price, type = :type, metrics = :metrics';

        $stmt = $this->db_connect->prepare($queryString);

        if (!is_string($this->sku)){
            array_push($this->errors, "Please, provide a STRING type for SKU");
        } elseif (empty($this->sku)){
            array_push($this->errors, "Please, submit required SKU data");
        }
        $this->sku = htmlspecialchars((strip_tags($this->sku)));

        if (!is_string($this->name)){
            array_push($this->errors, "Please, provide a STRING type for NAME");
        } elseif (empty($this->name)){
            array_push($this->errors, "Please, submit required NAME data");
        }
        $this->name = htmlspecialchars((strip_tags($this->name)));

        if (!is_float($this->price)){
            array_push($this->errors, "Please, provide a FLOAT type for PRICE");
        } elseif (empty($this->price)){
            array_push($this->errors, "Please, submit required PRICE data");
        }
        $this->price = htmlspecialchars((strip_tags($this->price)));

        $this->type = htmlspecialchars((strip_tags($this->type)));
        
        $this->metrics = htmlspecialchars((strip_tags($this->metrics)));

        $stmt->bindParam(':sku', $this->sku);
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':price', $this->price);
        $stmt->bindParam(':type', $this->type);
        $stmt->bindParam(':metrics', $this->metrics);

        // Execute query
      if($stmt->execute()) {
        return true;
      }

      // Print error if something goes wrong
      printf("Error: %s.\n", $stmt->error);

      return false;
    }

    //public function confirmProductDuplication() {
        //Confirm if the product already exists
        //$sku_query = 'SELECT * FROM ' . $this->table .' WHERE `sku` = :sku LIMIT 1';

        //$statement = $this->db_connect->prepare($sku_query);
        //$statement->bindParam(':sku', $this->sku, PDO::PARAM_STR);
        //$statement->execute();

        //return $statement->fetch(PDO::FETCH_ASSOC);
    //}
}


  include_once 'config/Database.php';
  include_once 'models/Reproduce.php';

  // Instantiate DB & connect
  $database = new Database();
  $scandiweb = $database->connectDatabase();

  $repro = new Reproduce($scandiweb);

  if ($_POST && isset($_POST['save-button'])) {
    $repro->sku = $_POST['sku'];
    $repro->name = $_POST['name'];
    $repro->price = $_POST['price'];
    $repro->type = $_POST['switch'];
    $repro->type === "DVD" ? $repro->metrics = $_POST['size'] : ($repro->type === "Book" ? $repro->metrics = $_POST['weight'] : $repro->metrics = $_POST['height'] . 'X' . $_POST['width'] . 'X' . $_POST['length']) ;

    if($repro->createProduct()) {
      header('Location: index.php');
      exit;
    }
    else {
      header('Location: fallback.php');
      exit;
    }

  }

  