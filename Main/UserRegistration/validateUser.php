<?php
    function validate_email(&$errors, $field_list, $field_name) {
        $pattern = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/';
        if (!preg_match($pattern, $field_list[$field_name])) {
            $errors[$field_name] = 'Please input a valid email address e.g. "Example@email.com"';
        }
        validate_required_field($errors, $field_list, $field_name);

        include '../databaseConnection.php';

        try
        {
            $result = $pdo->prepare('SELECT Email '
                .'FROM members '
                .'WHERE Email = :emailAddress');
            $result->bindValue(':emailAddress', $field_list[$field_name]);

            $result->execute();
        }
        catch (PDOException $e)
        {
            echo $e->getMessage();
        }

        if ($result->rowCount() > 0) {
            $errors[$field_name] = 'There already exists an account with this email address';
        }
    }

    function validate_password(&$errors, $field_list, $field_name) {
        $pattern = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/';
        if (!preg_match($pattern, $field_list[$field_name])) {
            $errors[$field_name] = 'Your password needs to be at least 8 characters, with at least one number and both uppercase and lowercase letters';
        }
        validate_required_field($errors, $field_list, $field_name);
    }

    function check_password_match(&$errors, $field_list, $password, $passwordCheck) {
        if ($field_list[$password] != $field_list[$passwordCheck]) {
            $errors[$passwordCheck] = 'Passwords don\'t match. Retype your password and try again.';
        }
    }

    function validate_postcode(&$errors, $field_list, $field_name) {
        $pattern = '/^[0-9]{4}$/';
        if (!preg_match($pattern, $field_list[$field_name])) {
            $errors[$field_name] = 'Please enter a 4-digit postcode';
        }
        validate_required_field($errors, $field_list, $field_name);
    }

    function validate_gender (&$errors, $field_list, $field_name) {
        if (!($field_list[$field_name] == "Male" || $field_list[$field_name] == "Female" || $field_list[$field_name] == "Other")) {
            $errors[$field_name] = 'Please select a gender from the list';
        }
    }

    function validate_date (&$errors, $field_list, $field_name) {
        $pattern = '/(\d+)(-|\/)(\d+)(?:-|\/)(?:(\d+)\s+(\d+):(\d+)(?::(\d+))?(?:\.(\d+))?)?/';
        $today = date("Y-m-d");
        if (!preg_match($pattern, $field_list[$field_name]) || !($field_list[$field_name] <= $today)
            || !($field_list[$field_name] >= '1900-12-12')) {
            $errors[$field_name] = 'Please input a valid date of birth';
        }
        validate_required_field($errors, $field_list, $field_name);
    }

    function validate_name(&$errors, $field_list, $field_name) {
        $pattern = '/[A-Za-z]{1,40}/';
        if (!preg_match($pattern, $field_list[$field_name])) {
            $errors[$field_name] = 'Please only use English characters';
        }
        validate_required_field($errors, $field_list, $field_name);
    }

    function validate_required_field(&$errors, $field_list, $field_name) {
        if (!isset($field_list[$field_name])|| empty($field_list[$field_name])) {
            $errors[$field_name] = 'Please fill in this field';
        }
    }
?>