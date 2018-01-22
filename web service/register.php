<?php
	include_once "koneksi.php";

	class usr{}

	$username = $_POST["username"];
	$nama = $_POST["nama"];
	$password = $_POST["password"];
	$confirm_password = $_POST["confirm_password"];
	$tmpt_lahir = $_POST["tmpt_lahir"];
	$tgl_lahir = $_POST["tgl_lahir"];
	$jk = $_POST["jk"];
	$alamat = $_POST["alamat"];
	$no_hp = $_POST["no_hp"];
	$email = $_POST["email"];
	$riwayat_organisasi = $_POST["riwayat_organisasi"];

	if ((empty($username))) {
	 	$response = new usr();
	 	$response->success = 0;
	 	$response->message = "Kolom username tidak boleh kosong";
	 	die(json_encode($response));
	 } else if ((empty($nama))) {
	 	$response = new usr();
	 	$response->success = 0;
	 	$response->message = "Kolom nama tidak boleh kosong";
	 	die(json_encode($response));
	 } else if ((empty($password))) {
	 	$response = new usr();
	 	$response->success = 0;
	 	$response->message = "Kolom password tidak boleh kosong";
	 	die(json_encode($response));
	 } else if ((empty($confirm_password)) || $password != $confirm_password) {
	 	$response = new usr();
	 	$response->success = 0;
	 	$response->message = "Konfirmasi password tidak sama";
	 	die(json_encode($response));
	} else if ((empty($tmpt_lahir))) {
	 	$response = new usr();
	 	$response->success = 0;
	 	$response->message = "Kolom Tempat Lahir tidak boleh kosong";
	 	die(json_encode($response));
	} else if ((empty($tgl_lahir))) {
	 	$response = new usr();
	 	$response->success = 0;
	 	$response->message = "Kolom Tanggal Lahir tidak boleh kosong";
	 	die(json_encode($response));
	} else if ((empty($jk))) {
	 	$response = new usr();
	 	$response->success = 0;
	 	$response->message = "Kolom Jenis Kelamin tidak boleh kosong";
	 	die(json_encode($response));
	} else if ((empty($alamat))) {
	 	$response = new usr();
	 	$response->success = 0;
	 	$response->message = "Kolom Alamat tidak boleh kosong";
	 	die(json_encode($response));
	} else if ((empty($no_hp))) {
	 	$response = new usr();
	 	$response->success = 0;
	 	$response->message = "Kolom No HP tidak boleh kosong";
	 	die(json_encode($response));
	} else if ((empty($email))) {
	 	$response = new usr();
	 	$response->success = 0;
	 	$response->message = "Kolom Email tidak boleh kosong";
	 	die(json_encode($response));
	} else if ((empty($riwayat_organisasi))) {
	 	$response = new usr();
	 	$response->success = 0;
	 	$response->message = "Kolom Riwayat Organisasi tidak boleh kosong";
	 	die(json_encode($response));
	 } else {
		 if (!empty($username) && $password == $confirm_password){
		 	$num_rows = mysqli_num_rows(mysqli_query($con, "SELECT * FROM users WHERE username='".$username."'"));

		 	if ($num_rows == 0){
		 		$query = mysqli_query($con, "INSERT INTO users (username, password, nama, tmpt_lahir, tgl_lahir, jk, alamat, no_hp, email, riwayat_organisasi) VALUES('".$username."','".$password."','".$nama."','".$tmpt_lahir."','".$tgl_lahir."','".$jk."','".$alamat."','".$no_hp."','".$email."','".$riwayat_organisasi."')");

		 		if ($query){
		 			$response = new usr();
		 			$response->success = 1;
		 			$response->message = "Register berhasil, silahkan login.";
		 			die(json_encode($response));

		 		} else {
		 			$response = new usr();
		 			$response->success = 0;
		 			$response->message = "Username sudah ada";
		 			die(json_encode($response));
		 		}
		 	} else {
		 		$response = new usr();
		 		$response->success = 0;
		 		$response->message = "Username sudah ada";
		 		die(json_encode($response));
		 	}
		 }
	 }

	 mysqli_close($con);

?>	