<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
</head>
<body>
<form action="addToMySQL.php" method="post">
<label for="name">姓名</label>
<input type="text" name="name">
<label for="id">学号</label>
<input type = "text" name = "id">
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
<td><input type="checkbox" name="Mon_m1" value="1"></td>
<td><input type="checkbox" name="Tue_m1" value="1"></td>
<td><input type="checkbox" name="Wed_m1" value="1"></td>
<td><input type="checkbox" name="Thur_m1" value="1"></td>
<td><input type="checkbox" name="Fri_m1" value="1"></td>
<td><input type="checkbox" name="Sat_m1" value="1"></td>
<td rowspan="2"><input type="checkbox" name="Sun_m1" value="1"></td>
</tr>

<tr>
<th>上午（10:00-12:00）</th>
<td><input type="checkbox" name="Mon_m2" value="1"></td>
<td><input type="checkbox" name="Tue_m2" value="1"></td>
<td><input type="checkbox" name="Wed_m2" value="1"></td>
<td><input type="checkbox" name="Thur_m2" value="1"></td>
<td><input type="checkbox" name="Fri_m2" value="1"></td>
<td><input type="checkbox" name="Sat_m2" value="1"></td>
</tr>

<tr>
<th>下午（13:00-15:00）</th>
<td><input type="checkbox" name="Mon_a1" value="1"></td>
<td><input type="checkbox" name="Tue_a1" value="1"></td>
<td><input type="checkbox" name="Wed_a1" value="1"></td>
<td><input type="checkbox" name="Thur_a1" value="1"></td>
<td><input type="checkbox" name="Fri_a1" value="1"></td>
<td><input type="checkbox" name="Sat_a1" value="1"></td>
<td rowspan="2"><input type="checkbox" name="Sun_a1" value="1"></td>
</tr>

<tr>
<th>下午（15:00-17:00）</th>
<td><input type="checkbox" name="Mon_a2" value="1"></td>
<td><input type="checkbox" name="Tue_a2" value="1"></td>
<td><input type="checkbox" name="Wed_a2" value="1"></td>
<td><input type="checkbox" name="Thur_a2" value="1"></td>
<td><input type="checkbox" name="Fri_a2" value="1"></td>
<td><input type="checkbox" name="Sat_a2" value="1"></td>
</tr>

<tr>
<th>晚上（18:00-22:00）</th>
<td><input type="checkbox" name="Mon_e" value="1"></td>
<td><input type="checkbox" name="Tue_e" value="1"></td>
<td><input type="checkbox" name="Wed_e" value="1"></td>
<td><input type="checkbox" name="Thur_e" value="1"></td>
<td><input type="checkbox" name="Fri_e" value="1"></td>
<td><input type="checkbox" name="Sat_e" value="1"></td>
<td><input type="checkbox" name="Sun_e" value="1"></td>
</tr>
</table>

<br>
<br>
<input type="submit" value="提交">

</form>
</body>
</html>
