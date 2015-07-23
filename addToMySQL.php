<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
</head>
<body>
<?php
$servername = "localhost";
$username = "root";
$password = "soeasy";
//echo $_SERVER["PHP_SELF"] . "<br>";
//echo $_SERVER["REQUEST_METHOD"];
try {
	$conn = new PDO("mysql:host=$servername;dbname=freetime", $username, $password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$conn->exec("insert into lib (name, id, 
	Mon_m1, Mon_m2, Mon_a1, Mon_a2, Mon_e, 
	Tue_m1, Tue_m2, Tue_a1, Tue_a2, Tue_e,
	Wed_m1, Wed_m2, Wed_a1, Wed_a2, Wed_e,
	Thu_m1, Thu_m2, Thu_a1, Thu_a2, Thu_e,
	Fri_m1, Fri_m2, Fri_a1, Fri_a2, Fri_e,
	Sat_m, Sat_a, Sat_e,
	Sun_m, Sun_a, Sun_e)
	values (	
?>
</body>
</html>
