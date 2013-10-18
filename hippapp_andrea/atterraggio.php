<?php  
$value=$_GET['presentato'];
setcookie("presented",$value, time()+180); ?>
<?php
//echo $_GET['presentato'];
echo $_COOKIE["presented"];
if (isset($_GET['presentato'])) {
	header("location:https://www.facebook.com/Provafan/app_190130531171231");
}
?>