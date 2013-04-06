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
  <h1>Attribute</h1>
<?php
require 'config24jBLDgUB9cQnvix.php';
$table = $_POST["tableNameForDetail"];
print "<label>Details about table <b>" . $table . "</b>:</label>";
$mysqli = new mysqli($dbserver, $username, $password, $databasename);
$sql    = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = '" . $databasename . "' and TABLE_NAME = '" . $table . "'";
$count  = 0;
if ($result = $mysqli->query($sql)) {
    print "<table class='table table-striped table-bordered'><thead><tr><th>No.</th><th>Attribute</th></tr></thead><tbody>";
    while ($row = $result->fetch_assoc()) {
        $count++;
        print "<tr><td><span class='badge'>" . $count . "</span></td><td>";
        print "<form name='submitForm" . $count . "' method='POST' action='list.php'>";
        print "<input type='hidden' name='column_name' value='" . $row['COLUMN_NAME'] . "'>";
        print "<input type='hidden' name='search' value=0>";
        print "<a class='btn btn-success' href='javascript:document.submitForm" . $count . ".submit()'>" . $row['COLUMN_NAME'] . "</a>";
        print "</form></td></tr>";
    }
    print "</tbody></table>";
    $result->free();
}
$mysqli->close();
?>
<a href="index.php" class='btn btn-primary'>New Search</a>
</div>
</body>
</html>