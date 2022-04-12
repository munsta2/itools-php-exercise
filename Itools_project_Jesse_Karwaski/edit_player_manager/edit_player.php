<?php include("../view/header.php"); ?>
<head>
    <link rel="stylesheet" href="edit.css">
</head>

  
    <h1>Edit Player</h1>
        <form action='.' method='post' class='select_form'>
            


          
                   <label>First Name:</label>
        <input type="text" name="fname" value="<?php echo htmlspecialchars($fname);?>">
        <?php echo $fields->getField('fname')->getHTML(); ?>
    <br>
    <br>
            <label>Last Name:</label>
        <input type="text" name="lname" 
               value="<?php echo htmlspecialchars($lname);?>">
        <?php echo $fields->getField('lname')->getHTML(); ?>
        <br>
        <br>
            <label>Position:</label>
        <input type="text" name="position" 
               value="<?php echo htmlspecialchars($position);?>">
        <?php echo $fields->getField('position')->getHTML(); ?>
        <br>
        <br>
            <label>height</label>
    
        <input type="text" name="height" 
               value="<?php echo htmlspecialchars($height); ?>">
        <?php echo $fields->getField('height')->getHTML(); ?>
        <br>
        <br>
        <label>weight:</label>
        <input type="text" name="weight" 
               value="<?php echo htmlspecialchars($weight); ?>">
        <?php echo $fields->getField('weight')->getHTML(); ?>
        <br>
        <br>
    

            <label>Team</label>
            <select name="team_id">
                <?php foreach ($teams as $team): ?>
                <?php if($teamID == $team['teamID']): ?>
                <option value="<?php echo $team['teamID']; ?>" selected>
                    <?php echo $team['name']; ?>
                </option>
                <?php else: ?>
                <option value="<?php echo $team['teamID']; ?>" >
                    <?php echo $team['name']; ?>
                </option>
                <?php endif; ?>
                <?php endforeach; ?>
            </select>
          
            <br>
            <br>
          

            <input type='hidden' name='action'
                   value='update_player' />
            <input type='hidden' name='playerID' 
                   value='<?php echo $playerID; ?>' />

                   <input type='submit' value='Update player' />
                <input type='hidden' name='condition' value='new' />
                <br>
                <br>
        
        </form>

 
    <a href='.'>Search player</a>
</main>

<?php include("../view/footer.php"); ?>