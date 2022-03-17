<?php include '../view/header.php'; ?>
<?php


$customer_id = filter_input(INPUT_POST, 'customer_id');
require_once('../model/database.php');

$query = 'SELECT * FROM customers WHERE customerID = :customer_id';
$statement = $db->prepare($query);
$statement->bindValue(':customer_id', $customer_id);
$statement->execute();
$customer_info = $statement->fetchAll();
$statement->closeCursor();

?>
<head>
    <link rel="stylesheet" href="customer_select.css">
</head>
<main>
    <h1>View/Update Customer</h1>

    <form action="upadate_customer.php" method="post"
               class="select_form">

            <input type="hidden" name="customer_id" value="<?php echo $customer_id?>">

            <label>First Name:</label>
            <input type="text" name="first" value='<?php echo $customer_info[0]['firstName']?>'><br>

            <label>Last Name:</label>
            <input type="text" name="last" value='<?php echo $customer_info[0]['lastName']?>'><br>

            <label>Address:</label>
            <input type="text" name="address" value='<?php echo $customer_info[0]['address']?>'><br>

            <label>City:</label> 
            <input type="text" name="city" value='<?php echo $customer_info[0]['city']?>'><br>

            <label>State:</label>
            <input type="text" name="state" value='<?php echo $customer_info[0]['state']?>'><br>

            
            <label>Postal code</label>
            <input type="text" name="postal" value='<?php echo $customer_info[0]['postalCode']?>'><br>

            <label>Country Code:</label>
            <input type="text" name="country" value='<?php echo $customer_info[0]['countryCode']?>'><br>


            <label>Phone</label>
            <input type="text" name="phone" value='<?php echo $customer_info[0]['phone']?>'><br>

            <label>Email</label>
            <input type="text" name="email" value='<?php echo $customer_info[0]['email']?>'><br>


            <label>Password</label>
            <input type="text" name="password" value='<?php echo $customer_info[0]['password']?>'><br>

            <label>&nbsp;</label>
            <input type="submit" value="Update Customer"><br>
        </form>
        <p><a href="index.php">Search Customers</a></p>

</main>
<?php include '../view/footer.php'; ?>