<?php include_once '../view/header.php'; ?>

<head>
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="admin.css">
    
</head>
<main>

<h1>Admin view</h1>
<nav>
    <ul>
        <li><a href="../edit_player_manager/">Search player and edit</a></li>
        <li><a href="../add_player_manager/">Add player to rooster</a></li>
        <li><a href="">view roosters and delete</a></li>
        <li><a href="../add_games_manager/">Add games to schedule</a></li>
    </ul>

    <h1>Login Status</h1>
    <form action="." method="post">
        <input type="hidden" name="action" value="logout">
        <label>You are logged in as <?php echo $_SESSION['user'] ?></label>
        <br>
        
        <input type="submit" value="Logout">
    </form>

</nav>
    
    
</main>

<?php include_once '../view/footer.php'; ?>