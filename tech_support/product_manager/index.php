<?php
require('../model/database.php');
include '../view/header.php';
// require('../model/product_db.php');

// $action = filter_input(INPUT_POST, 'action');
// if ($action === NULL) {
//     $action = filter_input(INPUT_GET, 'action');
//     if ($action === NULL) {
//         $action = 'under_construction';
//     }
// }

// if ($action == 'under_construction') {
//     include('../under_construction.php');
// }

$queryProducts = 'SELECT * FROM products';
$statement3 = $db->prepare($queryProducts);

$statement3->execute();
$products = $statement3->fetchAll();
$statement3->closeCursor();




?>

<main>


<table>
            <tr>
                <th>Code</th>
                <th>Name</th>
                <th>Version</th>
                <th>Realse Date</th>
                <th>&nbsp;</th>
            </tr>

            <?php foreach ($products as $product) : ?>
            <tr>
                <td><?php echo $product['productCode']; ?></td>
                <td><?php echo $product['name']; ?></td>
                <td class="right"><?php echo $product['version']; ?></td>
                <td><?php echo $product['releaseDate']; ?></td>
                <td><form action="delete_product.php" method="post">
                    <input type="hidden" name="product_id"
                           value="<?php echo $product['productCode']; ?>">
                   
                    <input type="submit" value="Delete">
                </form></td>
                
            </tr>
            <?php endforeach; ?>
            
        </table>
        <p><a href="add_product_form.php">Add Product</a></p>



</main>

<?php include '../view/footer.php'; ?>