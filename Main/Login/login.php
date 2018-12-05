<?php
//an array that will include any errors that may occur while posting the form
$errors = array();

//Check if user is trying to log in
if (isset($_POST['Login'])) {

    // validate posted username and password here and login to account if valid
    require_once 'validateLogin.php';
    if (check_password($errors, $_POST['username'], $_POST['password'])) {
        //reload login page to prevent starting a new session and let the user know that they are now logged in
        header('Location: login.php');
        exit();
    }
}
?>

<html>
    <head>
        <meta charset="utf-8">
        <title>Login</title>
        <!--Link to Javascript files-->
        <script type="text/javascript" src="../JavaScript/registrationValidation.js"></script>
    </head>
    <body>
        <?php
            include '../header.php';
            //start session to allow use of session variables
            session_start();
            //check if logged in
            if (isset($_SESSION['loggedIn'])) {
                //include log in successful div
                include "loginSuccess.php";

            } else {
                //include the login form
                include 'loginForm.php';
            }

            //include code for the footer
            include '../footer.php';
        ?>
    </body>
</html>
