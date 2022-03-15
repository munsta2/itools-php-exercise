<?php
    // get the data from the form
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $pass = filter_input(INPUT_POST, 'password');
    $phone = filter_input(INPUT_POST, 'phone');
    $contact = $_POST['contact_via'];
    if (isset($_POST["heard_from"])) {
        $heardFrom = $_POST["heard_from"];
        } else {
        $heardFrom = "unknown";
        }
    if (isset($_POST["wants_updates"])) {
            $updates = "Yes";
    }
    else {
            $updates = "No";
    }
    $comment = $_POST["comments"];
    $comment = nl2br($comment,false);
    // get the rest of the data for the form

    // for the heard_from radio buttons,
    // display a value of 'Unknown' if the user doesn't select a radio button

    // for the wants_updates check box,
    // display a value of 'Yes' or 'No'
?>
<!DOCTYPE html>
<html>
<head>
    <title>Account Information</title>
    <link rel="stylesheet" type="text/css" href="main.css"/>
</head>
<body>
    <main>
        <h1>Account Information</h1>

        <label>Email Address:</label>
        <span><?php echo htmlspecialchars($email); ?></span><br>

        <label>Password:</label>
        <span><?php echo htmlspecialchars($pass) ; ?></span><br>

        <label>Phone Number:</label>
        <span><?php echo htmlspecialchars($phone); ?></span><br>

        <label>Heard From:</label>
        <span><?php echo htmlspecialchars($heardFrom); ?></span><br>

        <label>Send Updates:</label>
        <span><?php echo htmlspecialchars($updates); ?></span><br>

        <label>Contact Via:</label>
        <span><?php echo htmlspecialchars($contact); ?></span><br>

        <span>Comments:</span><br>
        <span><?php echo $comment; ?></span><br>        
    </main>
</body>
</html>