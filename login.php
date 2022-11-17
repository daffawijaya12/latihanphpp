<?php
if(isset($_POST['daftar']))
{
    $nik = $_POST['nik'];
    $nama= $_POST['nama'];
    $text= $nik . "," . $nama . "\n";
    $fp= fopen('config.txt', 'a+');

    if(fwrite($fp, $text)){
    	echo '<script>alert("Anda Berhasil!"); </script>';
    }
}
else if (isset($_POST['masuk']))
{
	$data = file_get_contents("config.txt");
	$contents = explode("\n", $data);

	foreach($contents as $values){
		$login = explode(",",$values);
		$nik = $login[0];
		$nama = $login[1];

		if($nik == $_POST['nik'] && $nama == $_POST['nama']){
			session_start();
			header('location : home.php');
		}else{
			echo '<script>alert("Nik atau Nama Anda salah!.");</script>';
		}
	}
}
?>

<html>
    <form action="">
    	<br><br><br><br><br><br><br>
    	<table align="center">
    		<tr>
    			<td><input type="text" name="nik" placehorder="NIK"></td>
    		</tr>
    		<tr>
    		    <td><input type="text" name="nama" placeholder="Nama Lengkap"> 
    		</tr>
    		<tr>
    			<td>
    				<input type="submit" name="daftar" value="Saya Pengguna Baru">
    				<input type="submit" name="masuk" value="Masuk">  
    			</td>
    		</tr>	
</html>