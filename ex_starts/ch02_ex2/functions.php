<?php
function future_value($investment,$years,$interest_rate) {
   
    for ($i = 1; $i <= $years; $i++) {
        $investment += $investment * $interest_rate * .01; 
    }
    return $investment;
}

function apply_currency_formant($str) {
    return '$'.number_format($str, 2);
}

function apply_percent_formant($str) {
   return  $str.'%';
}
?>

}