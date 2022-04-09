<?php include("../view/header.php"); ?>
<head>
    <link rel="stylesheet" href="customer_select.css">
</head>
<main>
    <?php echo $condition ?>
    <h1>Add/Update Customer</h1>
        <form action='.' method='post' class='select_form'>
            
          
                   <label>First Name:</label>
        <input type="text" name="first_name" 
               value="<?php echo htmlspecialchars($first_name);?>">
        <?php echo $fields->getField('first_name')->getHTML(); ?><br>

            <label>Last Name:</label>
        <input type="text" name="last_name" 
               value="<?php echo htmlspecialchars($last_name);?>">
        <?php echo $fields->getField('last_name')->getHTML(); ?><br>

            <label>Address:</label>
        <input type="text" name="address" 
               value="<?php echo htmlspecialchars($address);?>">
        <?php echo $fields->getField('address')->getHTML(); ?><br>
            <label>City</label>
    
        <input type="text" name="city" 
               value="<?php echo htmlspecialchars($city); ?>">
        <?php echo $fields->getField('city')->getHTML(); ?><br>
        <label>State:</label>
        <input type="text" name="state" 
               value="<?php echo htmlspecialchars($state); ?>">
        <?php echo $fields->getField('state')->getHTML(); ?><br>
        
        <label>Postal Code:</label>
        <input type="text" name="postal_code" 
               value="<?php echo htmlspecialchars($postal_code); ?>">
        <?php echo $fields->getField('postal_code')->getHTML(); ?>
        <br> 

            <label>Country</label>
            <select name="country_code">
                <?php foreach ($countries as $country): ?>
                <?php if($country_code == $country['countryCode']): ?>
                <option value="<?php echo $country['countryCode']; ?>" selected>
                    <?php echo $country['countryName']; ?>
                </option>
                <?php else: ?>
                <option value="<?php echo $country['countryCode']; ?>" >
                    <?php echo $country['countryName']; ?>
                </option>
                <?php endif; ?>
                <?php endforeach; ?>
            </select>
            <br />
            <label>Phone Number:</label>
        <input type="text" name="phone" 
               value="<?php echo htmlspecialchars($phone); ?>">
        <?php echo $fields->getField('phone')->getHTML(); ?><br>
            <label>E-Mail:</label>
        <input type="text" name="email" 
               value="<?php echo htmlspecialchars($email);?>">
        <?php echo $fields->getField('email')->getHTML(); ?><br>
       
       
        <label>Password</label>
        <input type="text" name="password" 
               value="<?php echo htmlspecialchars($password);?>">
        <?php echo $fields->getField('password')->getHTML(); ?><br>
          

            <input type='hidden' name='action'
                   value='update_customer' />
            <input type='hidden' name='customerID' 
                   value='<?php echo $customerID; ?>' />

            <?php if($condition == "new"): ?>
                <input type='submit' value='Add Customer' />
                <input type='hidden' name='condition' value='new' />
            <?php else: ?>
                <input type='submit' value='Update Customer' />
                <input type='hidden' name='condition' value='update' />

            <?php endif; ?>
        
        </form>

    <br />
    <br />
    <a href='.'>Search Customers</a>
                </main>

<?php include("../view/footer.php"); ?>