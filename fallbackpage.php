<?php 

include('server.php');

?>
<!doctype html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Landing Page</title>
    <meta name="description" content="A Junior Developer Test Assignment for Scandiweb">
    <meta name="author" content="Anne Essien">

    <meta property="og:title" content="A Minimal Web Application">
    <meta property="og:type" content="Product Page">
    <meta property="og:url" content="https://www.notion.so/Junior-Developer-Test-Task-1b2184e40dea47df840b7c0cc638e61e">
    <meta property="og:description" content="Junior Developer Test Task.">
    <meta property="og:image" content="image.png">

    <link rel="icon" href="/favicon.ico">
    <link rel="icon" href="/favicon.svg" type="image/svg+xml">
    <link rel="apple-touch-icon" href="/apple-touch-icon.png">

    <link rel="stylesheet" href="css/styles.css?v=1.0">

</head>

<body>
    <div class="header">
        <span class="logo">Product List</span>
        <div class="header-right">
            <a href="index.php">BACK TO HOME</a>
            <button>MASS DELETE</button>
        </div>
    </div>
    <div id="rule">&nbsp;</div>
    <h1>Fallback Page</h1>
    <div id="rule2">
        <?php 
        foreach ($repro->errors as $allWarnings) {
            echo "$allWarnings <br>";
        } 
        ?>
    </div>
    <div class="footer">
        <h3>Scandiweb Test Assignment</h3>
    </div>
      
    <script src="js/scripts.js"></script>
</body>
</html>