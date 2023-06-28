<?php
include 'functions.php';
require('./api/consumeapi_kunjungan.php');
$pdo = pdo_connect_mysql();
$msg = '';

if (isset($_GET['id_kunjungan'])) {
    
    $stmt = $pdo->prepare('SELECT * FROM kunjungan WHERE id_kunjungan = ?');
    $stmt->execute([$_GET['id_kunjungan']]);
    $contact = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$contact) {
        exit('Contact doesn\'t exist with that ID!');
    }
    
    if (isset($_GET['confirm'])) {
        if ($_GET['confirm'] == 'yes') {
            delConsume($_GET['id_kunjungan']);
            header('Location: read_kunjungan.php');
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
	<h2>Delete Contact </h2>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php else: ?>
	<p>Apakah yakin untuk menghapus data?</p>
    <div class="yesno">
        <a href="delete_kunjungan.php?id_kunjungan=<?=$contact['id_kunjungan']?>&confirm=yes">Yes</a>
        <a href="read_kunjungan.php?id_kunjungan=<?=$contact['id_kunjungan']?>&confirm=no">No</a>
    </div>
    <?php endif; ?>
</div>

<?=template_footer()?>