<?php
class mysql {

	public function array_loop() {
		$con=mysqli_connect("192.168.30.51","andreatest","andreatest","andreatest");
	    if (mysqli_connect_errno($con)){
			echo "failed" . mysqli_connnect_error(); }
	}
}

?>