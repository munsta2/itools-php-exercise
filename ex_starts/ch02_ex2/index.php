<?php 
    //set default value of variables for initial page load
    if (!isset($investment)) { $investment = ''; } 
    if (!isset($interest_rate)) { $interest_rate = ''; } 
    // if (!isset($investment_f)) { $investment_f = ''; } 
    if (!isset($years)) { $years = ''; }

    $investment = filter_input(INPUT_POST, 'investment',
    FILTER_VALIDATE_FLOAT);
    $interest_rate = filter_input(INPUT_POST, 'interest_rate',
        FILTER_VALIDATE_FLOAT);
    $years = filter_input(INPUT_POST, 'years',
        FILTER_VALIDATE_INT);

    // validate investment
    // if submit button has been pressed, validate investment
    if (isset($_POST['submit_button'])){
        if ($investment === FALSE ) {
        $error_message = 'Investment must be a valid number.'; 
        } else if ( $investment <= 0 ) {
            $error_message = 'Investment must be greater than zero.'; 
        // validate interest rate
        } else if ( $interest_rate === FALSE )  {
            $error_message = 'Interest rate must be a valid number.'; 
        } else if ( $interest_rate <= 0 ) {
            $error_message = 'Interest rate must be greater than zero.'; 
        // validate years
        } else if ($interest_rate > 15 ){
            $error_message = "Interest rate must be less than or equal to 15.";
        } else if ( $years === FALSE ) {
            $error_message = 'Years must be a valid whole number.';
        } else if ( $years <= 0 ) {
            $error_message = 'Years must be greater than zero.';
        } else if ( $years > 30 ) {
            $error_message = 'Years must be less than 31.';
        // set error message to empty string if no invalid entries
        } else {
            $error_message = ''; 
        }

        // calculate the future value
        $future_value = $investment;
        for ($i = 1; $i <= $years; $i++) {
            $future_value += $future_value * $interest_rate * .01; 
        }

        // apply currency and percent formatting
        $investment_f = '$'.number_format($investment, 2);
        $yearly_rate_f = $interest_rate.'%';
        $future_value_f = '$'.number_format($future_value, 2);

        //date
        $date = date('d/m/Y');
        
        // empty text boxes
        $years2 = $years; //Prevents years from being lost in result section
        $investment = '';
        $interest_rate = '';
        $years = '';
    }

?> 
<!DOCTYPE html>
<html>
<head>
    <title>Future Value Calculator</title>
    <link rel="stylesheet" type="text/css" href="main.css">
</head>

<body>
    <main>
    <h1>Future Value Calculator</h1>
    <?php if (!empty($error_message)) { ?>
        <p class="error"><?php echo htmlspecialchars($error_message); ?></p>
    <?php } ?>
    <form  method="post">

        <div id="data">
            <label>Investment Amount:</label>
            <input type="text" name="investment"
                   value="<?php echo htmlspecialchars($investment); ?>">
            <br>

            <label>Yearly Interest Rate:</label>
            <input type="text" name="interest_rate"
                   value="<?php echo htmlspecialchars($interest_rate); ?>">
            <br>

            <label>Number of Years:</label>
            <input type="text" name="years"
                   value="<?php echo htmlspecialchars($years); ?>">
            <br>
        </div>

        <div id="buttons">
            <label>&nbsp;</label>
            <input type="submit" value="Calculate" name="submit_button"><br>
        </div>
    </form>
    <?php if (isset($_POST['submit_button']) && empty($error_message)){ ?>
        <h1>Future Value Calculator</h1>

        <label>Investment Amount:</label>
        <span><?php echo $investment_f; ?></span><br>

        <label>Yearly Interest Rate:</label>
        <span><?php echo $yearly_rate_f; ?></span><br>

        <label>Number of Years:</label>
        <span><?php echo $years2; ?></span><br>

        <label>Future Value:</label>
        <span><?php echo $future_value_f; ?></span><br>
        <p>This calculation was done on <?php echo $date ?></p>
    <?php } ?>
    </main>
</body>
</html>