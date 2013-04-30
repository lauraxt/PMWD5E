<?php
  $pictures = array('tire.jpg', 'oil.jpg', 'spark_plug.jpg',
                    'door.jpg', 'steering_wheel.jpg',
                    'thermostat.jpg', 'wiper_blade.jpg',
                    'gasket.jpg', 'brake_pad.jpg');

  shuffle($pictures);
?>
<html>
<head>
  <title>Bob's Auto Parts</title>
</head>
<body>

<h1>Bob's Auto Parts</h1>
<div align="center">
<table width = 100%>
<tr>

<?php
  for ($i = 0; $i < 3; $i++) {
    echo "<td align=\"center\"><img src=\"";
    echo $pictures[$i];
    echo "\"/></td>";
  }
?>
</tr>
</table>
</div>
</body>
</html>
