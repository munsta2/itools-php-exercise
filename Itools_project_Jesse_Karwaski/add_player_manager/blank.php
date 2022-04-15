<?php include '../view/header.php'; ?>
<head>
    <link rel="stylesheet" href="../teams_manager/teams.css">
</head>
<main>
    <h1>Select team</h1>
    <form action="." method="post">
            <input type="hidden" name="action" value='show players'>
            <label>Pick Team: </label>
            <select name="team_id">
                <?php foreach ($teams as $team): ?>
               
                <option value="<?php echo $team['teamID']; ?>" >
                    <?php echo $team['name']; ?>
                </option>
               
                <?php endforeach; ?>
            </select>
            <label>&nbsp;</label>
            <input type="submit" value="Select"><br>
        </form>

        <br>
        <a href="../admin_manager/">Back to Admin menu</a>
</main>


<?php include '../view/footer.php'; ?>