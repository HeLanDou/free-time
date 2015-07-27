<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
</head>


<body>
<?php
//echo var_dump($_POST['id']) . '<br>';
preg_match('/^\d{8}$/', $_POST['id']) || die("检查你的学号");
//if (!preg_match('/^\d{8}$/', $_POST['id'])) die("检查你的学号");
$servername = "localhost";
$username = "root";
$password = "soeasy";
$dbname = "free_time";

//echo $_POST["id"] . '<br>';
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->exec("set names utf8;");//set the MySQL connecting encoding
    $stmt = $conn->prepare("select * from lib where id = '" . $_POST['id'] . "';");
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($result == false) {
        //echo '<h1></h1>';
        $result = array(
            'id'=>$_POST['id'], 'name'=>'',
            'Mon_m1'=>'0', 'Mon_m2'=>'0', 'Mon_a1'=>'0', 'Mon_a2'=>'0', 'Mon_e'=>'0',
            'Tue_m1'=>'0', 'Tue_m2'=>'0', 'Tue_a1'=>'0', 'Tue_a2'=>'0', 'Tue_e'=>'0', 
            'Wed_m1'=>'0', 'Wed_m2'=>'0', 'Wed_a1'=>'0', 'Wed_a2'=>'0', 'Wed_e'=>'0',
            'Thur_m1'=>'0', 'Thur_m2'=>'0', 'Thur_a1'=>'0', 'Thur_a2'=>'0', 'Thur_e'=>'0',
            'Fri_m1'=>'0', 'Fri_m2'=>'0', 'Fri_a1'=>'0', 'Fri_a2'=>'0', 'Fri_e'=>'0',
            'Sat_m'=>'0', 'Sat_a'=>'0', 'Sat_e'=>'0',
            'Sun_m'=>'0', 'Sun_a'=>'0', 'Sun_e'=>'0'
        );
    }
    //echo '<h1>修改表格并提交</h1>';
} 
catch (PDOException $e) {
    echo $e->getMessage();
}

function ischecked($time) {
    global $result;
    if ($result[$time] == '1') echo ' checked ';
}

?>
<form action="addToMySQL.php" method="post">
    <label for="name">姓名</label>
    <input type="text" name="name" value="<?php echo $result['name']; ?>" required>
    <label for="id">学号</label>
    <input type = "text" name = "id" value="<?php echo $result['id']; ?>" readonly>
    <br>
    <br>
    <table>
        <thead>
            <tr>
                <td>&nbsp;</td>
                <td>星期一</td>
                <td>星期二</td>
                <td>星期三</td>
                <td>星期四</td>
                <td>星期五</td>
                <td>星期六</td>
                <td>星期日</td>
            </tr>
        </thead>

        <tr>
            <th>上午（8:00-10:00）</th>
            <td><input type="checkbox" name="Mon_m1" value="1" <?php ischecked('Mon_m1') ?> <?php ischecked('Mon_m1') ?>></td>
            <td><input type="checkbox" name="Tue_m1" value="1" <?php ischecked('Tue_m1') ?>></td>
            <td><input type="checkbox" name="Wed_m1" value="1" <?php ischecked('Wed_m1') ?>></td>
            <td><input type="checkbox" name="Thur_m1" value="1" <?php ischecked('Thur_m1') ?>></td>
            <td><input type="checkbox" name="Fri_m1" value="1" <?php ischecked('Fri_m1') ?>></td>
            <td><input type="checkbox" name="Sat_m1" value="1" <?php ischecked('Sat_m1') ?>></td>
            <td rowspan="2"><input type="checkbox" name="Sun_m1" value="1" <?php ischecked('Sun_m1') ?>></td>
        </tr>

        <tr>
            <th>上午（10:00-12:00）</th>
            <td><input type="checkbox" name="Mon_m2" value="1" <?php ischecked('Mon_m2') ?>></td>
            <td><input type="checkbox" name="Tue_m2" value="1" <?php ischecked('Tue_m2') ?>></td>
            <td><input type="checkbox" name="Wed_m2" value="1" <?php ischecked('Wed_m2') ?>></td>
            <td><input type="checkbox" name="Thur_m2" value="1" <?php ischecked('Thur_m2') ?>></td>
            <td><input type="checkbox" name="Fri_m2" value="1" <?php ischecked('Fri_m2') ?>></td>
            <td><input type="checkbox" name="Sat_m2" value="1" <?php ischecked('Sat_m2') ?>></td>
        </tr>

        <tr>
            <th>下午（13:00-15:00）</th>
            <td><input type="checkbox" name="Mon_a1" value="1" <?php ischecked('Mon_a1') ?>></td>
            <td><input type="checkbox" name="Tue_a1" value="1" <?php ischecked('Tue_a1') ?>></td>
            <td><input type="checkbox" name="Wed_a1" value="1" <?php ischecked('Wed_a1') ?>></td>
            <td><input type="checkbox" name="Thur_a1" value="1" <?php ischecked('Thur_a1') ?>></td>
            <td><input type="checkbox" name="Fri_a1" value="1" <?php ischecked('Fri_a1') ?>></td>
            <td><input type="checkbox" name="Sat_a1" value="1" <?php ischecked('Sat_a1') ?>></td>
            <td rowspan="2"><input type="checkbox" name="Sun_a1" value="1" <?php ischecked('Sun_a1') ?>></td>
        </tr>

        <tr>
            <th>下午（15:00-17:00）</th>
            <td><input type="checkbox" name="Mon_a2" value="1" <?php ischecked('Mon_a2') ?>></td>
            <td><input type="checkbox" name="Tue_a2" value="1" <?php ischecked('Tue_a2') ?>></td>
            <td><input type="checkbox" name="Wed_a2" value="1" <?php ischecked('Wed_a2') ?>></td>
            <td><input type="checkbox" name="Thur_a2" value="1" <?php ischecked('Thur_a2') ?>></td>
            <td><input type="checkbox" name="Fri_a2" value="1" <?php ischecked('Fri_a2') ?>></td>
            <td><input type="checkbox" name="Sat_a2" value="1" <?php ischecked('Sat_a2') ?>></td>
        </tr>

        <tr>
            <th>晚上（18:00-22:00）</th>
            <td><input type="checkbox" name="Mon_e" value="1" <?php ischecked('Mon_e') ?>></td>
            <td><input type="checkbox" name="Tue_e" value="1" <?php ischecked('Tue_e') ?>></td>
            <td><input type="checkbox" name="Wed_e" value="1" <?php ischecked('Wed_e') ?>></td>
            <td><input type="checkbox" name="Thur_e" value="1" <?php ischecked('Thur_e') ?>></td>
            <td><input type="checkbox" name="Fri_e" value="1" <?php ischecked('Fri_e') ?>></td>
            <td><input type="checkbox" name="Sat_e" value="1" <?php ischecked('Sat_e') ?>></td>
            <td><input type="checkbox" name="Sun_e" value="1" <?php ischecked('Sun_e') ?>></td>
        </tr>
    </table>
    <label for="extra">备注</label>
    <input type="text" name="extra" maxlength=30 size=90>
    <br>
    <br>
    <input type="submit" value="提交">

</form>
</body>
</html>
