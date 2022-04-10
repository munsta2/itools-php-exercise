<?php include('../view/header.php'); ?>
<head>
    <link rel="stylesheet" href="login.css">
</head>
<main>
    <h3>Customer Login</h3>
    <p>You must login before you can register a product.</p>
    <form action='.' method='post' class='login'>
        <label>Email:</label>
        <input type='hidden' name='action'
               value='verify_email' />
        <input type='text' name='email' />
     <br>
        <label>Password:</label>
        <input type='text' name='password' />
        <br>
        <input type='submit' value='Login' />
       
    </form>
    </main>

<?php include('../view/footer.php'); ?>