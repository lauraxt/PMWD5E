<html>
<head>
  <title>Book-O-Rama Search Results</title>
</head>
<body>
<h1>Book-O-Rama Search Results</h1>
<?php
  // create short variable names
  $searchtype=$_POST['searchtype'];
  $searchterm=trim($_POST['searchterm']);

  if (!$searchtype || !$searchterm) {
     echo 'You have not entered search details.  Please go back and try again.';
     exit;
  }

  // whitelist the searchtype
  switch ($searchtype) {
    case 'title':
    case 'author':
    case 'isbn':   
              break;
    default: 
              echo 'That is not a valid search type. Go back and try again.';
              exit; 
  }

  $db = new mysqli('localhost', 'bookorama', 'bookorama123', 'books');
  if (mysqli_connect_errno()) {
     echo 'Error: Could not connect to database.  Please try again later.';
     exit;
  }

  $query = "select * from books where $searchtype = ?";
  $stmt = $db->prepare($query);
  $stmt->bind_param('s', $searchterm);  
  $stmt->execute();
  $stmt->store_result();

  $stmt->bind_result($title, $author, $isbn, $price);

  echo "<p>Number of books found: ".$stmt->num_rows."</p>";

  while($stmt->fetch()) {
    echo "<p><strong>Title: ".$title."</strong>";
    echo "<br />Author: ".$author;
    echo "<br />ISBN: ".$isbn;
    echo "<br />Price: ".$price."</p>";
  }

  $stmt->free_result();
  $db->close();

?>
</body>
</html>
