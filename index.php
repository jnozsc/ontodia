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
      <h1>Search</h1>
      <label>Enter keyword to search the database.</label>
<form class="well form-search" action="list.php" method="post">
<input type="text" class="input-medium search-query" name="keyword">
<input type="hidden" name="search" value = true>
<button type="submit" class="btn btn-primary">Search</button>
</form>
<div>

</body>
</html>