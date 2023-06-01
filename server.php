<?php 

  include_once 'config/Database.php';
  include_once 'models/ProductInventory.php';

  // Instantiate DB & connect
  $database = new Database();
  $scandiweb = $database->connectDatabase();

  $repro = new ProcessProduct($scandiweb);
  
  if ($_POST && isset($_POST['save-button'])) {
    $repro->sku = $_POST['sku'];
    $repro->name = $_POST['name'];
    $repro->price = $_POST['price'];
    $repro->type = $_POST['switch'];
    $repro->size = $_POST['size'];
    $repro->weight = $_POST['weight'];
    $repro->height = $_POST['height'];
    $repro->width = $_POST['width'];
    $repro->length = $_POST['length'];
    //$repro->postProduct();
    
    if($repro->postProduct()) {
      header('Location: index.php');
      exit;
    }
    else {
      header('Location: fallbackpage.php');
      exit;
    }

  }

  