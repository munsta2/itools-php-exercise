<?php 
include '../view/header.php'; 
require('../model/database.php');







$queryProducts = 'SELECT * FROM technicians';
$statement3 = $db->prepare($queryProducts);

$statement3->execute();
$techs = $statement3->fetchAll();
$statement3->closeCursor();

?>





<main>
<table>
<tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Password</th>
                <th>&nbsp;</th>
            </tr>

            <?php foreach ($techs as $tech) : ?>
            <tr>
                <td><?php echo $tech['firstName']; ?></td>
                <td><?php echo $tech['lastName']; ?></td>
                <td><?php echo $tech['email']; ?></td>
                <td><?php echo $tech['phone']; ?></td>
                <td><?php echo $tech['password']; ?></td>
                
                <td><form action="delete_tech.php" method="post">
                    <input type="hidden" name="tech_id"
                           value="<?php echo $tech['techID']; ?>">
                   
                    <input type="submit" value="Delete">
                </form></td>
                
            
            <?php endforeach; ?>
            
        </table>
        <p><a href="add_tech_form.php">Add Technician</a></p>
</main>







<?php include '../view/footer.php'; ?>