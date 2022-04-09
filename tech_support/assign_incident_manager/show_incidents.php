<?php include '../view/header.php' ?>

<main>

<h1>Select Incident</h1>

<table>
    <tr>
        <th>Customer</th>
        <th>Product</th>
        <th>Date Opened</th>
        <th>Title</th>
        <th>Description</th>
        <th></th>

    </tr>

    <?php foreach ($free_incidents as $incident) : ?>
        <tr>
        <td><?php echo $incident['firstName']."<br>".$incident['lastName']; ?></td>
        <td><?php echo $incident['productCode']; ?></td>
        <td><?php echo $incident['dateOpened']; ?></td>
        <td><?php echo $incident['title']; ?></td>
        <td><?php echo $incident['description']; ?></td>
        <td>
                <form action="." method="post">
                    <input type="hidden" name="action"
                           value="select_tech" />
                    <input type="hidden" name="incident_code"
                           value="<?php echo $incident['incidentID']; ?>" />
                    <input type="submit" value="Select" />
                </form>
            </td>
        </tr>       
        <?php endforeach; ?>
</table>

</main>

<?php include '../view/footer.php' ?>