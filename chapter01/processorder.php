<?php
  // create short variable names
  $tireqty = $_POST['tireqty'];
  $oilqty = $_POST['oilqty'];
  $sparkqty = $_POST['sparkqty'];
?>
<html>
<head>
  <title>Bob's Auto Parts - Order Results</title>
</head>
<body>
<h1>Bob's Auto Parts</h1>
<h2>Order Results</h2>
<?php
  echo "<p>Order processed at ";
  echo date('H:i, jS F Y');
  echo "</p>";
  echo '<p>Your order is as follows: </p>';

  $totalqty = 0;
  $totalamount = 0.00;

  define('TIREPRICE', 100);
  define('OILPRICE', 10);
  define('SPARKPRICE', 4);

  $totalqty = $tireqty + $oilqty + $sparkqty;
  echo "Items ordered: ".$totalqty."<br />";

  if ($totalqty == 0) {
    echo "You did not order anything on the previous page!<br />";
  } else {
    if ($tireqty > 0)
      echo htmlspecialchars($tireqty).' tires<br />';
    if ($oilqty > 0)
      echo htmlspecialchars($oilqty).' bottles of oil<br />';
    if ($sparkqty > 0)
      echo htmlspecialchars($sparkqty).' spark plugs<br />';
  }

  define('TIREPRICE', 100);
  define('OILPRICE', 10);
  define('SPARKPRICE', 4);

  $totalamount = $tireqty * TIREPRICE
               + $oilqty * OILPRICE
               + $sparkqty * SPARKPRICE;

  echo "Subtotal: $".number_format($totalamount,2)."<br />";

  $taxrate = 0.10;  // local sales tax is 10%
  $totalamount = $totalamount * (1 + $taxrate);
  echo "Total including tax: $".number_format($totalamount,2)."<br />";

?>
</body>
</html>
