<?php
    //getting data
    $product = filter_input(INPUT_POST, "product_description");
    $price = filter_input(INPUT_POST,"list_price",FILTER_VALIDATE_FLOAT);
    $discount = filter_input(INPUT_POST, "discount_percent",FILTER_VALIDATE_FLOAT);

    $discount_amount = $price * ($discount / 100);
    $discount_price = $price - $discount_amount;

    if ( empty($product) ||  empty($price) || empty($discount)) {
        $error_msg = "all feilds are required";
    }
    else if ( !is_numeric($price) || !is_numeric($discount)) {
        $error_msg ="price and discount must be a valid number";
    }
    else if ($price < 0 || $discount < 0) {
        $error_msg = "price and discount must be greater then 0";
    }

    else {
        $error_msg = "";
    }

    if ($error_msg != "") {
        include('index.html');
        exit(); 
    }

    //sales tax

    $sales_tax = $discount_price * 0.08;
    $total_sale = $discount_price - $sales_tax;

    //foramting 
    $price_f = '$'.number_format($price,2);
    $discount_f = $discount."%";
    $discount_amount_f = '$'.number_format($discount_amount,2);
    $discount_price_f = '$'.number_format($discount_price,2);
    $sales_tax_f = '$'.number_format($sales_tax,2);
    $total_sale_f = '$'.number_format($total_sale,2);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Product Discount Calculator</title>
    <link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>
    <main>
        <h1>Product Discount Calculator</h1>
        
        <label>Product Description:</label>
        <span><?php echo htmlspecialchars($product); ?></span><br>

        <label>List Price:</label>
        <span><?php echo htmlspecialchars($price_f); ?></span><br>

        <label>Standard Discount:</label>
        <span><?php echo htmlspecialchars($discount_f); ?></span><br>

        <label>Discount Amount:</label>
        <span><?php echo $discount_amount_f; ?></span><br>

        <label>Discount Price:</label>
        <span><?php echo $discount_price_f; ?></span><br>

        <label>Sales tax rate:</label>
        <span><?php echo '8%'; ?></span><br>

        <label>sales tax amount:</label>
        <span><?php echo $sales_tax_f; ?></span><br>

        <label>Total price:</label>
        <span><?php echo $total_sale_f; ?></span><br>
       
    </main>
</body>
</html>