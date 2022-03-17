<?php 
include_once '../view/header.php'; 

$email = filter_input(INPUT_POST, 'email');
require_once('../model/database.php');

$query = 'SELECT products.name, products.productCode FROM products 
        JOIN registrations
        ON products.productCode = registrations.productCode
        JOIN customers 
        ON customers.customerID = registrations.customerID
        WHERE customers.email = :email';



$statement = $db->prepare($query);
$statement->bindValue(':email', $email);
$statement->execute();
$products = $statement->fetchAll();
$statement->closeCursor();
 


$query2 = 'SELECT * FROM customers where email = :email';
$statement2 = $db->prepare($query2);
$statement2->bindValue(':email', $email);
$statement2->execute();
$customer = $statement2->fetchAll();
$statement2->closeCursor();

?>
<head>
    <link rel="stylesheet" type="text/css"href="incident.css">
</head>
<main>
    <h1>test</h1>
    <?php echo $customer[0]["customerID"]?>
    <form action="create.php" method="post"
               class="incident">

            <input type="hidden" name="id" value="<?php echo $customer[0]["customerID"]?>">
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
           
            <label>Title:</label>
            <input type="text" name="title"><br>
            
            <label>Description:</label>
            <textarea name="description" rows=5 cols=30> 
            </textarea><br>
            <label>&nbsp;</label>
            <input type="submit" value="Create Incident"><br>
        </form>
</main>

<?php include_once '../view/footer.php'; ?>