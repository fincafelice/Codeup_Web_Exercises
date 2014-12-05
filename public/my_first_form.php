<?php
	var_dump($_POST);
?>

<html>
<head>
	<title>My First HTML Form</title>
</head>
<body>
	<form method="POST" action="/my_first_form.php">
    <p>
        <label for="username">Username</label>
        <input id="username" name="username" type="text" placeholder = "Enter username">
    </p>
    <p>
        <label for="password">Password</label>
        <input id="password" name="password" type="password" placeholder = "Enter password">
    </p>
    <p>
    	<button type="submit">Login</button>
        <!-- <input type="submit" value = "Login"> -->
    </p>
</form>
</body>
</html>