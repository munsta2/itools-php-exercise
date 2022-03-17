<?php include '../view/header.php'; ?>
<head>
    <link rel="stylesheet" href="tech.css">
</head>
<main>
<form action="add_tech.php" method="post"
               class="add_tech">

            

            <label>First Name:</label>
            <input type="text" name="first"><br>

            <label>Last Name:</label>
            <input type="text" name="last"><br>

            <label>Email:</label>
            <input type="text" name="email"><br>

            <label>Phone:</label> 
            <input type="text" name="phone"><br>
           
            <label>Password:</label> 
            <input type="text" name="password">
            
            <br>

            <label>&nbsp;</label>
            <input type="submit" value="Add Technician"><br>
        </form>
        <p><a href="index.php">View Technician List</a></p>
</main>

<?php include '../view/footer.php'; ?>