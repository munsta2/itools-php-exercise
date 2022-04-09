<?php include_once 'view/header.php'; ?>
<head>
    <link rel="stylesheet" type="text/css"href="main.css">
</head>
<main>
    <nav>
        
    <h2>Administrators</h2>
    <ul>
        <li><a href="product_manager" action="working">Manage Products</a></li>
        <li><a href="technician_manager">Manage Technicians</a></li>
        <li><a href="customer_manager">Manage Customers</a></li>
        <li><a href="incident_create">Create Incident</a></li>
        <li><a href="assign_incident_manager">Assign Incident</a></li>
        <li><a href="display_incident/unassigned.php">Display Incidents</a></li>
    </ul>

    <h2>Technicians</h2>    
    <ul>
        <li><a href="incident_update">Update Incident</a></li>
    </ul>

    <h2>Customers</h2>
    <ul>
        <li><a href="product_register">Register Product</a></li>
    </ul>
    
    </nav>
</section>
<?php include_once 'view/footer.php'; ?>