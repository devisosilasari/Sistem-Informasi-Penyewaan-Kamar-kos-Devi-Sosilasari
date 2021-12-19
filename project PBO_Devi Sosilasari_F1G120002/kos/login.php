<?php 
session_start();
include "koneksi.php";
// var_dump($query);
if (isset($_POST["login"])) {
$username = $_POST["username"];
$q1=mysqli_query($koneksi,"SELECT * FROM admin WHERE username = '$username'");
$query=mysqli_fetch_assoc($q1);
$id = $query["id_pemilik"];
$role = $query["role"];
if($role == "adminisrator"){
	if($_POST["username"]==$query["username"] && $_POST["password"]==$query["pass"]){
		$_SESSION['admin']=true;
		header("Location:admin.php");
		
	}else{
		echo "Username/Passwor Salah";
	}
}else{
	if($_POST["username"]==$query["username"] && $_POST["password"]==$query["pass"]){
		$_SESSION["pemilik"]=true;
		header("Location:pemilik.php?id=$id");
	}
	else{
		echo "Username/Passwor Salah";
	}
}
}
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>Login</title>
 	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="asset/css/login.css">
 </head>
 <body>
 	<div class="container">

<form action="" method="post">
	<h2 class ="text-center">Login</h2>
	<hr>
	    <div class="form-group">
	    	<input type="text" class="form-control" name="username" placeholder="Masukkan Username">
	    </div><br>
	    <div class="form-group">
	    	<input type="password" class="form-control" name="password" placeholder="Masukkan Password">
	    </div><br>
	    <button type="submit" name="login" class="btn btn-primary">Login</button>
</form>
	</div>
 </body>
 </html>