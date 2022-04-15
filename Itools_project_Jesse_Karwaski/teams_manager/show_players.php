<?php include '../view/header.php'; ?>
<head>
    <link rel="stylesheet" href="teams.css">
    <link rel="stylesheet" href="../css/table.css">
</head>



<main>
    <img src="<?php echo  $team_logo?>" alt="">
    <table>
        <thead>
        <th>Name</th>
        <th>Position</th>
        <th>Height</th>
        <th>Weight</th>
        
        </thead>
        <?php foreach ($player_array as $player) : ?>
            <tr>
            <td><?php echo $player['fname']." ".$player['lname']?></td>
            <td><?php echo $player['position']?></td>
            <td><?php echo $player['height']."lbs"?></td>
            <td><?php echo $player['weight']." cm"?></td>
            </tr>
        
        <?php endforeach; ?>


    </table>
    <a href="index.php">Look at another team</a>
</main>


<?php include '../view/footer.php'; ?>