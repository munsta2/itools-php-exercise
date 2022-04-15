<?php include_once 'view/header.php';
require('model/database.php');
require("model/teams_db_functions.php");
require("model/games_db.php");
//require("errors/database_error.php");
// Start session

update_team_stats();
$standings = get_standings();
$images = array("images/roll2.jpg", "images/roll3.jpg", "images/roll4.jpg");




?>


<head>
<link rel="stylesheet" type="text/css"href="css/main.css">
    <link rel="stylesheet" type="text/css"href="css/table.css">
    
</head>
<main>
  <br>
  <h1 style="text-align: center">Players in Action!</h1>
   <br>
<div class="slideshow-container">
<?php $i = 1;?>
<?php foreach ($images as $image) : ?>
    
    <div class="mySlides fade">
    <div class="numbertext"><?php echo $i."/".count($images); ?></div>
    <img src="<?php echo $image; ?>" class="testing center" >
    <?php $i = $i + 1; ?>
</div>
<?php endforeach; ?>


</div>
  


<div style="text-align:center">
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
</div>
<script type="text/javascript" src="slideshow.js"></script>


<aside>

  <table class="standings">
    <thead>
        <td colspan="3" class="banner">Point Standings</td>
        <tr class="subBanner">
            <td>Pos</td>
            <td>Team</td>
            <td>Points</td>
        </tr>
        

    </thead>
    <?php $i = 1; foreach ($standings as $team) : ?>
            <tr >
                <td><?php echo $i ?></td>
                <td><img src="<?php echo $team['imagePath'] ?>" alt="" class="small"> <?php echo $team['name'] ?> </td>
                <td><?php echo $team['points'] ?></td>
            </tr>
            <?php $i = $i + 1 ?>
        <?php endforeach; ?>
    
  </table>

</aside>


<section>
      <h1>League News</h1>
<br>

<h2 >Play off action</h2>

<p >With the Patriots topping the league this and pulling out top of the back in a four way tie for first place they secured themeselve a bye for the first round of playoffs. 
Along with them the Steelers also had an amazing season themeselves and punched their ticket to a first round bye as well by defeating the Northbay bulldogs in this past weekends action  </p>
<br>
<p>This means this coming weekend we will get to see too heated play off matches. Our first match up will be the Oakvile longhorns taking on the Ottawa Sooners</p>
<img src="images/longhorns.webp" alt="">
<img src="images/ottawa-sooners-logo.webp" alt="">
<p>Our second match up will be the Sarnia Imperials taking on the Sudbury Spartans</p>
<img src="images/Sarnia-Imperials-Logo-crown-CL.webp" alt="">
<img src="images/Spartans-logo.webp" alt="">
<p>Good luck out there boys</p>

<h2>Patriots QuaterBack Breaks an NFC reccord</h2>

<p>Over this past weekend Steel city Patriots quaterback Fred Gomez had an amazing game to end off a regular season run that he's been on.
  Over the course of this season Gomez Threw for over 5,000 Yards plus another 600 yards for the ground while scoring 23 touchdowns threw the air and another 6 on the groud.
  stellar performance this season means Gomaz makes it into the record books breaking an alltime single season total yardage record. Congratulations Gomez!  </p>
</section>


</main>


<?php include_once 'view/footer.php' ?>