<?php include '../view/header.php'; ?>
<head>
    <link rel="stylesheet" href="../teams_manager/teams.css">
</head>
<main>
    <h1>Select Two teams to add game to schedule</h1>
    <br>
    <form action="." method="post">

        <?php if (isSet($error)) :?>
            <?php echo $error; ?><br>
        <?php endif; ?>
            
            <input type="hidden" name="action" value='add game form'>
            <label>Pick Team 1: </label>
            <select name="team_id1">
                <?php foreach ($teams as $team): ?>
               
                <option value="<?php echo $team['teamID']; ?>" >
                    <?php echo $team['name']; ?>
                </option>
               
                <?php endforeach; ?>
            </select>
            <br>
            <label>Pick Team 2: </label>
            <select name="team_id2">
                <?php foreach ($teams as $team): ?>
               
                <option value="<?php echo $team['teamID']; ?>" >
                    <?php echo $team['name']; ?>
                </option>
               
                <?php endforeach; ?>
            </select>
            <br>
            <label>&nbsp;</label>
            <input type="submit" value="Select"><br>
        </form>
</main>


<?php include '../view/footer.php'; ?>