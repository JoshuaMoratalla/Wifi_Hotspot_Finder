<html>
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="Search for hotpots">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Search</title>
        <link href="../CSS/cssStyle.css" rel="stylesheet" type="text/css"/>
        <script src="../JavaScript/geolocation.js"></script>
        <script src="../JavaScript/registrationValidation.js"></script>
    </head>

    <body>
        <!-- Header division containing the title of the page and the navigation menu-->
            <?php
            //include the code for the navigation menu
            include "../header.php";
            ?>
        <?php
            //an array that will include any errors that may occur while posting the form
            $errors = array();
            include 'searchForm.php';

            include "../footer.php";
        ?>
    </body>
</html>