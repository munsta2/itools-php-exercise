<?php include("../view/header.php"); ?>
<head>
    <link rel="stylesheet" href="../edit_player_manager/edit.css">
</head>

<main>


    <h1>Add Player</h1>
        <form action='.' method='post' class="select_form" >
            


          
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
    

           
            </select>
          
            <br>
            <br>
          
            <input type='hidden' name='team_id' 
                   value='<?php echo $teamID; ?>' />
            <input type='hidden' name='action'
                   value='add player' />
            <input type='hidden' name='playerID' 
                   value='<?php echo $playerID; ?>' />

                   <input type='submit' value='add player' />
                <input type='hidden' name='condition' value='new' />
                <br>
                <br>
        
        </form>

 
    <a href='.'>Search player</a>
</main>

<?php include("../view/footer.php"); ?>