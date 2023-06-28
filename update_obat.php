<?php
include 'functions.php';
include 'database.php';
require('./api/consumeapi_obat.php');

// Check if the contact id exists, for example update.php?id=1 will get the contact with the id of 1
if (isset($_POST['put'])) { 
        putConsume($_GET['id_obat']);  
        header('Location: read_obat.php');   
}

$sql=mysqli_query($conn,"SELECT * FROM obat WHERE id_obat ='$_GET[id_obat]'");
$data=mysqli_fetch_array($sql);
?>

<?=template_header('Read')?>

<div class="content update">
	<h2>Update obat</h2>
    <form action="" method="post">
        <label for="nama_obat">Nama Obat</label>
        <input type="text" name="nama_obat"  id="nama_obat" value="<?php echo $data['nama_obat']; ?>">
        <label for="ket">Keterangan</label>
        <input type="text" name="ket"  id="ket" value="<?php echo $data['ket']; ?>">
        <input type="submit" name="put" value="Update">
    </form>
</div>

<?=template_footer()?>