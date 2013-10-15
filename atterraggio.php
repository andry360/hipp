<?php setcookie("is_presented", $_GET['presentato'], time()+10); ?>
<?php
if (isset($_GET['presentato'])) {
	
	//$id_user=$_GET['presentato'];
	header("location:https://www.facebook.com/Provafan/app_190130531171231");
}
?>