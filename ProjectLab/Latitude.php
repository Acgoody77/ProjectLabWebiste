<html>
<?php
$lat_data = fopen("Latitude.txt", "r") or die("cannot open Latitude.txt");
echo fread($lat_data, filesize("Latitude.txt"));

fclose($lat_data);
 ?>

%
</html>
