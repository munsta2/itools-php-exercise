<?php
include_once '../view/header.php';
require("../model/games_db.php");
require_once('../model/database.php');
$games = get_games();
//test = get_image_path(4);
//<?php echo get_image_path($game['homeTeamID']) ?>


<head>
    <link rel="stylesheet" href="../css/table.css">
</head>
<main>

    <table>
        <thead>
            <td colspan="4" class="centerAlign">2022 Schedule</td>
        </thead>
        <?php foreach($games as $game) : ?>
        <tr>
            <td rowspan="2" class="centerAlign"><img src="<?php echo get_image_path($game['homeTeamID']) ?>" alt=""> </td>
            <td colspan="2" class="centerAlign"><?php echo $game["gameDate"] ?></td>

            <td rowspan="2" class="centerAlign" ><img src="<?php echo get_image_path($game['awayTeamID']) ?>" alt=""></td>
          
        </tr>
        <tr>
            
        <td colspan="2" class="centerAlign"><?php echo "Score"."<br>".$game['homeTeamScore']." - ".$game['awayTeamScore'] ?></td>
           
        </tr>
        <?php endforeach; ?>
    </table>
</main>












<?php include_once '../view/footer.php' ?>