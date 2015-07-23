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
<td><input type="checkbox" name="w1" value="m1"></td>
<td><input type="checkbox" name="w2" value="m1"></td>
<td><input type="checkbox" name="w3" value="m1"></td>
<td><input type="checkbox" name="w4" value="m1"></td>
<td><input type="checkbox" name="w5" value="m1"></td>
<td><input type="checkbox" name="w6" value="m1"></td>
<td rowspan="2"><input type="checkbox" name="w7" value="m1"></td>
</tr>

<tr>
<th>上午（10:00-12:00）</th>
<td><input type="checkbox" name="w1" value="m2"></td>
<td><input type="checkbox" name="w2" value="m2"></td>
<td><input type="checkbox" name="w3" value="m2"></td>
<td><input type="checkbox" name="w4" value="m2"></td>
<td><input type="checkbox" name="w5" value="m2"></td>
<td><input type="checkbox" name="w6" value="m2"></td>
</tr>

<tr>
<th>下午（13:00-15:00）</th>
<td><input type="checkbox" name="w1" value="a1"></td>
<td><input type="checkbox" name="w2" value="a1"></td>
<td><input type="checkbox" name="w3" value="a1"></td>
<td><input type="checkbox" name="w4" value="a1"></td>
<td><input type="checkbox" name="w5" value="a1"></td>
<td><input type="checkbox" name="w6" value="a1"></td>
<td rowspan="2"><input type="checkbox" name="w7" value="a1"></td>
</tr>

<tr>
<th>下午（15:00-17:00）</th>
<td><input type="checkbox" name="w1" value="a2"></td>
<td><input type="checkbox" name="w2" value="a2"></td>
<td><input type="checkbox" name="w3" value="a2"></td>
<td><input type="checkbox" name="w4" value="a2"></td>
<td><input type="checkbox" name="w5" value="a2"></td>
<td><input type="checkbox" name="w6" value="a2"></td>
</tr>

<tr>
<th>晚上（18:00-22:00）</th>
<td><input type="checkbox" name="w1" value="e"></td>
<td><input type="checkbox" name="w2" value="e"></td>
<td><input type="checkbox" name="w3" value="e"></td>
<td><input type="checkbox" name="w4" value="e"></td>
<td><input type="checkbox" name="w5" value="e"></td>
<td><input type="checkbox" name="w6" value="e"></td>
<td><input type="checkbox" name="w7" value="e"></td>
</tr>
</table>

<br>
<br>
<input type="submit" value="提交">

</form>
</body>
</html>
