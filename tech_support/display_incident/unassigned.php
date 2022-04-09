<?php include '../view/header.php'; 

require("../model/database.php");
require("../model/incidents_db.php");
$incidents = get_free_incidents_with_product_code();
?>
<main>

    <h1>Unassigned incidents</h1>
    <a href="assigned.php">View Assigned Incident</a>
    <table>
        <tr>
            <th>Customer</th>
            <th>Product</th>
            <th>Incident</th>
        </tr>
        <?php foreach ($incidents as $incident) : ?>
        <tr>
        <td><?php echo $incident['firstName']."<br>".$incident['lastName']; ?></td>
        <td><?php echo $incident['name']; ?></td>
        <td>
            ID: <?php echo $incident['incidentID']."<br>" ?>
            Opened: <?php echo $incident['dateOpened']."<br>" ?>
            Title: <?php echo $incident['title']."<br>" ?>
            Description: <?php echo $incident['description']."<br>" ?>
        </td>

    </tr>       
        <?php endforeach; ?>
    </table>
</main>
<?php include '../view/footer.php'; ?>