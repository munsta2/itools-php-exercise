<?php include_once '../view/header.php'; ?>
<main>
<h1>Customer Login</h1>
<p>you myst login before you can register a product</p>
    <form action="login.php" method="post"
               class="login">
            <label>Email:</label>
            <input type="text" name="email">
            <label>&nbsp;</label>
            <input type="submit" value="Login"><br>
        </form>

</main>
<?php include_once '../view/footer.php'; ?>