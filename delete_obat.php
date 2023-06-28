<?php
include 'functions.php';
require('./api/consumeapi_obat.php');
$pdo = pdo_connect_mysql();
$msg = '';

if (isset($_GET['id_obat'])) {
    
    $stmt = $pdo->prepare('SELECT * FROM obat WHERE id_obat = ?');
    $stmt->execute([$_GET['id_obat']]);
    $contact = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$contact) {
        exit('Contact doesn\'t exist with that id_obat!');
    }
    
    if (isset($_GET['confirm'])) {
        if ($_GET['confirm'] == 'yes') {
            delConsume($_GET['id_obat']);
            header('Location: read_obat.php');
        } else {
            exit;
        }
    }
} else {
    exit('No id_obat specified!');
}
?>


<?=template_header('Delete')?>

<div class="content delete">
	<h2>Hapus obat</h2>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php else: ?>
	<p>Apakah yakin untuk menghapus data?</p>
    <div class="yesno">
        <a href="delete_obat.php?id_obat=<?=$contact['id_obat']?>&confirm=yes">Yes</a>
        <a href="read_obat.php?id_obat=<?=$contact['id_obat']?>&confirm=no">No</a>
    </div>
    <?php endif; ?>
</div>

<?=template_footer()?>