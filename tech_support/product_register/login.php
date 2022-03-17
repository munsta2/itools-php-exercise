<?php 
include_once '../view/header.php'; 

$email = filter_input(INPUT_POST, 'email');



require_once('../model/database.php');

$query = 'SELECT * FROM customers where email = :email';
$statement = $db->prepare($query);
$statement->bindValue(':email', $email);
$statement->execute();
$customer = $statement->fetchAll();
$statement->closeCursor();

if (empty($customer)) {
    $error_message = "no customer login found";
    include("../errors/database_error.php");
    exit();
}
else {

    $query2 = "SELECT name, productCode from products";

$statement2 = $db->prepare($query2);
$statement2->execute();
$products = $statement2->fetchAll();
$statement2->closeCursor();
}



?>
<head>
    <link rel="stylesheet" type="text/css" href="login.css">
</head>
<main>
<h1>Customer Login</h1>
<p>you must login before you can register a product</p>
    <form action="Registered.php" method="post"
               class="login">
            <label>Customer:</label>
            <?php echo $customer[0]['firstName']." ".$customer[0]['lastName'];?>
            <br>
            <label>Product: </label>
            <select name="products">
                <?php foreach ($products as $product) : ?>
                   <option value="<?php echo $product['productCode'];?>">
                        <?php echo $product['name']; ?>
                   </option>
                <?php endforeach; ?>
            </select><br>
           
            <label>&nbsp;</label>
            <input type="submit" value="Register Product"><br>
        </form>

</main>
<?php include_once '../view/footer.php'; ?>