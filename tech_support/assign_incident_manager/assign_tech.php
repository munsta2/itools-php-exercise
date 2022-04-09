<?php include '../view/header.php' ?>

<head>
    <link rel="stylesheet" href="../incident_create/incident.css">
</head>
<main>
<form action="." method="post" class="incident">
                    <input type="hidden" name="action"
                           value="insert" />
                  
                           <label>Customer:</label>
                            <?php echo $customer['firstName']." ".$customer['lastName']; ?>
                            <br>
                            <label>Product:</label>
                            <?php echo $incident['productCode']; ?>>
                            <br />
                            <label>Technician:</label>
                            <?php echo $tech['firstName']." ".$tech['lastName']; ?>
                            <br />


                    <input type="submit" value="Assign Incident" />
                </form>
</main>
<?php include '../view/footer.php'; ?>