<?php include '../view/header.php'; ?>
<head>
    <link rel="stylesheet" href="../teams_manager/teams.css">
</head>
<main>
    <h1>Search player by last name</h1>
    <form action="." method="post">
            <input type="hidden" name="action" value='search_player'>
            <label>Last Name:</label>
            <input type="text" name="last_name">
            <label>&nbsp;</label>
            <input type="submit" value="Search"><br>
        </form>
</main>


<?php include '../view/footer.php'; ?>