<!DOCTYPE html>

<html>
	<head>
		<title><?php echo $this -> _data['title']; ?></title>
		
		<style type="text/css">
			body {
				background-color: rgb(220, 220, 220);
				color: #555555;
				font-family: Arial, Helvetica, sans-serif;
				font-size: 10pt;
			}

			div.box {
				background-color: #EEE;
				box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.5);
				border-top-left-radius: 40px;
				border-bottom-right-radius: 40px;
				border-top: 5px solid red;
				border-bottom: 5px solid green;
				padding: 1.5%;
				margin: 3%;
			}
		</style>
		
	</head>
	<body>
		<div class="box">
			<h1>It works...</h1>
			<br/>
			Selamat datang, ini merupakan halaman default dari PHP MVC framework yang dibuat oleh Aji.
			<br/><br/><br/><br/><br/><br/>
			<div>Terimakasih,<br/><br/><br/><i>Aji.</i></div>
			<br/><br/><br/>
		</div>
	</body>
</html>