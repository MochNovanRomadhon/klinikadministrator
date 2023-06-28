<?php
include 'functions.php';
require('./api/consumeapi_resep.php');

$getdata = getConsume();


?>


<?=template_header('Read')?>
<div class="content read">
	<h2> Resep</h2>
	<a href="read_kunjungan.php" class="create-contact">Tambah</a>
	<table>
        <thead>
            <tr>
                <td>No.</td>
                <td>Nama Pasien</td>
                <td>Keluhan</td>
                <td>Nama Obat</td>
                <td>Jumlah</td>
                <td>Instruksi</td>
                <td></td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($getdata as $key => $contact): ?>
            <tr>
                <td><?=$key + 1?></td>
                <td><?=$contact['nama_pasien']?></td>
                <td><?=$contact['keluhan']?></td>
                <td><?=$contact['nama_obat']?></td>
                <td><?=$contact['jumlah']?></td>
                <td><?=$contact['instruksi']?></td>

                <td class="actions">
                    <a href="update_resep.php?id_resep=<?=$contact['id_resep']?>" class="edit"><i class="fas fa-pen fa-xs"></i></a>
                    <a href="delete_resep.php?id_resep=<?=$contact['id_resep']?>" class="trash"><i class="fas fa-trash fa-xs"></i></a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
	<div class="pagination">
	</div>
</div>

<?=template_footer()?>