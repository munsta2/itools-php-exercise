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

        
       <br>
        <table >
            <thead>
            <th>logo</th>
            <th>Team</th>
            <th>wins</th>
            <th>losses</th>
            <th>Points for</th>
            <th>Points Agiants</th>
            <th>Points</th>
            <th></th>
        </thead>
        <tr>
            <td><img src="<?php echo $team_array[0]['imagePath']; ?>" alt=""></td>
            <td><?php echo $team_array[0]['name']; ?></td>
            <td><?php echo $team_array[0]['wins']; ?></td>
            <td><?php echo $team_array[0]['loses']; ?></td>
            <td><?php echo $team_array[0]['pointsFor']; ?></td>
            <td><?php echo $team_array[0]['pointsAgaints']; ?></td>
            <td><?php echo $team_array[0]['points']; ?></td>
            <td>
                <form action="." method="post">
                    <input type="hidden" name="action"
                           value="show players" />
                    <input type="hidden" name="team_id"
                           value="<?php echo $team_array[0]['teamID']; ?>" />
                    <input type="submit" value="view players" />
                </form>
            </td>
        </tr>
        </table>
</main>


<?php include '../view/footer.php'; ?>