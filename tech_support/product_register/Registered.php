<?php include_once '../view/header.php';

$product_code = filter_input(INPUT_POST, 'products');

?>


<main>
    <h1>Register Product</h1>
    <p>product (<?php echo $product_code; ?>) was registered successfully</p>
</main>

<?php include_once '../view/footer.php'; ?>