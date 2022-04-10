<?php include('../view/header.php'); ?>

<head>
    <link rel="stylesheet" type="text/css" href="login.css">
</head>
<main>
    <form action='.' method='post' class='login'>
      
                <label>Customer: </label>
                <?php echo $customer['firstName'] . ' ' . $customer['lastName']; ?>
                <br>
                <label>Product:</label>
        
    
              
                <?php $_SESSION['customerID'] = $customer['customerID']; ?>
                <select name='productCode'>
                    <?php foreach($products as $product) : ?>
                    <option value='<?php echo $product['productCode']; ?>'>
                            <?php echo $product['name']; ?></option>
                    <?php endforeach; ?>
        
        <input type='hidden' name='action' value='register_product' />
        <br />
        <label></label>
        <input type='submit' value='Register Product' />
   
        
        <br />
    </form>
    <form action='.' method='post' class='login'>
    <input type='hidden' name='action' value='log out' />
    <em>You are logged in as <?php echo $_SESSION['email']; ?>.</em>
    <input type='submit' value='log out'/>
    </form>
    
</main>

<?php include('../view/footer.php'); ?>