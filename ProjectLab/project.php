<!DOCTYPE html>
<html>

<head>
</head>

<body>

<h1>NMEA GPS raw data</h1>

<?php

	/*echo readfile("rawdata.txt");
	echo "<br><br>";*/


	//input raw data from microcontroller
	$rawGPSdata = fopen("rawdata.txt", "r") or die("cant open file");
	$data = fread($rawGPSdata, filesize("rawdata.txt"));
	echo $data;

	//parse all of the data into usable chunks
	$parseGPS = explode("," , $data);

	fclose($rawGPSdata);


	echo "<br>";

	//show all the data after parsing
	for($x = 0; $x <= 14; $x++){
		echo $parseGPS[$x];
		echo "<br>";
	}

	echo "<br>";
	echo "<br>";

	$Mov_lat = fopen("move_latitude.txt", "r") or die("cant open move_latitude.txt");
	$Mov_lat_dat = fread($Mov_lat, filesize("move_latitude.txt"));

	echo "Move to: ";
	echo $Mov_lat_dat;
	fclose($Mov_lat);

	echo "<br>";

	$mov_lng = fopen("move_longitude.txt", "r") or die("cant open move_longitude.txt");
	$mov_lng_dat = fread($mov_lng, filesize("move_longitude.txt"));

	echo "Move to: ";
	echo $mov_lng_dat;
	fclose($mov_lng);

	echo "<br>";

	/////test////
	
	$Battery = fopen("battery_lvl.txt", "r") or die("cant open file");
	$Bat_data = fread($Battery, filesize("battery_lvl.txt"));
	echo "Battery Level: ";
	echo $Bat_data;
	echo "%";
	
	echo "<br>";
	///endtest////


	//write the latitude to a file
	
	$latitude = fopen("Latitude.txt", "w") or die("cant open Longitude.txt");
	
	$write_latitude = $parseGPS[2] . $parseGPS[3];
	fwrite($latitude, $write_latitude);

	fclose($latitude);

	$Longitude = fopen("Longitude.txt", "w") or die("cant open Longitude.txt");
	
	$write_longitude = $parseGPS[4] . $parseGPS[5];
	fwrite($Longitude, $write_longitude);

	fclose($Longitude);
/*
	//open the latitude file and read it
	$latitudeOpen = fopen("parsedLocation.txt", "r") or die("cant read parsedLocation.txt");

	echo fread($latitudeOpen, filesize("parsedLocation.txt"));

	fclose($latitudeOpen);
*/
	//show current latitude
	echo "Current Latitude: ";
	echo $parseGPS[2];
	echo " ";
	echo $parseGPS[3];
	
	echo "<br>";
	//show current longitude
	echo "Current Longitude: ";
	echo $parseGPS[4];
	echo " ";
	echo $parseGPS[5];


?>

</body>
</html>
