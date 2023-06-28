<?php
include 'functions.php';
include 'database.php';
require('./api/consumeapi_kunjungan.php');

$getdata = getConsume();


?>


<?=template_header('Read')?>

<div class="content read">
	<h2> Kunjungan</h2>
	<a href="read_pasien.php" class="create-contact">Tambah</a>
    <a href="pdf.php" class="create-contact">Cetak</a>
	<table>
        <thead>
            <tr>
                <td>No.</td>
                <td>Nama Pasien</td>
                <td>Nama Dokter</td>
                <td>Tanggal kunjungan</td>
                <td>Keluhan</td>
                <td></td>
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

                <td class="actions">
                <a href="create_resep.php?id_kunjungan=<?= $contact['id_kunjungan'] ?>&id_pasien=<?= $contact['id_pasien'] ?>" class="rsp"><i class='fas fa-notes-medical'></i></a>
                    <a href="update_kunjungan.php?id_kunjungan=<?=$contact['id_kunjungan']?>" class="edit"><i class="fas fa-pen fa-xs"></i></a>
                    <a href="delete_kunjungan.php?id_kunjungan=<?=$contact['id_kunjungan']?>" class="trash"><i class="fas fa-trash fa-xs"></i></a>
                    
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
	<div class="pagination">
	</div>
</div>

<?=template_footer()?>