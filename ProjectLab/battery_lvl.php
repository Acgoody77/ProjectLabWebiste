<html>
<?php
$battery_data = fopen("battery_lvl.txt", "r") or die("cannot open battery_lvl.txt");
echo fread($battery_data, filesize("battery_lvl.txt"));

fclose($battery_data);
 ?>

%
</html>
