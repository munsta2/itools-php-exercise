<?php
class Validate {
    private $fields;

    public function __construct() {
        $this->fields = new Fields();
    }

    public function getFields() {
        return $this->fields;
    }

    // Validate a generic text field
    public function text($name, $value,
            $required = true, $min = 1, $max = 255) {

        // Get Field object
        $field = $this->fields->getField($name);

        // If field is not required and empty, remove errors and exit
        if (!$required && empty($value)) {
            $field->clearErrorMessage();
            return;
        }

        // Check field and set or clear error message
        if ($required && empty($value)) {
            $field->setErrorMessage('Required.');
        } else if (strlen($value) < $min) {
            $field->setErrorMessage('Too short.');
        } else if (strlen($value) > $max) {
            $field->setErrorMessage('Too long.');
        } else {
            $field->clearErrorMessage();
        }
    }

    // Validate a field with a generic pattern
    public function pattern($name, $value, $pattern, $message,
            $required = true) {

        // Get Field object
        $field = $this->fields->getField($name);

        // If field is not required and empty, remove errors and exit
        if (!$required && empty($value)) {
            $field->clearErrorMessage();
            return;
        }

        // Check field and set or clear error message
        $match = preg_match($pattern, $value);
        if ($match === false) {
            $field->setErrorMessage('Error testing field.');
        } else if ( $match != 1 ) {
            $field->setErrorMessage($message);
        } else {
            $field->clearErrorMessage();
        }
    }

   public function position($name, $position, $required = true) {
        $field = $this->fields->getField($name);
    
        if (!$required && empty($value)) {
            $field->clearErrorMessage();
            return;
        }

        $this->text($name, $position, $required);


        if ($field->hasError()) { return; }
        
      
        if($position == "OL" || $position == "Qb" || $position == "DB" || $position == "DL" || $position == "LB" || $position == "TE" || $position == "Wr" || $position == "Rb") { 
            $field->clearErrorMessage();

        }else{
           
            $field->setErrorMessage("Not valid position test.");

        }
    }

    public function valid_number($name,$val, $required = true) { 
        $field = $this->fields->getField($name);
      
        if (!$required && empty($value)) {
            $field->clearErrorMessage();
            return;
        }

        $this->text($name, $val, $required);

        
     
        if ($field->hasError()) { return; }
       
        if (is_numeric($val)) {
            $field->clearErrorMessage();

        }else{
           
            $field->setErrorMessage("Not a valid value");

        }


    }
   
    public function date($name, $value, $required = true) {
        $field = $this->fields->getField($name);

        // Call the text method and exit if it yields an error
        $this->text($name, $value, $required);
        if ($field->hasError()) { return; }


        // Call the pattern method to validate a date
        $pattern = '/^(0?[1-9]|1[0-2])\/(0?[1-9]|[12][[:digit:]]|3[01])\/[[:digit:]]{4}$/';
        $message = 'Invalid date format.';
        $this->pattern($name, $value, $pattern, $message, $required);

        $birthdate = new \DateTime($value);
        // $now = new \DateTime();
        // if ($birthdate > $now) {
        //     $field->setErrorMessage('Birthdate cannot be day ahead.');
        //     return;
        // }
        
    }



   


}
?>