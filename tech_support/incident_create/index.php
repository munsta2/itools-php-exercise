<?php include_once '../view/header.php'; ?>

<main>
    <h1>Get Customer</h1>
    <p>You must enter customer's email address to select customer.</p>

    <form action="incident.php" method="post"
               class="incident">
            <label>Email:</label>
            <input type="text" name="email">
            <label>&nbsp;</label>
            <input type="submit" value="Login"><br>
        </form>
</main>

<?php include_once '../view/footer.php'; ?>