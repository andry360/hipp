<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN" 
<html xmlns:fb="https://www.facebook.com/2008/fbml"><head>
<title>Hipp</title>
</head>
<script language="javascript">
function vaiGioca(){
	document.frm.submit();
}
</script>

<form name="frm" action="D1.php" method="post">
<input type="hidden" name="present" value="<? echo $presentato; ?>">
<table width="810" height="700" align="center" cellpadding="0" cellspacing="0" background="PostLike.jpg" >
<tr><td>&nbsp;</td></tr>
<tr>
<td align="center">
<input type="button" value="Gioca" onclick="vaiGioca()">
</td>
</tr>
</table>
</form>
</html>