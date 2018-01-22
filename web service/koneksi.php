<?php
	 $server	= "localhost";
	 $user		= "id4115954_hmjsi";
	 $password	= "hmjsi123"; 
	 $database	= "id4115954_hmjsi_mobile";

	 $con = mysqli_connect($server, $user, $password, $database);
	 if (mysqli_connect_errno()) {
	 	echo "Gagal terhubung MySQL: " . mysqli_connect_error();
	 }

?>