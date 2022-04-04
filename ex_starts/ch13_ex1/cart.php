<?php
namespace karwaski\cart {
// Add an item to the cart
function add_item(&$cart, $key, $quantity) {
    global $products;
    if ($quantity < 1) return;

    // If item already exists in cart, update quantity
    if (isset($_SESSION['cart13'][$key])) {
        $quantity += $_SESSION['cart13'][$key]['qty'];
        update_item($cart, $key, $quantity);
        return;
    }

    // Add item
    $cost = $products[$key]['cost'];
    $total = $cost * $quantity;
    $item = array(
        'name' => $products[$key]['name'],
        'cost' => $cost,
        'qty'  => $quantity,
        'total' => $total
    );
    $cart[$key] = $item;
}

// Update an item in the cart
function update_item(&$cart, $key, $quantity) {
    $quantity = (int) $quantity;
    if (isset($_SESSION['cart13'][$key])) {
        if ($quantity <= 0) {
            unset($_SESSION['cart13'][$key]);
        } else {
           $cart[$key]['qty'] = $quantity;
            $total =  $cart[$key]['cost'] *
                     $cart[$key]['qty'];
                     $cart[$key]['total'] = $total;
        }
    }
}

// Get cart subtotal
function get_subtotal ($cart ,$decimals=2) {
    $subtotal = 0;
    foreach ($cart as $item) {
        $subtotal += $item['total'];
    }
    $subtotal_f = number_format($subtotal, $decimals);
    return $subtotal_f;
}
}

?>