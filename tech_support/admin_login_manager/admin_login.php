<?php include_once '../view/header.php'; ?>

<head>
    <link rel="stylesheet" href="../product_manager/product.css">
</head>
<main>

<h1>Admin login</h1>

    <form action="." method="post" class="add_product_form">
        <input type="hidden" name="action" value="login attempt">
        <label>Username:</label>
        <input type="text" name="username"><br>
        
        <label>password:</label>
        <input type="text" name="password">
<br>
        <input type="submit" value="Login">
    </form>

</main>

<?php include_once '../view/footer.php'; ?>