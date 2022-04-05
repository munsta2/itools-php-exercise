<?php include '../view/header.php'; ?>
<head>
    <link rel="stylesheet" href="product.css">
</head>
<main>
<form action='.' method='post' class='add_product_form'>
            <input type='hidden' name='action' value='add_product' />

            <label>Product Code</label>
            <input type='text' name='product_code' />
            <br />
            <label>Name</label>
            <input type='text' name='name' />
            <br />
            <label>Version</label>
            <input type='text' name='version' />
            <br />
            <label>Release Date</label>
            <input type='text' name='release_date' />
            <em>Use any valid date format.</em>
            <br />
            <input type='Submit' value='Add Product' />
        </form>
        <br>
        <p><a href="index.php">View Product List</a></p>
</main>

<?php include '../view/footer.php'; ?>