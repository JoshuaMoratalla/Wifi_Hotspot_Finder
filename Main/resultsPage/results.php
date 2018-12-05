<html>
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="Hotspots matching search">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Search Results</title>
    </head>
    <body>
        <?php
            include '../header.php';
        ?>

        <?php
            include 'resultsTable.php';
        ?>
        <?php
            include '../footer.php';

            //create the map with all search results
            include 'initialiseResultsMap.php';
        ?>
    </body>
</html>