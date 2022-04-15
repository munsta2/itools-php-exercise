<?php include('../view/header.php'); ?>

<head>
    <link rel="stylesheet" href="../css/table.css">
</head>
<main>
    <form action='.' method="post">
        <h3>Search player by last name:</h3>
        <label>Last Name</label>
        <input type='text' name='last_name' />
        <input type='hidden' name='action'
               value='search_player' />
        <input type='submit' value='Search' />
    </form>
    <br /> 
    <table>
        <tr>
            <th>Name</th>
            <th>Team</th>
            <th>Position</th>
            <th>Height</th>
            <th>Weight</th>
            <th><!-- This space is used for the Select button --></th>
        </tr>
        <?php foreach($players as $player) : ?>
            <tr>
                <td><?php echo $player['fname'] . ' ' . $player['lname']; ?></td>
                <td><?php echo $player['name']; ?></td>
                <td><?php echo $player['position']; ?></td>
                <td><?php echo $player['height']; ?></td>
                <td><?php echo $player['weight']; ?></td>
                <td>
                    <form action='.' method='post'>
                        <input type='hidden' name='action'
                               value='select_player' />
                     <input type="hidden" name="condition" value='update'>
                        <input type='hidden' name='playerID' 
                               value='<?php echo $player['playerID']; ?>' />
                               <input type='hidden' name='teamID' 
                               value='<?php echo $player['teamID']; ?>' />
                        <input type='hidden' name='fname'
                               value='<?php echo $player['fname'];?>' />
                        <input type='hidden' name='lname'
                               value='<?php echo $player['lname'];?>' />
                        <input type='hidden' name='position'
                               value='<?php echo $player['position'];?>' />
                        <input type='hidden' name='height'
                               value='<?php echo $player['height'];?>' />
                        <input type='hidden' name='weight'
                               value='<?php echo $player['weight'];?>' />
                        <input type='submit' value='Select' />
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
            <br>
    <a href="../admin_manager/">Back to Admin menu</a>
        </main>

<?php include('../view/footer.php'); ?>