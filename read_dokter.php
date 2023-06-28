<?php
include 'functions.php';
require('./api/consumeapi_dokter.php');

$getdata = getConsume();


?>


<?=template_header('Read')?>

<div class="content read">
	<h2> Dokter </h2>
	<a href="create_dokter.php" class="create-contact">Tambah</a>
	<table>
        <thead>
            <tr>
                <td>No.</td>
                <td>Nama Dokter</td>
                <td>Spesialis</td>
                <td>No. Telpon</td>
                <td></td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($getdata as $key => $contact): ?>
            <tr>
                <td><?=$key + 1?></td>
                <td><?=$contact['nama_dokter']?></td>
                <td><?=$contact['spesialis']?></td>
                <td><?=$contact['no_telp']?></td>

                <td class="actions">
                    <a href="update_dokter.php?id_dokter=<?=$contact['id_dokter']?>" class="edit"><i class="fas fa-pen fa-xs"></i></a>
                    <a href="delete_dokter.php?id_dokter=<?=$contact['id_dokter']?>" class="trash"><i class="fas fa-trash fa-xs"></i></a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
	<div class="pagination">
	</div>
</div>

<?=template_footer()?>