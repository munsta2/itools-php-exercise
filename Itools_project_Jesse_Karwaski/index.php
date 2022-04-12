<?php include_once 'view/header.php';
require('model/database.php');
require("model/teams_db_functions.php");
//require("errors/database_error.php");

update_team_stats();

$images = array("images/roll2.jpg", "images/roll3.jpg", "images/roll4.jpg");




?>


<head>
    <link rel="stylesheet" type="text/css"href="css/main.css">
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


<h1>more testing</h1>

<img src="images/ottawa-sooners-logo.webp" alt="">


</main>


<?php include_once 'view/footer.php' ?>