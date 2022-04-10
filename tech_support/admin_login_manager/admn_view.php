<?php include_once '../view/header.php'; ?>

<head>
    <link rel="stylesheet" type="text/css"href="main.css">
</head>
<main>
    <nav>
        
    <h2>Admin Menu</h2>
    <ul>
    <li><a href="../product_manager">Manage Products</a></li>
        <li><a href="../technician_manager">Manage Technicians</a></li>
        <li><a href="../customer_manager">Manage Customers</a></li>
        <li><a href="../incident_create">Create Incident</a></li>
        <li><a href="../assign_incident_manager">Assign Incident</a></li>
        <li><a href="../display_incident/unassigned.php">Display Incidents</a></li>
    </ul>

    <h1>Login Status</h1>
    <form action="." method="post" class="add_product_form">
        <input type="hidden" name="action" value="logout">
        <label>You are logged in as <?php echo $_SESSION['user'] ?></label>
        <br>
        
        <input type="submit" value="Logout">
    </form>
    
    </nav>

<?php include_once '../view/footer.php'; ?>