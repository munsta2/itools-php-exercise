<?php include '../view/header.php'; ?>
<head>
    <link rel="stylesheet" href="add_game_form.css">
</head>
<main>
    <form action="." method="post" class="add_game_form">

  
        
        <input type="hidden" name="action" value='add game'>
        <label>Game Date: </label>
        <input type="text" name="gameDate" value="<?php echo htmlspecialchars($gameDate); ?>">
        <?php echo $fields->getField('gameDate')->getHTML(); ?>
        <br>
        <br>

        <label class="long">Team 1 score:</label>
        <input type="text" name="team_1_score" 
               value="<?php echo htmlspecialchars($team_1_score);?>">
        <?php echo $fields->getField('team_1_score')->getHTML(); ?>
        <br>
        <br>
        <label class="long">Team 2 score:</label>
        <input type="text" name="team_2_score" 
               value="<?php echo htmlspecialchars($team_2_score);?>">
        <?php echo $fields->getField('team_2_score')->getHTML(); ?>
    <br>
    <br>
        <label>&nbsp;</label>
        <input type="submit" value="Add game"><br>
    </form>
</main>


<?php include '../view/footer.php'; ?>