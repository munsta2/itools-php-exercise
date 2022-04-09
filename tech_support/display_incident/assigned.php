<?php include '../view/header.php';
require("../model/database.php");
require("../model/incidents_db.php");
$incidents = get_assigned_incidents_with_product_code();

?>

<h1>Assigned incidents</h1>
    <a href="unassigned.php">View Unassigned Incident</a>
    <table>
        <tr>
            <th>Customer</th>
            <th>Product</th>
            <th>Technician</th>
            <th>Incident</th>
        </tr>
        <?php foreach ($incidents as $incident) : ?>
        <tr>
        <td><?php echo $incident['firstName']."<br>".$incident['lastName']; ?></td>
        <td><?php echo $incident['name']; ?></td>
        <td><?php echo $incident['tecF']."<br>".$incident['tecL']; ?></td>
        <td>
            ID: <?php echo $incident['incidentID']."<br>" ?>
            Opened: <?php echo $incident['dateOpened']."<br>" ?>
            <?php if(empty($incident['dateClosed'])) :?>
                Closed: OPEN <br>
            <?php else : ?>
                Closed: <?php echo $incident['dateClosed']."<br>" ?>
            <?php endif; ?>
            
            Title: <?php echo $incident['title']."<br>" ?>
            Description: <?php echo $incident['description']."<br>" ?>
        </td>

    </tr>       
        <?php endforeach; ?>
    </table>





<?php include '../view/footer.php'; ?>