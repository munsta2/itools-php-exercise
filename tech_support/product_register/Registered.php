<?php include_once '../view/header.php';

$product_code = filter_input(INPUT_POST, 'products');
$customer_id = filter_input(INPUT_POST, 'id');
$date = date("Y-m-d");
require_once('../model/database.php');
$query = "INSERT into registrations 
        (customerID,  productCode, registrationDate)
    VALUES
        (:customer_id, :product_code,:date)";

$statement = $db->prepare($query);
$statement->bindValue(':customer_id', $customer_id);
$statement->bindValue(':date', $date);
$statement->bindValue(':product_code', $product_code);
$statement->execute();
$statement->closeCursor();
?>


<main>
    <h1>Register Product</h1>
    <p>product (<?php echo $product_code; ?>) was registered successfully</p>
</main>

<?php include_once '../view/footer.php'; ?>