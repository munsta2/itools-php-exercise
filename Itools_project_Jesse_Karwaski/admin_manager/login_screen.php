<?php include_once '../view/header.php'; ?>

<head>
    <link rel="stylesheet" href="admin.css">
</head>
<main>

<h1>Admin login</h1>

    <form action="." method="post"  >

        <table>
            <tr>
                <th><input type="hidden" name="action" value="login attempt">
                <label style="font-weight: normal">Username:</label></th>
                <th> <input type="text" name="username"></th>
            </tr>
            <tr>
                <td> <label>password:</label></td>
                <td>  <input type="text" name="password"></td>
            </tr>
            <tr>
                <td><input type="submit" value="Login"></td>
            </tr>
        </table>
       
       <br>
       
    </form>

</main>

<?php include_once '../view/footer.php'; ?>