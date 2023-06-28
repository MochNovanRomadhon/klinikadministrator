<?php
include 'functions.php';
require('./api/consumeapi_pasien.php');
$pdo = pdo_connect_mysql();
$msg = '';

if (isset($_GET['id_pasien'])) {
    
    $stmt = $pdo->prepare('SELECT * FROM pasien WHERE id_pasien = ?');
    $stmt->execute([$_GET['id_pasien']]);
    $contact = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$contact) {
        exit('Contact doesn\'t exist with that ID!');
    }
    
    if (isset($_GET['confirm'])) {
        if ($_GET['confirm'] == 'yes') {
            delConsume($_GET['id_pasien']);
            header('Location: read_pasien.php');
        } else {
            exit;
        }
    }
} else {
    exit('No ID specified!');
}
?>


<?=template_header('Delete')?>

<div class="content delete">
	<h2>Hapus Pasien </h2>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php else: ?>
	<p>Apakah yakin untuk menghapus data?</p>
    <div class="yesno">
        <a href="delete_pasien.php?id_pasien=<?=$contact['id_pasien']?>&confirm=yes">Yes</a>
        <a href="read_pasien.php?id_pasien=<?=$contact['id_pasien']?>&confirm=no">No</a>
    </div>
    <?php endif; ?>
</div>

<?=template_footer()?>