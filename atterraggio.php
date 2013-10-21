<script type="text/javascript">
  function NotInFacebookFrame() {
    return top === self;
  }
  function ReferrerIsFacebookApp() {
    if(document.referrer) {
      return document.referrer.indexOf("apps.facebook.com") != -1;
    }
    return false;
  }
  if (NotInFacebookFrame() || ReferrerIsFacebookApp()) {
    top.location.replace("atterraggio.php");
  }
</script>
<?php
include login_php.php;
$request_ids = $_GET['request_ids'];
$request_ids = explode(",", $request_ids);
foreach($request_ids as $request_id)
    {
        $request_object = $facebook->api($request_id);
         if(isset($request_object['data'])) 
		 $req_data = $request_object['data']; //$req_data will be"123.." as per your request data set.
       // after getting the data, you may like to delete the request.
           $full_request_id = $request_id."_".$fbid; //$fbid is current user facebook id
          $facebook->api("$full_request_id","DELETE");
     }
echo $req_data;
/*echo $_GET['presentato'];
if (isset($_GET['presentato'])) {
	$value=$_GET['presentato'];
	setcookie("presented",$value, time()+180); 
	header("location:https://www.facebook.com/Provafan/app_610732638955892");
}*/
?>