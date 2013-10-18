<?php  
echo $_GET['presentato'];
if (isset($_GET['presentato'])) {
	$value=$_GET['presentato'];
	setcookie("presented",$value, time()+180); 
	//header("location:https://www.facebook.com/Provafan/app_610732638955892");
}
?>