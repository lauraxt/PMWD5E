<?php

  require_once("file_exceptions.php");

  // create short variable names
  $tireqty = (int) $_POST['tireqty'];                                           
  $oilqty = (int) $_POST['oilqty'];                                             
  $sparkqty = (int) $_POST['sparkqty'];                                         
  $address = preg_replace('/\t|\R/',' ',$_POST['address']);                     
  $document_root = $_SERVER['DOCUMENT_ROOT'];                                   
  $date = date('H:i, jS F Y'); 
?>
<html>
<head>
  <title>Bob's Auto Parts - Order Results</title>
</head>
<body>
<h1>Bob's Auto Parts</h1>
<h2>Order Results</h2>
<?php

echo "<p>Order processed at ".$date."</p>";

echo '<p>Your order is as follows: </p>';

$totalqty = 0;
$totalqty = $tireqty + $oilqty + $sparkqty;
echo "Items ordered: ".$totalqty."<br />";

if( $totalqty == 0) {
  echo "You did not order anything on the previous page!<br />";
} else {
  if ( $tireqty > 0 ) {
    echo $tireqty." tires<br />";
  }
  if ( $oilqty > 0 ) {
    echo $oilqty." bottles of oil<br />";
  }
  if ( $sparkqty > 0 ) {
    echo $sparkqty." spark plugs<br />";
  }
}

$totalamount = 0.00;

define('TIREPRICE', 100);
define('OILPRICE', 10);
define('SPARKPRICE', 4);

$totalamount = $tireqty * TIREPRICE
             + $oilqty * OILPRICE
             + $sparkqty * SPARKPRICE;

$totalamount=number_format($totalamount, 2, '.', ' ');

echo "<p>Total of order is ".$totalamount."</p>";
echo "<p>Address to ship to is ".htmlspecialchars($address)."</p>";

$outputstring = $date."\t".$tireqty." tires \t".$oilqty." oil\t"
                  .$sparkqty." spark plugs\t\$".$totalamount
                  ."\t". $address."\n";

// open file for appending
try
{
  if (!($fp = @fopen("$DOCUMENT_ROOT/../orders/orders.txt", 'ab')))
      throw new fileOpenException();

  if (!flock($fp, LOCK_EX))
     throw new fileLockException();

  if (!fwrite($fp, $outputstring, strlen($outputstring)))
     throw new fileWriteException();
  flock($fp, LOCK_UN);
  fclose($fp);
  echo "<p>Order written.</p>";
}
catch (fileOpenException $foe)
{
   echo "<p><strong>Orders file could not be opened.
         Please contact our webmaster for help.</strong></p>";
}
catch (Exception $e)
{
   echo "<p><strong>Your order could not be processed at this time.
         Please try again later.</strong></p>";
}

?>
</body>
</html>
