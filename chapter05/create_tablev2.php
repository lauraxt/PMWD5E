<html>
<head>
<style>
table,tr,td {
  border:solid 2px;
}
</style>
</head>
<body>
<?php
function create_table($data, $header=NULL, $caption=NULL) {
  echo '<table>';
  if ($caption) {
    echo "<caption>$caption</caption>"; 
  }
  if ($header) {
    echo "<tr><th>$header</th></tr>"; 
  }
  reset($data);
  $value = current($data);
  while ($value) {
     echo "<tr><td>$value</td></tr>\n";
     $value = next($data);
  }
  echo '</table>';
}



$my_data = ['First piece of data','Second piece of data','And the third'];
$my_header = 'Data';
$my_caption = 'Data about something';
create_table($my_data, $my_header, $my_caption);
?>
</body>
</html>
