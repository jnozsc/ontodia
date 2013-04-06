<!DOCTYPE html>
<!-- code sample for ontodia interview -->
<html>
<head>
    <title>CS 6083: Problem Set 3</title>
    <!-- Include the bootstrap stylesheets -->
    <link rel="stylesheet" href="bootstrap.min.css">
</head>
<body>
 <div class="container">
 <h1>Table</h1>
<?php
require 'config24jBLDgUB9cQnvix.php';
$mysqli = new mysqli($dbserver, $username, $password, $databasename);
if ($_POST["search"]) {
    $keyword = $_POST["keyword"];
    $keyword = $mysqli->real_escape_string($keyword);
    $sql     = "SELECT TABLE_NAME FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = '" . $databasename . "' and TABLE_NAME like '%" . $keyword . "%'";
} else {
    $sql = "SELECT TABLE_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = '" . $databasename . "' and COLUMN_NAME = '" . $_POST["column_name"] . "'";
}
$count = 0;
if ($result = $mysqli->query($sql)) {
    if ($result->num_rows == 0 or ($_POST["search"] and empty($keyword))) {
        print "<label>Oops, nothing found!</label>";
    } else {
        if ($_POST["search"]) {
            print "<label>Here is the search result for keyword <b>" . $keyword . "</b>:</label>";
        } else {
            print "<label>Here is the search result for which tables contains a column named <b>" . $_POST["column_name"] . "</b>:</label>";
        }
        print "<table class='table table-striped table-bordered'><thead><tr><th>No.</th><th>Table</th></tr></thead><tbody>";
        while ($row = $result->fetch_assoc()) {
            $count++;
            print "<tr><td><span class='badge'>" . $count . "</span></td><td>";
            print "<form name='submitForm" . $count . "' method='POST' action='table.php'>";
            print "<input type='hidden' name='tableNameForDetail' value='" . $row['TABLE_NAME'] . "'>";
            print "<a class='btn btn-success' href='javascript:document.submitForm" . $count . ".submit()'>" . $row['TABLE_NAME'] . "</a>";
            print "</form></td></tr>";
        }
        print "</tbody></table>";
    }
    $result->free();
}
$mysqli->close();
?> 
<a href="index.php" class='btn btn-primary'>New Search</a>
</div>
</body>
</html>