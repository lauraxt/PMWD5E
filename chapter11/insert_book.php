<html>
<head>
  <title>Book-O-Rama Book Entry Results</title>
</head>
<body>
<h1>Book-O-Rama Book Entry Results</h1>
<?php

  if (!isset($_POST['isbn']) || !isset($_POST['author']) 
       || !isset($_POST['title']) || !isset($_POST['price'])) {
     echo "You have not entered all the required details.<br />"
          ."Please go back and try again.";
     exit;
  }

  // create short variable names
  $isbn=$_POST['isbn'];
  $author=$_POST['author'];
  $title=$_POST['title'];
  $price=$_POST['price'];
  $price = doubleval($price);

  @ $db = new mysqli('localhost', 'bookorama', 'bookorama123', 'books');

  if (mysqli_connect_errno()) {
     echo "Error: Could not connect to database.  Please try again later.";
     exit;
  }

  $query = "insert into books values
            (?, ?, ?, ?)";
  $stmt = $db->prepare($query);
  $stmt->bind_param('sssd', $isbn, $author, $title, $price);
  $stmt->execute();

  if ($stmt->affected_rows > 0) {
      echo  "Book inserted into the database.";
  } else {
      echo "An error has occurred.  The item was not added.";
  }

  $db->close();
?>
</body>
</html>
