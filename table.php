<!DOCTYPE html>
<html>
<head>
<title>空闲时间表</title>
<meta charset="UTF-8">
<link href="http://apps.bdimg.com/libs/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
</head>

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
      'Sun_m'=>'0', 'Sun_a'=>'0', 'Sun_e'=>'0', 'extra'=>''
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

<body>
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <form role="form" style="margin-top:20px">
        <div class="form-group">
          <label for="id">学号</label>
          <input class="form-control" id="id" type="text" name="id" value="<?php echo $result['id']; ?>" readonly>
        </div>
        <div class="form-group">
          <label for="name">姓名</label>
          <input class="form-control" id="name" type="text" name="name" placeholder="请输入你的姓名" value="<?php echo $result['name']; ?>" required>
        </div>
        <table class="table table-bordered" style="text-align:center">
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
            <!-- <td><div class="btn-group" data-toggle="buttons"><label class="btn btn-default"><input type="radio" name="Mon_m1" value="1" <?php ischecked('Mon_m1') ?>></label></div></td> -->
            <td><input type="checkbox" name="Mon_m1" value="1" <?php ischecked('Mon_m1') ?>></td>
            <td><input type="checkbox" name="Tue_m1" value="1" <?php ischecked('Tue_m1') ?>></td>
            <td><input type="checkbox" name="Wed_m1" value="1" <?php ischecked('Wed_m1') ?>></td>
            <td><input type="checkbox" name="Thur_m1" value="1" <?php ischecked('Thur_m1') ?>></td>
            <td><input type="checkbox" name="Fri_m1" value="1" <?php ischecked('Fri_m1') ?>></td>
            <td rowspan="2"><input type="checkbox" name="Sat_m" value="1" <?php ischecked('Sat_m1') ?>></td>
            <td rowspan="2"><input type="checkbox" name="Sun_m" value="1" <?php ischecked('Sun_m1') ?>></td>
          </tr>

          <tr>
            <th>上午（10:00-12:00）</th>
            <td><input type="checkbox" name="Mon_m2" value="1" <?php ischecked('Mon_m2') ?>></td>
            <td><input type="checkbox" name="Tue_m2" value="1" <?php ischecked('Tue_m2') ?>></td>
            <td><input type="checkbox" name="Wed_m2" value="1" <?php ischecked('Wed_m2') ?>></td>
            <td><input type="checkbox" name="Thur_m2" value="1" <?php ischecked('Thur_m2') ?>></td>
            <td><input type="checkbox" name="Fri_m2" value="1" <?php ischecked('Fri_m2') ?>></td>
          </tr>

          <tr>
            <th>下午（13:00-15:00）</th>
            <td><input type="checkbox" name="Mon_a1" value="1" <?php ischecked('Mon_a1') ?>></td>
            <td><input type="checkbox" name="Tue_a1" value="1" <?php ischecked('Tue_a1') ?>></td>
            <td><input type="checkbox" name="Wed_a1" value="1" <?php ischecked('Wed_a1') ?>></td>
            <td><input type="checkbox" name="Thur_a1" value="1" <?php ischecked('Thur_a1') ?>></td>
            <td><input type="checkbox" name="Fri_a1" value="1" <?php ischecked('Fri_a1') ?>></td>
            <td rowspan="2"><input type="checkbox" name="Sat_a" value="1" <?php ischecked('Sat_a1') ?>></td>
            <td rowspan="2"><input type="checkbox" name="Sun_a" value="1" <?php ischecked('Sun_a1') ?>></td>
          </tr>

          <tr>
            <th>下午（15:00-17:00）</th>
            <td><input type="checkbox" name="Mon_a2" value="1" <?php ischecked('Mon_a2') ?>></td>
            <td><input type="checkbox" name="Tue_a2" value="1" <?php ischecked('Tue_a2') ?>></td>
            <td><input type="checkbox" name="Wed_a2" value="1" <?php ischecked('Wed_a2') ?>></td>
            <td><input type="checkbox" name="Thur_a2" value="1" <?php ischecked('Thur_a2') ?>></td>
            <td><input type="checkbox" name="Fri_a2" value="1" <?php ischecked('Sat_a2') ?>></td>
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
        <div class="form-group">
          <label for="extra">备注</label>
          <textarea class="form-control" rows=3 id="extra" name="extra" maxlength=100 placeholder="特殊要求可以写在这里"><?php echo $result['extra']?></textarea>
        </div>
        <div style="text-align:center">
          <button class="btn btn-primary" id="submit" type="button">提交</button>
        </div>
      </form>
    </div>
  </div>
</div>
<script src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="http://apps.bdimg.com/libs/bootstrap/3.3.4/bootstrap.min.js"></script>
<script>
$(document).ready(function() {
  $("#submit").click(function() {
    $.post("addToMySQL.php", $("form").serialize(), function(result) {
      alert(result);
    });
  });
});
</script>
</body>
</html>
