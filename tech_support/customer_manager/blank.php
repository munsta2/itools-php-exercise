<?php include '../view/header.php'; ?>

<main>
    <h1>Customer Search</h1>
    <form action="." method="post"
               class="add_product_form">
            <input type="hidden" name="action" value='search_customers'>
            <label>Last Name:</label>
            <input type="text" name="last_name">
            <label>&nbsp;</label>
            <input type="submit" value="Search"><br>
        </form>
    <h1>Add a New Customer</h1>
    <form action="." method="post"
               class="add_product_form">
               <input type="hidden" name="action" value='add_customer'>
               <input type="hidden" name="condition" value='new'>
               <input type="submit" value="Add Customer"><br>
    </form>
</main>


<?php include '../view/footer.php'; ?>