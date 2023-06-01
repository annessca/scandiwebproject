<?php 

include('server.php');

?>
<!doctype html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Add Product</title>
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
    <form id="product_form" class="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <div class="header">
            <span class="logo">Product Add</span>
            <div class="header-right">
                <button id="save-button" value="submit" name="save-button">Save</button>
                <button id="cancel-button" value="reset" name="cancel-button">Cancel</button>
            </div>
        </div>
        <div id="rule">&nbsp;</div>
        
        <div style="padding-left:20px">
            
            <div class="form-field">
                <label for="sku">SKU<span id="input1">&nbsp;</span></label>
                <input type="text" name="sku" id="sku"/>
            </div>
            <div class="form-field">
                <label for="name">Name<span id="input2">&nbsp;</span></label>
                <input type="text"  name="name" id="name"/>

            </div>
            <div class="form-field">
                <label for="price">Price ($)</label>
                <input type="text"  name="price" id="price"/>

            </div>
            <div>
                <label for="switcher">Type Switcher </label><span>&nbsp;</span>
                <select id="productType" name="switch">
                    <option value="" disabled selected>Type Switcher</option>
                    <option value="DVD">DVD</option>
                    <option value="Furniture">Furniture</option>
                    <option value="Book">Book</option>
                </select>
            </div>
            <br>
            <div id="blankplaceholder">
                <fieldset id="typeswitcher"> 
                    <span>&nbsp;</span>
                </fieldset>
            </div>
            <div id="metricspace">
                <fieldset id="dvdswap" class="typeremove">
                    <div class="form-field">
                        <label for="sku">Size(MB)</label>
                        <input type="text" id="size" name="size"/>
                        <br>
                        <summary>Please, provide the disc-size in (MB) format</summary> 
                    </div>
                </fieldset>
            </div>
            <div id="metricspace">
                <fieldset id="ftrswap" class="typeremove">
                    <div class="form-field">
                        <label for="height">Height(CM)</label>
                        <input type="text" id="height" name="height"/><br>
                    </div>
                    <div class="form-field">
                        <label for="width">Width(CM)</label><span>&nbsp;</span>
                        <input type="text" id="width" name="width"/><br>
                    </div>
                    <div class="form-field">
                        <label for="length">Length(CM)</label>
                        <input type="text" id="length" name="length"/>
                        <br>
                    </div>
                    <summary>Please, provide the dimensions in (H x W x L) format</summary>
                </fieldset>
            </div>
            <div id="metricspace">
                <fieldset id="bookswap" class="typeremove">
                    <div class="form-field">
                        <label for="sku">Weight(KG)</label>
                        <input type="text" id="weight" name="weight"/>
                        <br>
                    </div>
                    <summary>Please, provide the weight in (KG) format</summary>
                </fieldset>
            </div>
                    
            <br>
            <!--<div class="typeremove">
                <fieldset id="swapswitcher"> 
                    <span>&nbsp;</span>
                </fieldset>
            </div>
            <div class="typeremove">
                <fieldset id="DVD">
                    <div class="form-field">
                        <label for="sku">Size(MB)</label>
                        <input type="text" id="size" name="size"/>
                        <br>
                        <summary>Please, provide the disc-size in (MB) format</summary> 
                    </div>
                </fieldset>
            </div>
            <div class="typeremove">
                <fieldset id="Furniture">
                    <div class="form-field">
                        <label for="height">Height(CM)</label>
                        <input type="text" id="height" name="height"/><br>
                    </div>
                    <div class="form-field">
                        <label for="width">Width(CM)</label><span>&nbsp;</span>
                        <input type="text" id="width" name="width"/><br>
                    </div>
                    <div class="form-field">
                        <label for="length">Length(CM)</label>
                        <input type="text" id="length" name="length"/>
                        <br>
                    </div>
                    <summary>Please, provide the dimensions in (H x W x L) format</summary>
                </fieldset>
            </div>
            <div class="typeremove">
                <fieldset id="Book">
                    <div class="form-field">
                        <label for="sku">Weight(KG)</label>
                        <input type="text" id="weight" name="weight"/>
                        <br>
                    </div>
                    <summary>Please, provide the weight in (KG) format</summary>
                </fieldset>
            </div>-->     
            <?php include('error.php'); ?>     
        </div>
    </form>
    <div id="rule2">&nbsp;</div>
    <div class="footer">
        <h3>Scandiweb Test Assignment</h3>
    </div>
    <script src="js/switch.js" defer></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>
</html>