
<?php include '../view/header.php'; ?>
<?php 
$last_name = filter_input(INPUT_POST, 'name');

require_once('../model/database.php');

$query = 'SELECT * FROM Customers where lastName = :last_name';
$statement = $db->prepare($query);
$statement->bindValue(':last_name', $last_name);
$statement->execute();
$customers = $statement->fetchAll();
$statement->closeCursor();
?>
<main>
    <h1>Customer Search</h1>
    <form action="search.php" method="post"
               class="add_product_form">
            <label>Last Name:</label>
            <input type="text" name="name">
            <label>&nbsp;</label>
            <input type="submit" value="Search"><br>
        </form>
    <h1>Results</h1>

    <table>
            <tr>
               
                <th>Name</th>
                <th>Email Address</th>
                <th>City</th>
                <th>&nbsp;</th>
            </tr>

            <?php foreach ($customers as $customer) : ?>
            <tr>
                <td><?php echo $customer['firstName'].' '.$customer['lastName']; ?></td>
                <td><?php echo $customer['email']; ?></td>
                <td><?php echo $customer['city']; ?></td>
                <td><form action="select_customer.php" method="post">
                    <input type="hidden" name="customer_id"
                           value="<?php echo $customer['customerID']; ?>">
                   
                    <input type="submit" value="Select">
                </form></td>
                
            </tr>
            <?php endforeach; ?>
            
        </table>
</main>


<?php include '../view/footer.php'; ?>