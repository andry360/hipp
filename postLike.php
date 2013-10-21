<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN" 
<html xmlns:fb="https://www.facebook.com/2008/fbml">
<head>
<title>PostLike</title>
</head>
<script>
function vaiGioca(){
	document.frm.submit();
}
</script>
<form name="frm" action="D1.php" method="post">
<input type="hidden" name="present" value="<? echo $presentato; ?>">
<table width="810" height="800" align="center" cellpadding="0" cellspacing="0" background="immagini/PostLike1.jpg" >
<tr><td height="632" colspan="2">&nbsp;</td>
</tr>
<tr>
<td width="505" height="60" >&nbsp;</td>
<td width="303"><img src="immagini/btn_Gioca.png" onclick="vaiGioca();" style="cursor:pointer"></td>
<tr>

<tr><td colspan="2">&nbsp;</td></tr>
</tr>
</table>
</form>
</body>
</html>