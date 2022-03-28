<?php include '../view/header.php'; ?>
<head>
    <link rel="stylesheet" href="product.css">
</head>
<main>
<form action="add_product.php" method="post"
               class="add_product_form">

            

            <label>Code:</label>
            <input type="text" name="code"><br>

            <label>Name:</label>
            <input type="text" name="name"><br>

            <label>Version:</label>
            <input type="text" name="version"><br>

            <label>Release Date:</label> 
            <input type="text" name="time">
            <label id="long">use any valid date format</label>
            
            <br>

            <label>&nbsp;</label>
            <input type="submit" value="Add Product"><br>
        </form>
        <p><a href="index.php">View Product List</a></p>
</main>

<?php include '../view/footer.php'; ?>