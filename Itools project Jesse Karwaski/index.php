
<?php include_once 'view/header.php';

$images = array("images/roll2.jpg", "images/roll3.jpg", "images/roll4.jpg");




?>


<head>
    <link rel="stylesheet" type="text/css"href="css/main.css">
</head>
<main>
  

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



<h1>more testing</h1>
<script>
let slideIndex = 0;
showSlides();

function showSlides() {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 2000); // Change image every 10 seconds
}
</script>
</main>


<?php include_once 'view/footer.php' ?>