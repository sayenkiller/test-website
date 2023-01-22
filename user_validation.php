<?php

//create a user validator class to handle validation
// constructor which  takes in POST data from form
// check required "fields to check" are present in the data
// create methods to validate individual field
// a method to validate a username
// a method to validate a password
// return an error arrray once all checks are done 
class UserValidator
{

    private $data;
    private $errors = [];
    private static $fields = ['username', 'password'];

    public function __construct($post_data)
    {
        $this->data = $post_data;
    }

    public function validateForm()
    {
        foreach (self::$fields as $field) {
            if (!array_key_exists($field, $this->data)) {
                trigger_error("$field is not present in data");
                return;
            }
        }

        $this->validateUsername();
        $this->validatePassword();
        return $this->errors;
    }

    private function validateUsername()
    {

        $val = trim($this->data['username']);

        if (empty($val)) {
            $this->addError('username', "username cannot be empty");
        } else {
            if (!preg_match('/^[a-zA-Z0-9]{8,14}$/', $val)) {
                $this->addError('username', 'username must contain at least 8 characters');
            }
        }
    }
    private function validatePassword()
    {

        $val = trim($this->data['password']);

        if (empty($val)) {
            $this->addError('password', "password cannot be empty");
        } else {
            if (!preg_match('/^.*(?=.{6,})(?=.*[a-zA-Z])(?=.*\d)(?=.*[!&$%&? "]).*$/', $val)) {
                $this->addError('password', 'Must contain Upcase 1 special cara and 1 num ');
            }
        }
    }
    private function addError($key, $val)
    {
        $this->errors[$key] = $val;
    }
}
