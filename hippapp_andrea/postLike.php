<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN" 
<html xmlns:fb="https://www.facebook.com/2008/fbml"><head>
<title>Hipp</title>
</head>


<script>
function vaiGioca(){
	location.href = "D1.php";
}
</script>


<table width="810" height="700" align="center" cellpadding="0" cellspacing="0" background="PostLike.jpg" >
<tr><td>&nbsp;</td></tr>
<tr>
<td align="center">
<?php
 echo "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
 echo "ciao!";
?>
<input type="button" value="Gioca" onclick="vaiGioca()">
</td>
</tr>
</table>
</body>
</html>