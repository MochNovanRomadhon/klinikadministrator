<?php
include 'functions.php';
include 'database.php';
require('./api/consumeapi_kunjungan.php');

$getdata = getConsume();


?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
		<link href="tmp.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	</head>
	<body>
<div class="cetak">

	<h1> Kunjungan</h1>
	<table>
        <thead>
            <tr>
                <td>No.</td>
                <td>Nama Pasien</td>
                <td>Nama Dokter</td>
                <td>Tanggal kunjungan</td>
                <td>Keluhan</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($getdata as $key => $contact): ?>

            <tr>
                <td><?=$key + 1?></td>
                <td><?=$contact['nama_pasien']?></td>
                <td><?=$contact['nama_dokter']?></td>
                <td><?=$contact['tanggal_kunjungan']?></td>
                <td><?=$contact['keluhan']?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
	<div class="pagination">
	</div>
</div>
    </body>