<?php
include 'functions.php';
require('./api/consumeapi_pasien.php');

$getdata = getConsume();


?>


<?=template_header('Read')?>

<div class="content read">
	<h2> Pasien</h2>
	<a href="create_pasien.php" class="create-contact">Tambah</a>
	<table>
        <thead>
            <tr>
                <td>No.</td>
                <td>Nama Pasien</td>
                <td>Tanggal Lahir</td>
                <td>Jenis Kelamin</td>
                <td></td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($getdata as $key => $contact): ?>
            <tr>
                <td><?=$key + 1?></td>
                <td><?=$contact['nama_pasien']?></td>
                <td><?=$contact['tanggal_lahir']?></td>
                <td><?=$contact['jenis_kelamin']?></td>

                <td class="actions">
                    <a href="create_kunjungan.php?id_pasien=<?=$contact['id_pasien']?>" class="kunjung"><i class='fas fa-hospital-alt'></i></a>
                    <a href="update_pasien.php?id_pasien=<?=$contact['id_pasien']?>" class="edit"><i class="fas fa-pen fa-xs"></i></a>
                    <a href="delete_pasien.php?id_pasien=<?=$contact['id_pasien']?>" class="trash"><i class="fas fa-trash fa-xs"></i></a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
	<div class="pagination">
	</div>
</div>

<?=template_footer()?>