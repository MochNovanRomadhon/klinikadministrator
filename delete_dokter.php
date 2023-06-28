<?php
include 'functions.php';
require('./api/consumeapi_dokter.php');
$pdo = pdo_connect_mysql();
$msg = '';

if (isset($_GET['id_dokter'])) {
    
    $stmt = $pdo->prepare('SELECT * FROM dokter WHERE id_dokter = ?');
    $stmt->execute([$_GET['id_dokter']]);
    $contact = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$contact) {
        exit('Contact doesn\'t exist with that ID!');
    }
    
    if (isset($_GET['confirm'])) {
        if ($_GET['confirm'] == 'yes') {
            delConsume($_GET['id_dokter']);
            header('Location: read_dokter.php');
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
	<h2>Hapus Dokter </h2>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php else: ?>
	<p>Apakah yakin untuk menghapus data?</p>
    <div class="yesno">
        <a href="delete_dokter.php?id_dokter=<?=$contact['id_dokter']?>&confirm=yes">Yes</a>
        <a href="read_dokter.php?id_dokter=<?=$contact['id_dokter']?>&confirm=no">No</a>
    </div>
    <?php endif; ?>
</div>

<?=template_footer()?>