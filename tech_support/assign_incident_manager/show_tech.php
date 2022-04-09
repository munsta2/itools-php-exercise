<?php include '../view/header.php' ?>

<main>
    <table>
    <tr>
    <th>Name</th>
        <th>Open Incidents</th>
        <th></th>

    </tr>
        
        <?php foreach ($techs as $tech) : ?>
        <tr>
        <td><?php echo $tech['firstName']." ".$tech['lastName']; ?></td>
        <td><?php echo $tech['openIncidents']; ?></td>
        <td>
                <form action="." method="post">
                    <input type="hidden" name="action"
                           value="assign" />
                    <input type="hidden" name="tech_id"
                           value="<?php echo $tech['techID']; ?>" />
                    <input type="submit" value="Select" />
                </form>
            </td>
    </tr>       
         
        <?php endforeach; ?>
    </table>
</main>

<?php include '../view/footer.php' ?>