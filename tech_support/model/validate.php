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

    public function phone($name, $value, $required = false) {
        $field = $this->fields->getField($name);

        // Call the text method and exit if it yields an error
        $this->text($name, $value, $required);
        if ($field->hasError()) { return; }

        // Call the pattern method to validate a phone number
        $pattern = '/^\(\d{3}\) ?\d{3}-\d{4}$/';
                    
        $message = 'Invalid phone number.';
        $this->pattern($name, $value, $pattern, $message, $required);
         
    }

    public function email($name, $value, $required = true, $min = 1,  $max = 21) {
        $field = $this->fields->getField($name);


        // If field is not required and empty, remove errors and exit
        if (!$required && empty($value)) {
            $field->clearErrorMessage();
            return;
        }

        //remove errors 
        if (!$required && empty($value)){
            $field->clearErrorMessage();
            return;
        }
        
        //filter_var step #8
        $email = filter_var($value, FILTER_VALIDATE_EMAIL);


        //error message if not valid email
        if($email === false || strlen($value) > $max || (strlen($value) < $min)){
            $field->setErrorMessage("Not valid email.");
        }else{
            $field->clearErrorMessage();
        }

      
    }

    public function password($name, $password, $required = true) {
        $field = $this->fields->getField($name);

        if (!$required && empty($password)) {
            $field->clearErrorMessage();
            return;
        }

        $this->text($name, $password, $required, 8);
        if ($field->hasError()) { return; }

        // Patterns to validate password
        $charClasses = array();
        $charClasses[] = '[:digit:]';
        $charClasses[] = '[:upper:]';
        $charClasses[] = '[:lower:]';
       // $charClasses[] = '_-';

        $pw = '/^';
        $valid = '[';
        foreach($charClasses as $charClass) {
            $pw .= '(?=.*[' . $charClass . '])';
            $valid .= $charClass;
        }
        $valid .= ']{6,}';
        $pw .= $valid . '$/';

        $pwMatch = preg_match($pw, $password);

        if ($pwMatch === false) {
            $field->setErrorMessage('Error testing password.');
            return;
        } else if ($pwMatch != 1) {
            $field->setErrorMessage(
                    'Must have one each of upper case letter and one digit.');
            return;
        }
    }

    public function verify($name, $password, $verify, $required = true) {
        $field = $this->fields->getField($name);
        $this->text($name, $verify, $required, 6);
        if ($field->hasError()) { return; }

        if (strcmp($password, $verify) != 0) {
            $field->setErrorMessage('Passwords do not match.');
            return;
        }
    }

    public function state($name, $value, $required = true) {
        $field = $this->fields->getField($name);
        $this->text($name, $value, $required);
        if ($field->hasError()) { return; }

        $states = array(
            'AL', 'AK', 'AZ', 'AR', 'CA', 'CO', 'CT', 'DE', 'DC',
            'FL', 'GA', 'HI', 'ID', 'IL', 'IN', 'IA', 'KS', 'KY',
            'LA', 'ME', 'MA', 'MD', 'MI', 'MN', 'MS', 'MO', 'MT',
            'NE', 'NV', 'NH', 'NJ', 'NM', 'NY', 'NC', 'ND', 'OH',
            'OK', 'OR', 'PA', 'RI', 'SC', 'SD', 'TN', 'TX', 'UT',
            'VT', 'VA', 'WA', 'WV', 'WI', 'WY');
        $states = implode('|', $states);
        $pattern = '/^(' . $states . ')$/';
        $this->pattern($name, $value, $pattern,
                'Invalid state.', $required);
    }



   


}
?>