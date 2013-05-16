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
function create_table($data) {
  echo '<table>';
  reset($data);
  $value = current($data);
  while ($value) {
     echo "<tr><td>$value</td></tr>\n";
     $value = next($data);
  }
  echo '</table>';
}

$my_data = ['First piece of data','Second piece of data','And the third'];
create_table($my_data);
?>
</body>
</html>
