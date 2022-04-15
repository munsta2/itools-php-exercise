<?php include '../view/header.php'; ?>
<head>
    <link rel="stylesheet" href="teams.css">
    <link rel="stylesheet" href="../css/table.css">
</head>



<main>

<h1>Select team</h1>
    <form action="." method="post">
            <input type="hidden" name="action" value='show team'>
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

    <img src="<?php echo  $team_logo?>" alt="">
    <table>
        <thead>
        <th>Name</th>
        <th>Position</th>
        <th>Height</th>
        <th>Weight</th>
        <th></th>
        
        </thead>
        <?php foreach ($players as $player) : ?>
            <tr>
            <td><?php echo $player['fname']." ".$player['lname']?></td>
            <td><?php echo $player['position']?></td>
            <td><?php echo $player['height']."lbs"?></td>
            <td><?php echo $player['weight']." cm"?></td>
            <td>
            <form action="." method="post">
                    <input type="hidden" name="team_id"
                           value="<?php echo $player['teamID']; ?>" />
                    <input type="hidden" name="action"
                           value="delete player" />
                    <input type="hidden" name="playerID"
                           value="<?php echo $player['playerID']; ?>" />
                    <input type="submit" value="Delete" />
                </form>
            </td>
            </tr>
        
        <?php endforeach; ?>


    </table>

    <h1>Add a New Player to this Rooster</h1>
    <form action="." method="post">
               <input type="hidden" name="action" value='add player form'>
               <input type="hidden" name="condition" value='new'>
               <input type="hidden" name="team_id" value='<?php echo $teamID?>'>
               <input type="submit" value="Add Player"><br>
    </form>
    <br>
    <a href="index.php" style="text-align: left;">Look at another team</a>
</main>


<?php include '../view/footer.php'; ?>