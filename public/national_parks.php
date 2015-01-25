<?php

define ('DB_HOST', '127.0.0.1');
define ('DB_NAME', 'national_parks_db');
define ('DB_USER', 'park_user');
define ('DB_PASS', 'forest');

require_once('../db_connect.php');

class cleanPost
{
    public function __construct ($filename)
    {
        $this->filename = ($filename);
    }

    public function sanitize ($parks) 
    {
        foreach ($parks as $key => $value) {
            $parks[$key] = htmlspecialchars(strip_tags($value));  // Overwrite each value.
        }
        return $parks;
    }
}
$filename = 'national_parks.php';
$count = $dbc->query('SELECT count(*) FROM national_parks')->fetchColumn();
$limit = 3;
$pageCount = ceil($count/$limit);
$max = 1;
try {
	if(!isset($_GET['page'])) {
		$page = 1;
        $previous = max(abs($page - 1), $max);
        $next = abs($page + 1);
        $offset = abs($page -1) * $limit;
    } else {
        $page = min($pageCount, $_GET['page']);
        $previous = max(abs($page - 1), $max);
		$next = min((abs($page) + 1), $pageCount);
		$offset = abs($page - 1) * $limit;
	}
    $query = 'SELECT park_name, location, date_established, area_in_acres, description 
              FROM national_parks 
              ORDER BY park_name ASC
              LIMIT :limit OFFSET :offset';
    $stmt = $dbc->prepare($query);
    $stmt->bindValue(':limit',  $limit,  PDO::PARAM_INT);
    $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
    $stmt->execute();
    $parks = ($stmt->fetchAll(PDO::FETCH_ASSOC));
    $parksObject = new cleanPost ($filename);
    $cleanPost = $parksObject->sanitize($_POST);
} catch (Exception $e) {
	echo 'Caught Exception: ', $e->getMessage(), "\n";
}

if (!empty($_POST)) {
    if (!empty($_POST['park_name']) && !empty($_POST['location']) && 
        !empty($_POST['date_established']) && !empty($_POST['area_in_acres']) && !empty($_POST['description'])) {
	$stmt = $query = 'INSERT INTO national_parks (park_name, location, date_established, area_in_acres, description) VALUES (:park_name, :location, :date_established, :area_in_acres, :description)';
	$stmt = $dbc->prepare($query);

    $stmt->bindValue(':park_name', 			$_POST['park_name'],        PDO::PARAM_STR);
    $stmt->bindValue(':location', 			$_POST['location'],         PDO::PARAM_STR);
    $stmt->bindValue(':date_established', 	$_POST['date_established'], PDO::PARAM_STR);
    $stmt->bindValue(':area_in_acres', 		$_POST['area_in_acres'],    PDO::PARAM_STR);
    $stmt->bindValue(':description', 		$_POST['description'],      PDO::PARAM_STR);

    $stmt->execute();
        echo" 
        <script language = 'javascript'>
            alert ('Your park was successfully added.');
        </script>";
    } else {
        echo"
        <script language = 'javascript'>
        alert ('Please enter all five statistics.');
        </script>";
    }
}
?>

<html>
	<head>
	    <title>National Parks</title>

	    <style>
		body {	
			background-image: url(/img/big_bend4.jpg);
			background-size: 1500px;
			font_family: Helvitica;
			color: white;
		}

		.header {
			font-size: 15px;
			color: #66FFFF;
		}

		.font_color {
			color: #66FFFF;
		}

		.spaceUnder {
			padding-bottom: 2em;
		}			
		</style>
	</head>

	<body>
	    <h1 class = "font_color">National Parks</h1>

	<table>
        <tr>
            <th class = "header">Park Name</th>
            <th class = "header">Location</th>
            <th class = 'header'>Date Established</th>
            <th class = "header">Area in Acres</th>
            <th class = "header">Description</th>
        </tr>

        <? foreach ($parks as $key => $var): ?>
            <tr>
                <? foreach($var as $value): ?> 
                    <td class = "spaceUnder"><?= $value ?></td>
                <? endforeach; ?>
            </tr>
        <? endforeach; ?>
	</table>
	<button><a href = "?page=<?=$previous?>">Previous</a></button>
	<button><a href = "?page=<?=$next?>">Next</a></button>

    <h2 class = "font_color">Add A Park</h2>
    <form method="POST" action = "national_parks.php">      
        <input id="park_name" name="park_name" type="text" placeholder = "Park Name">
        <label for="park_name">Park Name</label>
        <br>
        <input id="location" name="location" type="text" placeholder = "Full State name">
        <label for="location">Location</label>
        <br>
        <input id="date_established" name="date_established" type="text" placeholder = "YYYY-mm-dd">
        <label for="date_established">Date Established</label>
        <br>
        <input id="area_in_acres" name="area_in_acres" type="text" placeholder = "xxxxxxx.xx">
        <label for="area_in_acres">Area in Acres</label>
        <br>
        <textarea id="description" name="description" rows="5" cols="15" placeholder = "Enter text."></textarea>
        <label for="description">Description</label>
        <br>
    <!-- <input type="submit"> -->
        <button type="submit">Add</button>
    </form>

	</body>
</html>
