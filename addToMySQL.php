<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
</head>
<body>
<?php

test_input($_POST["id"]);
test_input($_POST["name"]);
if (strlen($_POST["id"]) != 8 || !is_numeric($_POST["id"]))
    exit("提交失败,请检查输入的学号!");

$servername = "localhost";
$username = "root";
$password = "soeasy";
$dbname = "free_time";
$items = array(
    "id", "name",
    "Mon_m1", "Mon_m2", "Mon_a1", "Mon_a2", "Mon_e",
    "Tue_m1", "Tue_m2", "Tue_a1", "Tue_a2", "Tue_e", 
    "Wed_m1", "Wed_m2", "Wed_a1", "Wed_a2", "Wed_e",
    "Thur_m1", "Thur_m2", "Thur_a1", "Thur_a2", "Thur_e",
    "Fri_m1", "Fri_m2", "Fri_a1", "Fri_a2", "Fri_e",
    "Sat_m", "Sat_a", "Sat_e",
    "Sun_m", "Sun_a", "Sun_e"
);
foreach ($items as $item) {
    if ($_POST[$item] == NULL) $_POST[$item] = "0";
}

//construct the MySQL insert command $sql
$sql = "insert into lib(";
foreach ($items as $item) {
    $sql .= $item;
    if ($item != end($items)) $sql .= ", ";
}
$sql .= ") values(";
foreach ($items as $item) {
    if ($item == "id")
        $sql .= "\"" . $_POST["id"] . "\"";
    elseif ($item == "name")
        $sql .= ", \"" . $_POST["name"] . "\"";
    else $sql .= ", " . $_POST[$item];
}
$sql .= ");";
//echo "$sql<br>";

//executive the MySQL command
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->exec("set names utf8;");//set the MySQL connecting encoding
    $conn->exec($sql);
    echo "提交成功!";
} 
catch (PDOException $e) {
    echo "提交失败!<br>";
    echo $e->getMessage();
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
</body>
</html>
