<?php

define ('DB_HOST', '127.0.0.1');
define ('DB_NAME', 'national_parks_db');
define ('DB_USER', 'park_user');
define ('DB_PASS', 'forest');

require_once('db_connect.php');

$parks = [
	['park_name' => 'Big Bend','location' => 'Texas', 'date_established' => '1944-06-12', 'area_in_acres' =>'801163.21'],
	['park_name' => 'Capital Reef', 'location' => 'Utah', 'date_established' => '1971-12-18', 'area_in_acres' => '337597.83'],
	['park_name' => 'Channel Islands', 'location' => 'California', 'date_established' => '1980-03-05', 'area_in_acres' => '249561.00'],
	['park_name' => 'Death Valley', 'location' => 'Nevada', 'date_established' => '1994-10-31', 'area_in_acres' => '13647.60'],
	['park_name' => 'Dry Tortugas', 'location' => 'Florida', 'date_established' => '1992-10-26', 'area_in_acres' => '64701.22'],
	['park_name' => 'Glacier', 'location' => 'Montana', 'date_established' => '1910-05-11', 'area_in_acres' => '1013572.41'],
	['park_name' => 'Haleakala', 'location' => 'Hawaii', 'date_established' => '1916-08-01', 'area_in_acres' => '29093.67'],
	['park_name' => 'Saguaro', 'location' => 'Arizona', 'date_established' => '1994-10-14', 'area_in_acres' => '91439.71'],
	['park_name' => 'Virgin Islands', 'location' => 'US Virgin Islands', 'date_established' => '1956-08-02', 'area_in_acres' => '14688.87'],
	['park_name' => 'Yosemite', 'location' => 'California', 'date_established' => '1890-10-01', 'area_in_acres' => '761266.19']
]; 

foreach ($parks as $park) {
	$query = "INSERT INTO national_parks (park_name, location, date_established, area_in_acres) VALUES ('{$park['park_name']}', '{$park['location']}', '{$park['date_established']}', '{$park['area_in_acres']}')";

    $dbc->exec($query);

    echo "Inserted ID: " . $dbc->lastInsertId() . PHP_EOL;
}