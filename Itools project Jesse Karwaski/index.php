<?php 
require("model/database.php");

$query2 = "SELECT * FROM administrators";

$statement2 = $db->prepare($query2);
$statement2->execute();
$products = $statement2->fetchAll();
$statement2->closeCursor();


?>


<main>

<?php echo print_r($products); ?>

</main>