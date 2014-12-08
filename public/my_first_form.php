<?php
	var_dump($_POST);
?>

<html>
<head>
	<title>My First HTML Form</title>
</head>
<body>
	<!-- Form 1 -->
	<h2>User Login</h2>
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

	<!-- Form 2 -->
	<h2>Compose an Email</h2>
	<form method="POST" action="/my_first_form.php">
    <p>
        <label for="To:">To: </label>
        <input id="To:" name="To:" type="text">
    </p>
    <p>
        <label for="From:">From: </label>
        <input id="From:" name="From:" type="text">
    </p>
    <p>
        <label for="Subject:">Subject: </label>
        <input id="Subject:" name="Subject:" type="text">
    </p>
    <p>
        <label for="Subject:"></label>
        <textarea id="email_body" name="email_body" rows="5" cols="20" placeholder="Compose email"></textarea>
    </p>
    <!-- Add a checkbox to the "Compose an Email" form that asks a user if they want to save a copy to their sent folder. Make the checkbox checked by default. -->
    <label>
    	<input type="checkbox" id="save_email" name="save_email" value="yes" checked>
    	Do you want to save a copy to your sent folder?
    	<button type="submit">Send</button>
    </label>
	</form>

    <!-- Form 3 -->
    <h2>Multiple Choice Test</h2>
	<form method="POST" action="/my_first_form.php">
    <!-- Question with only one answer. -->
    <p>What is the best country on the planet?</p>
    <label>
    	<input type="radio" id="q1a" name="q1" value="panama">
    	Your response really doesn't matter.
    </label>
    <label>
    	<input type="radio" id="q1b" name="q1" value="panama">
    	Because the only country that matters is..
    </label>
    <label>
    	<input type="radio" id="q1c" name="q1" value="panama">
    	PANAMA!!
    </label>
    <!-- Question with only one answer. -->
    <p>Where does the best coffee in the world come from?</p>
    <label>
    	<input type="radio" id="q2a" name="q2" value="panama">
    	PANAMA!!
    </label>
    <label>
    	<input type="radio" id="q2b" name="q2" value="panama">
    	PANAMA!!
    </label>
    <label>
    	<input type="radio" id="q2c" name="q2" value="panama">
    	PANAMA!!
    </label>
    <!-- Question with multiple answers -->
    <p>Where do you want to vacation?</p>
    <label>
    	<input type="checkbox" id="q3a" name="q3[]" value="bocasdeltoro">
    	Bocas Del Toro
    </label>
    <label>
    	<input type="checkbox" id="q3b" name="q3[]" value="boquete">
    	Boquete
    </label>
    <label>
    	<input type="checkbox" id="q3c" name="q3[]" value="padrasi">
    	Padrasi
    </label><br><br>
    <!-- Question with multi-answer using multi-select. -->
    <label for = "too_cool_question">Where in the world is Enrique Iglesias?</label>
    <select id = "too_cool_question" name = "too_cool_question []" multiple >
        <option>Puerto Rico</option>
        <option>Costa Rico</option>
        <option>Bocas Del Toro</option>
        <option>Miami</option>
    </select>

    <p>
        <button type="submit">Submit</button>
    </p>
	</form>

    <!-- Form 4 -->
    <h2>Select Testing</h2>
    <form method="POST" action="/my_first_form.php">
    <label for = "cool_question">Do you boogaloo?</label>
    <select id = "cool_question" name = "cool_question" >
        <option value = "1" select>Yes</option>
        <option value = "0">No</option>
    </select>
    
    <p>
        <button type="submit">Submit</button>
    </p>
    </form>

</body>
</html>