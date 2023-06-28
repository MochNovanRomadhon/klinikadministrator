<?php
include 'functions.php';
require('./api/consumeapi_resep.php');
$pdo = pdo_connect_mysql();
$msg = '';

if (isset($_GET['id_resep'])) {
    
    $stmt = $pdo->prepare('SELECT * FROM resep WHERE id_resep = ?');
    $stmt->execute([$_GET['id_resep']]);
    $contact = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$contact) {
        exit('Contact doesn\'t exist with that ID!');
    }
    
    if (isset($_GET['confirm'])) {
        if ($_GET['confirm'] == 'yes') {
            delConsume($_GET['id_resep']);
            header('Location: read_resep.php');
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
	<h2>Hapus Resep </h2>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php else: ?>
	<p>Apakah yakin untuk menghapus data?</p>
    <div class="yesno">
        <a href="delete_resep.php?id_resep=<?=$contact['id_resep']?>&confirm=yes">Yes</a>
        <a href="read_resep.php?id_resep=<?=$contact['id_resep']?>&confirm=no">No</a>
    </div>
    <?php endif; ?>
</div>

<?=template_footer()?>