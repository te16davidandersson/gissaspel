<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Gissa talet</title>
</head>
<body>

<form action="" method="POST">
	<input name="guess" id="guess" type="text">
	<input type="submit" name="submit" value="Gissa">
</form>

<?php
	echo "<h1> Gissa heltalet mellan 1 och 100</h1>";

	if(!$_SESSION['random']) {
	$_SESSION['random'] = random_int(1, 100);
	$_SESSION['guesses'] = 0;
	}

	if(isset($_POST['guess'])) {
	echo "<h1>Gissning: " . $_POST['guess'] . "</h1>";

	}

	if($_SESSION['random'] == $_POST['guess']) {
		$_SESSION['guesses']++;
		$_SESSION['random'] = random_int(1, 100);
		echo "<h1>Du gissade rätt med " . $_SESSION['guesses'] . " gissning(ar)!</h1>";
		$_SESSION['guesses'] = 0;
	} else if ($_SESSION['random'] > $_POST['guess']) {
		echo "<p>Du gissade för lågt!</p>";
		$_SESSION['guesses']++;
		echo "<p>Antal gissningar: " . $_SESSION['guesses'] . "</p>";
	} else if ($_SESSION['random'] < $_POST['guess']) {
		echo "<p>Du gissade för högt!</p>";
		$_SESSION['guesses']++;
		echo "<p>Antal gissningar: " . $_SESSION['guesses'] . "</p>";
	}  else {
		echo "<p>Ange ett heltal mellan 1 och 100</p>";
	}
	if ($_SESSION['guesses'] > (int)10) {
		$_SESSION['guesses'] = 0;
		$_SESSION['random'] = random_int(1, 100);
		echo "<p>Du gissade för många gånger!</p>";
	}
	echo "<p>Rätt svar var: " . $_SESSION['random'] "</p>";
?>

</body>
</html>