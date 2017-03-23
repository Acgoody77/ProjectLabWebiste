<html>
<?php
$long_data = fopen("Longitude.txt", "r") or die("cannot open Longitude.txt");
echo fread($long_data, filesize("Longitude.txt"));

fclose($long_data);
 ?>

%
</html>
