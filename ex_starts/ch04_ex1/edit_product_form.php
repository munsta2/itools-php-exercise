<?php


$product_id = filter_input(INPUT_POST, 'product_id', FILTER_VALIDATE_INT);
$category_id = filter_input(INPUT_POST, 'category_id',FILTER_VALIDATE_INT);
require('database.php');
$query = 'SELECT *
          FROM categories
          ORDER BY categoryID';
$statement = $db->prepare($query);
$statement->execute();
$categories = $statement->fetchAll();
$statement->closeCursor();


$query2 = "SELECT * FROM products where productID = $product_id";

$statement2 = $db->prepare($query2);
$statement2->bindValue(':product_id', $product_id);
$statement2->execute();
$edit_product = $statement2->fetchAll();
$statement2->closeCursor();


$code = $edit_product[0]['productCode'];
$name = $edit_product[0]['productName'];
$price = $edit_product[0]['listPrice'];
$category_id = $edit_product[0]['categoryID'];


?>


<!DOCTYPE html>
<html>

<!-- the head section -->
<head>
    <title>My Guitar Shop</title>
    <link rel="stylesheet" type="text/css" href="main.css">
</head>

<!-- the body section -->
<body>
    <header><h1>Product Manager</h1></header>

    <main>
        <h1>Edit Product</h1>
        <?php echo 'ProductID:', $product_id;?>
        
      
        <form action="edit_product.php" method="post"
              id="add_product_form">

            <label>Category:</label>
            <select name="category_id">
            <?php foreach ($categories as $category) : ?>
                <option value="<?php echo $category['categoryID']; ?>">
                    <?php echo $category['categoryName']; ?>
                </option>
            <?php endforeach; ?>
            </select><br>
            <input type="hidden" name="product_id"
                           value="<?php echo $product_id ?>">
            <label>Code:</label>
            <input type="text" name="code" value="<?php echo $code?>"><br>

            <label>Name:</label>
            <input type="text" name="name" value="<?php echo $name?>"><br>

            <label>List Price:</label>
            <input type="text" name="price" value="<?php echo $price?>"><br>

            <label>&nbsp;</label>
            <input type="submit" value="update"><br>
        </form>
        <p><a href="index.php">View Product List</a></p>
    </main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> My Guitar Shop, Inc.</p>
    </footer>
</body>
</html>