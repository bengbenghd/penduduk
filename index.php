<!DOCTYPE html>
<html>
<head>
	<title>Sensus Penduduk</title>
	<!-- link untuk css -->
	<link rel="stylesheet" type="text/css" href="assets/css/style2.css">
</head>
<body>
	<br/>
	<br/>
	<center><h2>LOGIN</h2></center>	
	<br/>
	<div class="login">
	<br/>
		<!-- form-nya ngambil aksi dari cek-login.php dengan metode post-->
		<form action="cek-login.php" method="post" onSubmit="return validasi()">
			<div>
				<label>Email:</label>
				<input type="email" name="email" id="email" pattern=".+@penduduk.com" size="30" placeholder="@penduduk.com" required/>
			</div>
			<div>
				<label>Password:</label>
				<input type="password" name="password" id="password" required />
			</div>			
			<div>
				<input type="submit" value="Login" class="tombol">
			</div>
		</form>
	</div>
</body>

<!-- script javascript untuk form user dan pass tidak boleh kosong -->
<script type="text/javascript">
	function validasi() {
		var email = document.getElementById("email").value;
		var password = document.getElementById("password").value;		
		if (email != "" && password!="") {
			return true;
		}else{
			alert('Email dan Password harus di isi !');
			return false;
		}
	}

</script>
</html>