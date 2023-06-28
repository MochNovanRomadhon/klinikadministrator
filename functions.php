<?php

function pdo_connect_mysql() {
    $DATABASE_HOST = 'localhost';
    $DATABASE_USER = 'root';
    $DATABASE_PASS = '';
    $DATABASE_NAME = 'tugaspaa';
    try {
    	return new PDO('mysql:host=' . $DATABASE_HOST . ';dbname=' . $DATABASE_NAME . ';charset=utf8', $DATABASE_USER, $DATABASE_PASS);
    } catch (PDOException $exception) {
    	// If there is an error with the connection, stop the script and display the error.
    	exit('Failed to connect to database!');
    }
}
function template_header($title) {
echo <<<EOT
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>$title</title>
		<link href="tmp.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	</head>
	<body>
    <nav class="navtop">
    	<div>
    		<h1>MyKlinik</h1>
            <a href="home.php"><i class="fas fa-home"></i>Home</a>
			<a href="read_dokter.php" class= home ><i class='fas fa-user-md'></i>Dokter</a>
    		<a href="read_pasien.php" class= home ><i class='fas fa-user-alt'></i>Pasien</a>
			<a href="read_kunjungan.php" class= home ><i class='fas fa-hospital-alt'></i>Kunjungan</a>
			<a href="read_resep.php" class= home ><i class='fas fa-notes-medical'></i>Resep</a>
			<a href="read_obat.php"><i class="fas fa-capsules"></i>Obat</a>
			<a href="logout.php" class="logout"><i class="fas fa-sign-out-alt"></i>Logout</a>
		</div>
    </nav>
EOT;
}
function template_footer() {
echo <<<EOT
    </body>
</html>
EOT;
}
?>