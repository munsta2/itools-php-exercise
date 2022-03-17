
<?php include '../view/header.php'; ?>

<main>
    <h1>Customer Search</h1>
    <form action="search.php" method="post"
               class="add_product_form">
            <label>Last Name:</label>
            <input type="text" name="name">
            <label>&nbsp;</label>
            <input type="submit" value="Search"><br>
        </form>
</main>


<?php include '../view/footer.php'; ?>