<?php
	include 'config/my_class.php';
	if(isset($_POST['submit-login'])){
		if($objek->login($_POST['username'], $_POST['password'])){
			header("LOCATION:index.php");
		}
		else{
			echo ("<script LANGUAGE='JavaScript'>
		    window.alert('Kombinasi username & password tidak ditemukan');
		    window.location.href='login.php';
		    </script>");
		}	
	}
	if(isset($_GET['logout'])){
		if($objek->logout())
			header("LOCATION:login.php");
	}

	if (isset($_POST['upload-foto'])) {
		session_start();
		if(isset($_FILES['fupload'])) {
			$lokasi_file =$_FILES['fupload']['tmp_name'];
			$nama_file=$_FILES['fupload']['name'];
			$nama_file=$objek->antihac($nama_file);
			$acak=rand(0000,9999);
			$nama_file_baru=$acak.$nama_file;
			$dir="foto/$nama_file_baru";
			move_uploaded_file($lokasi_file,"$dir");

			$data["foto"] = $nama_file_baru;
			if($objek->UPDATE('mahasiswa', $data, 'NIM', $_SESSION['username'])){
				echo ("<script LANGUAGE='JavaScript'>
			    window.alert('File behasil diupload');
			    window.location.href='index.php';
			    </script>");
			}else{
				echo ("<script LANGUAGE='JavaScript'>
			    window.alert('Proses gagal, silahkan coba lagi');
			    window.location.href='index.php';
			    </script>");
			}
		}
	}
	if (isset($_POST['upload-ijazah'])) {
		session_start();
		if(isset($_FILES['fupload'])) {
			$lokasi_file =$_FILES['fupload']['tmp_name'];
			$nama_file=$_FILES['fupload']['name'];
			$nama_file=$objek->antihac($nama_file);
			$acak=rand(0000,9999);
			$nama_file_baru=$acak.$nama_file;
			$dir="ijazah/$nama_file_baru";
			move_uploaded_file($lokasi_file,"$dir");

			$data["ijazah"] = $nama_file_baru;
			if($objek->UPDATE('mahasiswa', $data, 'NIM', $_SESSION['username'])){
				$q = $objek->query("SELECT * FROM notif WHERE nim = '".$_SESSION['username']."'");
				if(@mysqli_num_rows($q) == 0){
					$notif['nim'] = $_SESSION['username'];
					$notif['status'] = 0;
					$objek->INSERT("notif", $notif);
				}
				echo ("<script LANGUAGE='JavaScript'>
			    window.alert('File behasil diupload');
			    window.location.href='index.php';
			    </script>");
			}else{
				echo ("<script LANGUAGE='JavaScript'>
			    window.alert('Proses gagal, silahkan coba lagi');
			    window.location.href='index.php';
			    </script>");
			}
		}
	}
	if (isset($_GET['del-mahasiswa'])) {
		$objek->DELETE('mahasiswa', 'NIM', $_GET['del-mahasiswa']);
		$objek->DELETE('user', 'username', $_GET['del-mahasiswa']);
		echo ("<script LANGUAGE='JavaScript'>
		    window.alert('Data berhasil dihapus');
		    window.location.href='index.php';
		    </script>");
	}
	if (isset($_POST['tambah-mahasiswa'])) {
		if($objek->INSERT('mahasiswa', $_POST['data'])){
			$user['username'] = $_POST['data']['NIM'];
			$user['password'] = md5($_POST['data']['NIM']);
			$user['level'] = 2;
			$objek->INSERT('user', $user);
			echo ("<script LANGUAGE='JavaScript'>
		    window.alert('Data berhasil di masukan');
		    window.location.href='index.php?page=tambah-mahasiswa';
		    </script>");
		}else{
			echo ("<script LANGUAGE='JavaScript'>
		    window.alert('Proses gagal, silahkan coba lagi');
		    window.location.href='index.php?page=tambah-mahasiswa';
		    </script>");
		}
	}
	if (isset($_POST['update-mahasiswa'])) {
		if($objek->UPDATE('mahasiswa', $_POST['data'], 'NIM', $_POST['data']['NIM'])){
			echo ("<script LANGUAGE='JavaScript'>
		    window.alert('Data berhasil di rubah');
		    window.location.href='index.php';
		    </script>");
		}
	}
?>