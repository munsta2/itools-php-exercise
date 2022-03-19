<?php
//set default values
$number1 = 78;
$number2 = -105.33;
$number3 = 0.0049;
$message = 'Enter some numbers and click on the Submit button.';

//process
$action = filter_input(INPUT_POST, 'action');
switch ($action) {
    case 'process_data':
        $number1 = filter_input(INPUT_POST, 'number1');
        $number2 = filter_input(INPUT_POST, 'number2');
        $number3 = filter_input(INPUT_POST, 'number3');

        //are three numbers inputted?
        if(empty($number1) ||
            empty($number2) ||
            empty($number3)){
            $message = 'Please enter in all three numbers.';
            break;
        }    
        
        //are the numbers valid
        if(!is_numeric($number1) ||
                !is_numeric($number2) ||
                !is_numeric($number3)){
            $message = 'You must enter three valid numbers.';
            break;
        }
        
        //ceiling and floor for #2
        $ceil = ceil($number2);
        $floor = floor($number2);
        
        //round to 3 decimal places
        $number3_round = round($number3, 3);
        
        //min value
        $min = min($number1, $number2, $number3);
        
        //max value 
        $max = max($number1, $number2, $number3);
        
        //random number form 1-100
        $random = mt_rand(1, 100);
        
        //output upon submit
        $message =
            "Number 1: $number1\n" .
            "Number 2: $number2\n" .
            "Number 3: $number3\n" .
            "\n" .
            "Number 2 ceiling: $ceil\n" .
            "Number 2 floor: $floor\n" .
            "Number 3 rounded: $number3_round\n" .
            "\n" .
            "Min: $min\n" .
            "Max: $max\n" .
            "\n" .
            "Random: $random\n";
            

        break;
}
include 'number_tester.php';
?>