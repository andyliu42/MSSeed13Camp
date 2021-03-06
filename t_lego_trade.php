<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>台北行</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <script src="js/t_main.js"></script>
    <link rel="stylesheet" href="css/t_style.css">
    <link rel="stylesheet" href="css/w3.css">
    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>

<?php include "backend/navbar/nav.php"; ?>
<?php include "t_getitems.php"; ?>
<?php $team = $_SESSION['t_team']; ?>
<?php $country = $_SESSION['country'] ;?>
<?php $team2 = $_GET['teamb']; ?>
<?php $lego = getAllCubeNum($team); ?>
<?php $lego2 = getAllCubeNum($team2); ?>

<h3 id="team_label" style="color:#337ab7"><?php echo $country;?></h3>
<div id="team2" style="display:none"><?php echo $team2;?></div>
<div id="trade_with" class="w3-container w3-section w3-card-2 w3-padding" style="color:brown"></div>
<div id="warning" class="w3-container w3-section w3-red w3-card-4">
	<span onclick="this.parentElement.style.display='none'" class="w3-closebtn">&times;</span>
  	<h3>注意!</h3><br>
  	<p>1.雙方交易用的樂高數量請不要超出合理範圍(ex.我有10個紅色樂高,輸入框請填0~10範圍內的數字)</p><br>
  	<p>2.請不要在輸入框留空白.每個輸入框預設都為0,請勿把0刪除後還不填數字.</p><br>
  	<p>3.如果違反以上兩點,樂高可能不翼而飛或交易失敗,請自行負責.<p>
</div>

<script type="text/javascript">
	var country_str = ['XX', 'America', 'Canada', 'Brazil', 'Italy', 'Germany', 'England', 'Taiwan', 'Japan', 'Thailand', 'SouthAfrica', 'Madagascar', 'Egypt'];
	document.getElementById("trade_with").innerHTML = '和' + country_str[document.getElementById("team2").innerText] + '交易';
	var phone = ['XX', '0922328956', '0960196018', '0979316860', '0920050658', '0988239671', '0988833344', '0976616521', '0938623485', '0932241031', '0920627069', '0986760065', '0932973500'];
	document.getElementById("trade_with").innerHTML += '<br>聯絡電話: ' + phone[document.getElementById("team2").innerText];
</script>

<table id="trade_table" class="w3-table w3-container w3-card-2">
<tr>
	<th class="w3-tag">我方</th>
	<th>給對方</th>
	<th>|</th>
	<th class="w3-tag">對方</th>
	<th>給我方</th>
</tr>	
<tr>
	<th><div class="w3-tag w3-red"><p><?php echo $lego[1];?></p></div></th>
	<th><input type="number" value="0" min="0" max=<?php echo $lego[1];?>></th>
	<th>|</th>
	<th><div class="w3-tag w3-red"><p><?php echo $lego2[1];?></p></div></th>
	<th><input type="number" value="0" min="0" max=<?php echo $lego2[1];?>></th>
</tr>
<tr>
	<th><div class="w3-tag w3-green"><p><?php echo $lego[2];?></p></div></th>
	<th><input type="number" value="0" min="0" max=<?php echo $lego[2];?>></th>
	<th>|</th>
	<th><div class="w3-tag w3-green"><p><?php echo $lego2[2];?></p></div></th>
	<th><input type="number" value="0" min="0" max=<?php echo $lego2[2];?>></th>
</tr>
<tr>
	<th><div class="w3-tag w3-yellow"><p><?php echo $lego[3];?></p></div></th>
	<th><input type="number" value="0" min="0" max=<?php echo $lego[3];?>></th>
	<th>|</th>
	<th><div class="w3-tag w3-yellow"><p><?php echo $lego2[3];?></p></div></th>
	<th><input type="number" value="0" min="0" max=<?php echo $lego2[3];?>></th>
</tr>
<tr>
	<th><div class="w3-tag w3-blue"><p><?php echo $lego[4];?></p></div></th>
	<th><input type="number" value="0" min="0" max=<?php echo $lego[4];?>></th>
	<th>|</th>
	<th><div class="w3-tag w3-blue"><p><?php echo $lego2[4];?></p></div></th>
	<th><input type="number" value="0" min="0" max=<?php echo $lego2[4];?>></th>
</tr>
</table>

<div id="trade_btn" class="w3-container w3-section w3-padding-large">
<button class="w3-btn w3-padding w3-teal w3-round" onclick="send_request(<?php echo $team . ',' . $team2 . ', ['; foreach($lego as $value){echo $value . ',';} foreach($lego2 as $value){echo $value . ',';} echo '-1]';?>)">確定</button><br><br>
<a class="w3-btn w3-padding w3-teal w3-round" href="t_lego_list.php">取消</a>
</div>

<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- My Scripts -->
<script src="js/nav.js"></script>

</body>
</html>
